<?php

namespace App\Http\Controllers;

use App\Reviewer;
use Illuminate\Http\Request;

class ReviewerController extends Controller
{
    public function index()
    {
        $reviewers = Reviewer::all();
        return view('reviewers.index',compact('reviewers'));
    }

    public function show(Reviewer $reviewer)
    {
        return view('reviewers.show',compact('reviewer'));

    }

}
