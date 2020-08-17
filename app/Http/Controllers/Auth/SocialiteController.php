<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Reviewer;
use App\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{

    public function redirectToProvider($provider)
    {
        $type = \request()->segment(2);
        if (count(\request()->segments()) == 2) {
            $type = 'web';
        }
        session(['type' => $type]);
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $getInfo = Socialite::driver($provider)->user();


        $type = session()->pull('type');
        if ($type == 'reviewer') {
            $user = Reviewer::where('provider_id', $getInfo->id)->first();
            if ( User::where('email', $getInfo->email)->exists()){
                return redirect('/register/reviewer')->with('status','There is a user registered with this email');
    }
        } else {
            $user = User::where('provider_id', $getInfo->id)->first();
            if ( Reviewer::where('email', $getInfo->email)->exists()){
                return redirect('/register')->with('status','There is a reviewer registered with this email');
            }
        }
        if (!$user) {
            $this->createUser($getInfo, $provider, $type);
            if ($type=='reviewer'){

                return redirect('register/reviewer/p2');
            }
            return redirect('register/p2');


        } else {
            Auth::guard($type)->login($user);
            return redirect()->to('/');

        }

//                dd($user->getName());
        // $user->token;
    }

    protected function createUser($info, $provider)
    {
        session([
            'user' =>
                [
                    'name' => $info->name,
                    'email' => $info->email,
                    'image' => $info->avatar_original,
                    'provider' => $provider,
                    'provider_id' => $info->id
                ]
        ]);


    }

}
