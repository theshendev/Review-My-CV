<?php

namespace App\Http\Controllers;

use App\Reviewer;
use App\User;
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
        $this->middleware('auth')->except(['download_cv','show','index']);
        $this->middleware('auth:reviewer')->only(['download_cv','show','index']);

    }

    public function index()
    {
        $users = User::all();
        return view('users.index',compact('users'));
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
            'cv' => ['mimes:pdf,docx'],
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
            $uniqueFileName = str_replace(' ', '', $uniqueFileName);;
            $image->storeAs('images/profiles/', $uniqueFileName);
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
        return back();
    }
    public function changePassword(Request $request)
    {
        $user = Auth::user();
        $validator = Validator::make($request->all(),[
            'current-password' =>['required'],
            'new-password' =>['required','string','min:8','confirmed','different:current-password'],
        ]);

        if (!(Hash::check($request->get('current-password'), $user->password))) {
            $validator->getMessageBag()->add('current-password', 'رمز عبور کنونی اشتباه است.');
        }
            if (!$validator->errors()->isEmpty()){
            return redirect()->back()->withErrors($validator);
        }
            $user->password = Hash::make($request['new-password']);
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
