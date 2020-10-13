<?php

namespace App\Http\Controllers;

use App\Reviewer;
use App\User;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['download_cv','show']);
        $this->middleware('auth:reviewer')->only(['download_cv','show']);

    }

    public function show(User $user)
    {
        return view('users.show',compact('user'));
    }

    public function profile()
    {
        $user = auth()->user();
        $comments = auth()->user()->comments->where('is_checked','==',0);
        return view('users.profile',compact('user','comments'));
    }


    public function update(Request $request,User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', "unique:users,email,$user->id",'unique:reviewers'],
            'linkedin' => ['required',"unique:users,linkedin,$user->id",'unique:reviewers'],
            'cv' => ['mimes:pdf,docx','file','max:5120'],
            'image' => ['image','max:5120'],
        ]);
        if ($request->hasFile('cv')){
            $cv =$request->cv;
            $uniqueFileName = uniqid() . $cv->getClientOriginalName();
            $cv->storeAs('users_cv', $uniqueFileName);
            Storage::delete("users_cv/$user->cv");
            $user->cv=$uniqueFileName;
        }
        if ($request->hasFile('image')){
            $image=$request->image;
            $uniqueFileName = trim(uniqid() . $image->getClientOriginalName());
            $uniqueFileName = str_replace(' ', '', $uniqueFileName);
            $image_array_1 = explode(";",$request->image_base64);
            $image_array_2 = explode(",",$image_array_1[1]);
            $data = base64_decode($image_array_2[1]);
            File::put("images/profiles/$uniqueFileName",$data);
            $path = url('images/profiles/'.$uniqueFileName);
            Storage::delete("images/profiles/".basename($user->image));
            $user->image=$path;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->linkedin = $request->linkedin;
        if ($user->isDirty('email')){
            $user->email_verified_at = null;
            $user->sendEmailVerificationNotification();
        }
        $user->save();
        return back()->with('status','تغییرات با موفقیت ذخیره شد.');
    }

    public function allow_reviewer(User $user,Reviewer $reviewer)
    {
        if (relationExists($user,$reviewer)){
            $user->allowed_reviewers()->updateExistingPivot($reviewer->id,['expires_at' => now()->addDays(5)]);
                return back();
        }
        else{

            $user->allowed_reviewers()->attach($reviewer,['expires_at' => now()->addDays(5)]);
        }
        return back();
    }
    public function forbid_reviewer(User $user,Reviewer $reviewer)
    {

        $user->allowed_reviewers()->updateExistingPivot($reviewer->id,['expires_at'=>now()]);
        return back();
    }

    public function download_cv(User $user,Reviewer $reviewer)
    {
        if ($user->allowed_reviewers()->where('expires_at','>',now())->where('allowed_reviewer_id',$reviewer->id)->exists()) {
            return redirect(asset('users_cv/'.$user->cv));
        }
        else{
            return back();
        }
    }
}
