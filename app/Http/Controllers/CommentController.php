<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Notifications\CommentAdded;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request,User $user)
    {
        $reviewer =Auth::guard('reviewer')->user();
        $comment=$reviewer->comments()->create([
            'body'=>$request->body,
            'user_id'=>$user->id,

            ]);
        $user->allowed_reviewers()->updateExistingPivot($reviewer->id,['expires_at'=>now()]);
        $user->notify(new CommentAdded($reviewer,$comment));
        return back();
    }
}
