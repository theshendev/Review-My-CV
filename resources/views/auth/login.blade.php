@extends('layouts.app')
@section('body_bg')
    @php
        $image_url = isset($url) ? 'reviewer.jpg' : 'user.png'
    @endphp
    url("{{asset('images/'.$image_url)}}") no-repeat center center fixed
@endsection
@section('content')
    <section class="login">

        <div class="container">
            <div class="row logo justify-content-center">
                <div class="col-md-5">
                    <a href="/">
                    <img width="100%" src="{{asset('images/logo.png')}}" alt="logo">

                    </a>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card">
                        <div class="login-header">
                            <h3>
                                ورود {{ isset($url) ? "ارزیاب" : "کاربر"}}
                            </h3>
                            <small>
                            <span class="text-gray">اکانت ندارید؟</span>
                            <span>
                                <a href="/register/{{isset($url) ? 'reviewer' : ''}}">
                                     ثبت نام کنید
                                </a>
                            </span>
                            </small>
                        </div>
                        <div class="card-body text-right">

                            @isset($url)
                                <form method="POST" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">
                                    @else
                                        <form method="POST" action="{{ route('login') }}"
                                              aria-label="{{ __('Login') }}">
                                            @endisset
                                            @csrf

                                            <div class="form-group">
                                                <label for="email"
                                                       class="col-form-label text-md-right">ایمیل</label>

                                                <div class="">

                                                    <input id="email" type="email"
                                                           class="form-control @error('email') is-invalid @enderror"
                                                           name="email" value="{{ old('email') }}" required
                                                           autocomplete="email"
                                                           autofocus>

                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="password"
                                                       class="col-form-label text-md-right">رمز عبور</label>

                                                <div class="">
                                                    <input id="password" type="password"
                                                           class="form-control @error('password') is-invalid @enderror"
                                                           name="password" required autocomplete="current-password">

                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            {{--<div class="form-group row">--}}
                                                {{--<div class="col-md-6 offset-md-4">--}}
                                                    {{--<div class="form-check">--}}
                                                        {{--<input class="form-check-input" type="checkbox" name="remember"--}}
                                                               {{--id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

                                                        {{--<label class="form-check-label" for="remember">--}}
                                                            {{--{{ __('Remember Me') }}--}}
                                                        {{--</label>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            <div class="row my-4">
                                                    <div class="col-md-5 text-left">
                                                        <button type="submit" class="btn">
                                                            ورود به سایت
                                                        </button>
                                                    </div>
                                                <div class="col-md-7 text-right align-self-center">
                                                @if (Route::has('password.request'))
                                                    <a href="{{ route('password.request') }}">
                                                        <small>
                                                            رمز عبور خود را فراموش کرده اید؟

                                                        </small>
                                                    </a>
                                                @endif
                                                </div>
                                            </div>
                                            <div class="row text-center">
                                                <h3 class=" font-weight-bold">
                                                    یا
                                                </h3>
                                            </div>

                                            @isset($url)
                                                <div class="row mb-4">
                                                    <div class="col-md-8 text-left align-self-center">
                                                        <a href="{{ route('login') }}">
                                                            ورود به عنوان کاربر
                                                        </a>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a href="{{ route('reviewer.social','linkedin') }}">
                                                            <img width="100%" src="{{asset('images/nextpng2.com.png')}}"
                                                                 alt="">
                                                        </a>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a href="{{ route('reviewer.social','google') }}">
                                                            <img width="100%"
                                                                 src="{{asset('images/btn_google_light_normal_ios.png')}}"
                                                                 alt="">
                                                        </a>
                                                    </div>
                                                </div>



                                            @else
                                                <div class="row mb-4">
                                                    <div class="col-md-8 text-left align-self-center">
                                                        <a href="{{ route('login.reviewer') }}">
                                                            ورود به عنوان ارزیاب
                                                        </a>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a href="{{ route('user.social','linkedin') }}">
                                                            <img width="100%" src="{{asset('images/nextpng2.com.png')}}"
                                                                 alt="">
                                                        </a>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <a href="{{ route('user.social','google') }}">
                                                            <img width="100%"
                                                                 src="{{asset('images/btn_google_light_normal_ios.png')}}"
                                                                 alt="">
                                                        </a>
                                                    </div>
                                                </div>




                            @endisset
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
