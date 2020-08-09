<?php

namespace App\Http\Controllers;

use App\Reviewer;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['download_cv','profile']);
    }

    public function profile(User $user)
    {
        return view('user.profile',compact('user'));
    }

    public function home()
    {
        $reviewers = Reviewer::all();
        return view('home',compact('reviewers'));
    }
    public function allow_reviewer(User $user,Reviewer $reviewer)
    {
        if ($user->allowed_reviewers()->where('allowed_reviewer_id',$reviewer->id)->exists()){
            $user->allowed_reviewers()->updateExistingPivot($reviewer->id,['expires_at' => now()->addDays(5)]);

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
            return redirect(asset('storage/users_cv/'.$user->cv));
        }
        else{
            return back();
        }
    }
}
