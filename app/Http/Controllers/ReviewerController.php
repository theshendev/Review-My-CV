<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Reviewer;
use Illuminate\Http\Request;

class ReviewerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web,reviewer');
    }

    public function index()
    {
        anyRelationExists(auth()->user());
        $reviewers = Reviewer::available()->get();
        foreach ($reviewers as $key=>$reviewer){
            if (relationExists(auth()->user(),$reviewer)){
                $reviewers->forget($key);
            }
        }
        return view('reviewers.index',compact('reviewers'));
    }

    public function show(Reviewer $reviewer)
    {
        return view('reviewers.show',compact('reviewer'));

    }

    public function add_score(Request $request,Reviewer $reviewer,Comment $comment)
    {
            $reviewer->score += $request->score;
            $reviewer->score/=2;
            $reviewer->save();
            $comment->is_checked =true;
            $comment->save();
            return back();
    }

}
