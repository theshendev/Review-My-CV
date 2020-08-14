<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Reviewer;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
        {
            /*
            |--------------------------------------------------------------------------
            | Login Controller
            |--------------------------------------------------------------------------
            |
            | This controller handles authenticating users for the application and
            | redirecting them to your home screen. The controller uses a trait
            | to conveniently provide its functionality to your applications.
            |
            */



            public function redirectToProvider($provider)
            {
                return Socialite::driver($provider)->redirect();
            }
            public function handleProviderCallback($provider)
            {
                $getInfo = Socialite::driver($provider)->user();
                $user = $this->createUser($getInfo,$provider);
                Auth::guard('reviewer')->login($user);
                return redirect()->to('/reviewer');

//                dd($user->getName());
                // $user->token;
            }
        protected function createUser($getInfo,$provider){

            $user = Reviewer::where('provider_id', $getInfo->id)->first();

            if (!$user) {
                $user = Reviewer::create([
                    'name' => $getInfo->name,
                    'company_email' => $getInfo->email,
                    'image' => $getInfo->avatar_original,
                    'provider' => $provider,
                    'provider_id' => $getInfo->id
                ]);
            }
            return $user;
        }
            use AuthenticatesUsers;

            /**
             * Where to redirect users after login.
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
            $this->middleware('guest')->except('logout');
            $this->middleware('guest:reviewer')->except('logout');
        }

            public function showReviewerLoginForm()
        {
            return view('auth.login',['url'=>'reviewer']);
        }

    public function reviewerLogin(Request $request)
    {
        $request->validate([
            'company_email'=>'required|email',
            'password'=> 'required|min:6',
        ]);
        $credentials = $request->only('company_email', 'password');
//        if (Auth::guard('reviewer')->attempt(['company_email' => $request->company_email, 'password' => $request->password], $request->get('remember'))) {
        if (Auth::guard('reviewer')->attempt($credentials))    {
//            return redirect()->intended('/reviewer');
            return redirect('/reviewer');
        }

        return back()->withInput($request->only('email', 'remember'));
    }
}
