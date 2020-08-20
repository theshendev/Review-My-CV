<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Response;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | users that recently registered with the application. Emails may also
    | be re-sent if the users didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function show(Request $request)
    {
        if ($request->user(getGuard()) == null) {
            abort(403);
        } else {
            return $request->user(getGuard())->hasVerifiedEmail()
                ? redirect($this->redirectPath())
                : view('auth.verify');
        }
    }

    public function verify(Request $request)
    {
        if ($request->user(getGuard()) == null) {
            abort(403);
        } else {
            if (!hash_equals((string)$request->route('id'), (string)$request->user(getGuard())->getKey())) {
                throw new AuthorizationException;
            }

            if (!hash_equals((string)$request->route('hash'), sha1($request->user(getGuard())->getEmailForVerification()))) {
                throw new AuthorizationException;
            }

            if ($request->user(getGuard())->hasVerifiedEmail()) {
                return $request->wantsJson()
                    ? new Response('', 204)
                    : redirect($this->redirectPath());
            }

            if ($request->user(getGuard())->markEmailAsVerified()) {
                event(new Verified($request->user(getGuard())));
            }

            if ($response = $this->verified($request)) {
                return $response;
            }

            return $request->wantsJson()
                ? new Response('', 204)
                : redirect($this->redirectPath())->with('verified', true);
        }
    }
    public function resend(Request $request)
    {
        if ($request->user(getGuard()) == null) {
            abort(405);
        } else {
            if ($request->user(getGuard())->hasVerifiedEmail()) {
                return $request->wantsJson()
                    ? new Response('', 204)
                    : redirect($this->redirectPath());
            }

            $request->user(getGuard())->sendEmailVerificationNotification();

            return $request->wantsJson()
                ? new Response('', 202)
                : back()->with('resent', true);
        }
    }
}
