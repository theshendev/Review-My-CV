<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Reviewer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ReviewerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web,reviewer');
        $this->middleware('verified')->only(['update', 'profile']);
    }

    public function index()
    {
        if (getGuard() == 'web') {
            anyRelationExists(auth()->user());
            $reviewers = Reviewer::available()->get();
            foreach ($reviewers as $key => $reviewer) {
                if (relationExists(auth()->user(), $reviewer)) {
                    $reviewers->forget($key);
                }
            }
        } else {
            $reviewers = Reviewer::all();

        }
        return view('reviewers.index', compact('reviewers'));
    }

    public function show(Reviewer $reviewer)
    {
        $user = $reviewer;
        return view('reviewers.show', compact('user'));

    }

    public function profile()
    {
        $user = auth('reviewer')->user();
        $comments = auth()->user()->comments->where('is_checked', '==', 0);
        return view('reviewers.profile', compact('user', 'comments'));
    }

    public function update(Request $request, Reviewer $reviewer)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', "unique:reviewers,email,$reviewer->id", 'unique:users'],
            'linkedin' => ['required', "unique:reviewers,linkedin,$reviewer->id", 'unique:users'],
            'company' => ['required', 'string'],
            'position' => ['required', 'string'],
        ]);
        if ($request->hasFile('image')){
            $image=$request->image;
            $uniqueFileName = trim(uniqid() . $image->getClientOriginalName());
            $uniqueFileName = str_replace(' ', '', $uniqueFileName);
            $image_array_1 = explode(";",$request->image_base64);
            $image_array_2 = explode(",",$image_array_1[1]);
            $data = base64_decode($image_array_2[1]);
            File::put("images/profiles/$uniqueFileName",$data);
            $path = url('images/profiles/'.$uniqueFileName);
            Storage::delete("images/profiles/".basename($reviewer->image));
            $reviewer->image=$path;
        }
        $reviewer->name = $request->name;
        $reviewer->email = $request->email;
        $reviewer->linkedin = $request->linkedin;
        $reviewer->company = $request->company;
        $reviewer->position = $request->position;

        if ($reviewer->isDirty('email')) {
            $reviewer->email_verified_at = null;
            $reviewer->sendEmailVerificationNotification();
        }
        $reviewer->save();
        return back()->with('status', 'تغییرات با موفقیت ذخیره شد.');
    }

    public function commentScore(Request $request, Reviewer $reviewer, Comment $comment)
    {
        $request->validate([
            'score' => 'required|numeric|min:0.5'
        ]);
        $reviewer->score += $request->score;
        $reviewer->score /= 2;
        $reviewer->save();
        $comment->is_checked = true;
        $comment->score = $request->score;
        $comment->save();
        return back();
    }

}
