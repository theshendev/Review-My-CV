@extends('layouts.app')
@section('title')
    {{ isset($url) ? "ثبت نام ارزیاب" : "ثبت نام کاربر"}}
@endsection
@section('content')
    <section class="register">
        <div class="container text-white text-right">
            @if(session('status'))
                <div class="alert alert-primary" dir="rtl">
                    {{ session('status') }}
                </div>
            @endif
            <div class="row justify-content-start" dir="rtl">
                <h2 class="heading text-white">
                    {{ isset($url) ? "ثبت نام ارزیاب" : "ثبت نام کاربر"}}
                </h2>
            </div>
            <div class="row border-right">
                <div @isset($p) style="margin-top:0 " @endisset class="col-lg-6 register-image d-none d-lg-block">
                    <img width="100%" src="/images/register/{{isset($url) ? "reviewer-register.png" : "user-register.png"}}"
                         alt="ثبت نام">
                </div>
                <div class="col-sm-10 col-md-9 col-lg-5 ml-lg-auto register-form-container">
                    @isset($url)
                        <form method="POST" action='{{ url("register/$url") }}' aria-label="{{ __('Register') }}"
                              enctype="multipart/form-data">

                            @else
                                <form method="POST" action="{{ route('register') }}"
                                      aria-label="{{ __('Register') }}" enctype="multipart/form-data">
                                    @endisset
                                    @csrf
                                    @isset($p)
                                        @includeWhen(isset($url),'partials.auth.register.reviewer')
                                        @includeWhen(!isset($url),'partials.auth.register.user')

                                    @else
                                        @include('includes.image-upload')
                                        <div class="form-group">
                                            <label for="name"
                                                   class="col-form-label text-md-right">نام و نام خانوادگی</label>
                                            <div class="input-field @error('name') is-invalid @enderror">
                                                <input id="name" type="text"
                                                       class="form-control @error('name') is-invalid @enderror"
                                                       name="name" value="{{ old('name') }}" required
                                                       autocomplete="name" autofocus>
                                                <span class="input-field_icon icon-right"><i
                                                            class="fal fa-user-alt"></i></span>
                                            </div>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>


                                        <div class="form-group ">
                                            <label for="linkedin"
                                                   class="col-form-label text-md-right">اکانت لینکدین</label>

                                            <div class="input-field  @error('linkedin') is-invalid @enderror">
                                                <div class="align-self-center pr-1 linkedin-url">
                                                    https://www.linkedin.com/in/
                                                </div>
                                                <div class="w-100">
                                                    <input id="linkedin" type="text"
                                                           class="form-control @error('linkedin') is-invalid @enderror"
                                                           name="linkedin" value="{{ old('linkedin') }}" required
                                                           autocomplete="linkedin">
                                                </div>
                                            </div>

                                            @error('linkedin')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>

                                        @includeWhen(isset($url),'partials.auth.register.reviewer')
                                        @includeWhen(!isset($url),'partials.auth.register.user')
                                        <div class="form-group" style="order: 4">
                                            <label for="email"
                                                   class="col-form-label text-md-right">ایمیل</label>

                                            <div class="input-field @error('email') is-invalid @enderror">
                                                <input id="email" type="email"
                                                       class="form-control @error('email') is-invalid @enderror"
                                                       name="email" value="{{ old('email') }}" required
                                                       autocomplete="email">
                                                <span class="input-field_icon icon-left"><i
                                                            class="fal fa-envelope-open"></i></span>

                                            </div>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ ucwords($message) }}</strong>
                                    </span>
                                            @enderror
                                        </div>

                                        <div class="form-group ">
                                            <label for="password"
                                                   class="col-form-label text-md-right">رمز عبور</label>

                                            <div class="input-field @error('password') is-invalid @enderror">
                                                <input id="password" type="password"
                                                       class="form-control @error('password') is-invalid @enderror"
                                                       name="password" required>
                                                <span class="input-field_icon icon-left"><i
                                                            class="fal fa-key"></i></span>

                                            </div>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror
                                        </div>

                                        <div class="form-group ">
                                            <label for="password-confirm"
                                                   class="col-form-label text-md-right">تکرار رمز عبور</label>

                                            <div class="input-field">
                                                <input id="password-confirm" type="password" class="form-control"
                                                       name="password_confirmation" required>
                                                <span class="input-field_icon icon-left"><i
                                                            class="fal fa-key"></i></span>
                                            </div>
                                        </div>


                                    @endisset
                                    <div class="row" style="order: 9">
                                        <div class="@isset($p) col-md-12 text-center @else col-5  text-left @endisset">
                                            <button type="submit" class="btn btn-custom">
                                                ثبت نام
                                            </button>
                                        </div>
                                        <div class="col-7 align-self-center">
                                            @if(!isset($p))
                                                @isset($url)
                                                    <a href="{{ route('register') }}">
                                                        ثبت نام به عنوان کاربر
                                                    </a>
                                                    <div class="mt-2">
                                                <span>
                                                    اکانت دارید؟
                                                </span>
                                                        <a href="{{ route('login.reviewer') }}">
                                                            ورود
                                                        </a>
                                                    </div>
                                                @else
                                                    <a href="{{ route('register.reviewer') }}">
                                                        ثبت نام به عنوان ارزیاب
                                                    </a>
                                                    <div class="mt-2">
                                                <span>
                                                    اکانت دارید؟
                                            </span>
                                                        <a href="{{ route('login') }}">
                                                            ورود
                                                        </a>
                                                    </div>
                                                @endisset
                                            @endif
                                        </div>
                                    </div>
                                </form>
                                @if(!isset($p))
                                    <div class="row mt-3">
                                        <div class="col-md-6 text-left">
                                            <a href="{{route(isset($url) ? "reviewer.social" : "user.social",['provider'=>'google'])}}"
                                               class="btn btn-social google">
                                                <img style="max-width: 33px"
                                                     src="{{asset('images/social-logos/google-logo.png')}}" alt="google-logo"> Google
                                            </a>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <a href="{{route(isset($url) ? "reviewer.social" : "user.social",['provider'=>'linkedin'])}}"
                                               class="btn btn-social linkedin">
                                                <img style="max-width: 33px" src="{{asset('images/social-logos/linkedin-logo.png')}}"
                                                     alt="linkedin-logo"> Linkedin
                                            </a>
                                        </div>
                                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
