<?php

namespace App\Http\Controllers;

use App\Reviewer;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['download_cv','show']);
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





    public function allow_reviewer(User $user,Reviewer $reviewer)
    {
        if (relationExists($user,$reviewer)){
//            $user->allowed_reviewers()->updateExistingPivot($reviewer->id,['expires_at' => now()->addDays(5)]);
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
            return redirect(asset('storage/users_cv/'.$user->cv));
        }
        else{
            return back();
        }
    }
}
