<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Reviewer;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
        $this->middleware('guest:reviewer');
    }

    public function showReviewerRegisterForm()
    {
        return view('auth.register', ['url' => 'reviewer']);
    }
    public function showSecondRegisterForm()
    {
        if (session()->exists('user')){
            if (\request()->segment(2)=='reviewer') {
                return view('auth.register', ['url' => 'reviewer', 'p' => '2']);
            }
            return view('auth.register', ['p'=>'2']);

        }
        else{
            abort(404);
        }

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users','unique:reviewers'],
            'phone' => ['regex:/(09)[0-9]{9}/','unique:users','unique:reviewers'],
            'cv' => ['required','mimes:pdf,docx'],
            'image' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    protected function reviewerValidator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:reviewers','unique:users'],
            'phone' => ['regex:/(09)[0-9]{9}/','unique:reviewers','unique:users'],
            'company' => ['required', 'string'],
            'position' => ['required', 'string'],
            'image' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    /**
     * Create a new users instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function setData(Request $request)
    {
        $request['provider'] = null;
        $request['provider_id'] = null;
        if (session()->exists('user')) {
            $data = session('user');
            $request['name'] = $data['name'];
            $request['email'] = $data['email'];
            $request['image'] = $data['image'];
            $request['provider'] = $data['provider'];
            $request['provider_id'] = $data['provider_id'];
            $request['password'] = Str::random(8);
            $request['password_confirmation'] = $request['password'];
        }
            $this->register($request);

    }

    protected function uploadImage($image)
    {
        $uniqueFileName = uniqid() . $image->getClientOriginalName();
        $image->storeAs('public/images/profiles/', $uniqueFileName);
        $path = url('/storage/images/profiles/'.$uniqueFileName);
        return $path;

    }

    protected function create(array $data)
    {
        session()->forget('user');
        $cv =$data['cv'];
        $uniqueFileName = uniqid() . $cv->getClientOriginalName();
        $cv->storeAs('public/users_cv', $uniqueFileName);
        if (is_file($data['image'])){
            $data['image'] = $this->uploadImage($data['image']);
        }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'image' => $data['image'],
            'provider' => $data['provider'],
            'provider_id' => $data['provider_id'],
            'cv' =>$uniqueFileName,
            'password' => Hash::make($data['password']),
        ]);
    }
    protected function createReviewer(Request $request)
    {

        if(session()->exists('user')) {
            $data = session('user');
            $request['name'] = $data['name'];
            $request['email'] = $data['email'];
            $path = $data['image'];
            $request['provider'] = $data['provider'];
            $request['provider_id'] = $data['provider_id'];
            $request['password'] =  Str::random(8);
            $request['password_confirmation'] =  $request['password'];

        }
        else{
            $request['provider'] = null;
            $request['provider_id'] = null;
            $path =$this->uploadImage($request['image']);
        }
        $this->reviewerValidator($request->all())->validate();
        $user = Reviewer::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'image' => $path,
            'company' => $request['company'],
            'position' => $request['position'],
            'provider' => $request['provider'],
            'provider_id' => $request['provider_id'],
            'password' => Hash::make($request['password']),
        ]);
        session()->forget('user');
        Auth::guard('reviewer')->login($user);
        return redirect()->to('/reviewer');

    }
}
