<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:web,reviewer','verified']);
    }

    public function index()
    {
        $user = Auth::guard(getGuard())->user();
        $group = $user->getTable();
        if($group=='users'){
            $requests = $user->allowed_reviewers;
        }
        else{
            $requests = $user->requested_users;
        }

        return view("$group.requests",compact('requests'));
    }

}
