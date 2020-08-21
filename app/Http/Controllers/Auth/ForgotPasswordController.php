<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Reviewer;
use App\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;


class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function broker()
    {
        if (Reviewer::where('email',request()->email)->exists()){
            return Password::broker('reviewers');
        }
        return Password::broker();
    }

}
