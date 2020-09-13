<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:web,reviewer','verified']);
    }

    public function showChangeForm()
    {
        $user = Auth::user();
        return view('auth.passwords.change',compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $validator = Validator::make($request->all(),[
            'current-password' =>['required'],
            'new-password' =>['required','string','min:8','confirmed','different:current-password'],
        ]);

        if (!(Hash::check($request->get('current-password'), $user->password))) {
            $validator->getMessageBag()->add('current-password', 'رمز عبور کنونی اشتباه است.');
        }
        if (!$validator->errors()->isEmpty()){
            return redirect()->back()->withErrors($validator);
        }
        $user->password = Hash::make($request['new-password']);
        $user->save();
        return back()->with('status','تغییرات با موفقیت ذخیره شد.');

    }
}
