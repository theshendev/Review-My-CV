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
        $this->middleware('auth:reviewer,verified')->only('update,profile');
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
    public function profile()
    {
        $user = auth('reviewer')->user();
        $comments = auth()->user()->comments->where('is_checked','==',0);
        return view('reviewers.profile',compact('user','comments'));
    }

    public function update(Request $request, Reviewer $reviewer)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', "unique:reviewers,email,$reviewer->id",'unique:users'],
            'linkedin' => ['required', "unique:reviewers,linkedin,$reviewer->id",'unique:users'],
            'company' => ['required', 'string'],
            'position' => ['required', 'string'],
//            'image' => ['required'],
        ]);
//        dd($request->all());
        $reviewer->update($request->all());
        return back();
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
