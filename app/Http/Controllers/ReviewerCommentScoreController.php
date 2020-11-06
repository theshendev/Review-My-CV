<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Reviewer;
use Illuminate\Http\Request;

class ReviewerCommentScoreController extends Controller
{

    public function __invoke(Request $request, Reviewer $reviewer, Comment $comment)
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
        return back()->with('success','امتباز با موفقیت ثبت شد.');
    }
}
