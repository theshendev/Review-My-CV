<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Reviewer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReviewerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web,reviewer');
        $this->middleware('verified')->only(['update','profile']);
    }

    public function index()
    {
        anyRelationExists(auth()->user());
        $reviewers = Reviewer::available()->get();
        foreach ($reviewers as $key => $reviewer) {
            if (relationExists(auth()->user(), $reviewer)) {
                $reviewers->forget($key);
            }
        }
        return view('reviewers.index', compact('reviewers'));
    }

    public function show(Reviewer $reviewer)
    {
        $user = $reviewer;
        return view('users.show', compact('user'));

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
        if ($request->hasFile('image')) {
            $image = $request->image;
            $uniqueFileName = trim(uniqid() . $image->getClientOriginalName());
            $uniqueFileName = str_replace(' ', '', $uniqueFileName);;
            $image->storeAs('public/images/profiles/', $uniqueFileName);
            $path = url('/storage/images/profiles/' . $uniqueFileName);
            Storage::delete("/public/images/profiles/" . basename($reviewer->image));
            $reviewer->image = $path;
        }
        $reviewer->name = $request->name;
        $reviewer->email = $request->email;
        $reviewer->linkedin = $request->linkedin;
        $reviewer->company = $request->company;
        $reviewer->position = $request->position;

        if ($reviewer->isDirty('email')){
            $reviewer->email_verified_at = null;
            $reviewer->sendEmailVerificationNotification();
        }
        $reviewer->save();
        return back();
    }

    public function add_score(Request $request, Reviewer $reviewer, Comment $comment)
    {
        $reviewer->score += $request->score;
        $reviewer->score /= 2;
        $reviewer->save();
        $comment->is_checked = true;
        $comment->save();
        return back();
    }

}
