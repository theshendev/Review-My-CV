@extends('layouts.app')
@section('content')
    <section class="register">
    <div class="container text-white text-right">
        <div class="row justify-content-start mt-5" dir="rtl">
            <h2 class="heading text-right text-white">
                {{ isset($url) ? "ثبت نام ارزیاب" : "ثبت نام"}}
            </h2>
        </div>
        <div class="row border-right">
            <div class="col-md-6 register-image">
                <img width="100%" src="/images/{{isset($url) ? "reviewer-register.png" : "user-register.png"}}" alt="">
            </div>
            <div class="col-md-4 offset-md-1">
                 @isset($url)
                            <form method="POST" action='{{ url("register/$url") }}' aria-label="{{ __('Register') }}"  enctype="multipart/form-data">

                                @else
                                    <form method="POST" action="{{ route('register') }}"
                                          aria-label="{{ __('Register') }}" enctype="multipart/form-data">
                                        @endisset
                                        @csrf
                                        @isset($p)
                                                @includeWhen(isset($url),'partials.auth.register.reviewer')
                                            @includeWhen(!isset($url),'partials.auth.register.user')

                                        @else
                                            <div class="avatar-upload">
                                                <div class="avatar-edit">
                                                    <input class="@error('image') is-invalid @enderror" name="image" type='file' id="imageUpload" accept=".png, .jpg, .jpeg" required/>
                                                    @error('image')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                    <label for="imageUpload"><span class="fal fa-plus"></span>
                                                    </label>
                                                </div>
                                                <div class="avatar-preview">
                                                    <div id="imagePreview" style="background-image: url(http://i.pravatar.cc/500?img=7);">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="name"
                                                       class="col-form-label text-md-right">نام و نام خانوادگی</label>
                                                <div class="input-field">
                                                    {{--<span class="input-field_icon icon-right"><i class="fa fa-search"></i></span>--}}
                                                    <input id="name" type="text"
                                                           class="form-control @error('name') is-invalid @enderror"
                                                           name="name" value="{{ old('name') }}" required
                                                           autocomplete="name" autofocus>
                                                    <span class="input-field_icon icon-right"><i class="fa fa-search"></i></span>

                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for="email"
                                                       class="col-form-label text-md-right">ایمیل</label>

                                                <div class="input-field">
                                                    <input id="email" type="email"
                                                           class="form-control @error('email') is-invalid @enderror"
                                                           name="email" value="{{ old('email') }}" required
                                                           autocomplete="email">
                                                    <span class="input-field_icon icon-left"><i class="fa fa-mailbox"></i></span>

                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ ucwords($message) }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group ">
                                                <label for="linkedin"
                                                       class="col-form-label text-md-right">اکانت لینکدین</label>

                                                <div class="input-field">
                                                    <div class="align-self-center pr-1">
                                                        https://www.linkedin.com/in/
                                                    </div>
                                                    <div class="w-100">
                                                    <input id="linkedin" type="text"
                                                           class="form-control @error('linkedin') is-invalid @enderror"
                                                           name="linkedin" value="{{ old('linkedin') }}" required
                                                           autocomplete="linkedin">

                                                    @error('linkedin')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            @includeWhen(isset($url),'partials.auth.register.reviewer')
                                                @includeWhen(!isset($url),'partials.auth.register.user')

                                            <div class="form-group ">
                                                <label for="password"
                                                       class="col-form-label text-md-right">رمز عبور</label>

                                                <div class="input-field">
                                                    <input id="password" type="password"
                                                           class="form-control @error('password') is-invalid @enderror"
                                                           name="password" required autocomplete="new-password">

                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for="password-confirm"
                                                       class="col-form-label text-md-right">تکرار رمز عبور</label>

                                                <div class="input-field">
                                                    <input id="password-confirm" type="password" class="form-control"
                                                           name="password_confirmation" required
                                                           autocomplete="new-password">
                                                </div>
                                            </div>


                                        @endisset
                                        <div class="row">
                                            <div class="col-md-5 text-left">
                                                <button type="submit" class="btn btn-custom">
                                                    ثبت نام
                                                </button>
                                            </div>
                                            <div class="col-md-7 align-self-center">
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
                                            </div>
                                        </div>
                                    </form>
                     <div class="row mt-3">
                         <div class="col-md-6 text-left">
                             <a href="{{route(isset($url) ? "reviewer.social" : "user.social",['provider'=>'google'])}}" class="btn btn-social google">
                                 <img style="max-width: 33px" src="{{asset('images/google-logo-9808.png')}}" alt=""> Google
                                 {{--<span class="fab fa-google" style="font-size: 2rem">ورود با گوگل</span>--}}
                             </a>
                         </div>
                         <div class="col-md-6 text-right">
                             <a href="{{route(isset($url) ? "reviewer.social" : "user.social",['provider'=>'linkedin'])}}" class="btn btn-social linkedin">
                                 <img style="max-width: 33px" src="{{asset('images/nextpng2.com.png')}}" alt=""> Linkedin
                             </a>
                         </div>
                     </div>

                    </div>
            </div>
    </div>
    </section>
@endsection
@section('scripts')
    $(document).ready(function(){

    let $fileInput = $('.file-input');
    let $droparea = $('.file-drop-area');

    // highlight drag area
    $fileInput.on('dragenter focus click', function() {
    $droparea.addClass('is-active');
    });

    // back to normal state
    $fileInput.on('dragleave blur drop', function() {
    $droparea.removeClass('is-active');
    });

    // change inner text
    $fileInput.on('change', function() {
    var filesCount = $(this)[0].files.length;
    var $textContainer = $(this).prev();

    if (filesCount === 1) {
    // if single file is selected, show file name
    var fileName = $(this).val().split('\\').pop();
    $textContainer.text(fileName);
    } else {
    // otherwise show number of files
    $textContainer.text(filesCount + ' files selected');
    }
    });

    function readURL(input) {
    if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
    $('#imagePreview').css('background-image', 'url('+e.target.result +')');
    $('#imagePreview').hide();
    $('#imagePreview').fadeIn(650);
    }
    reader.readAsDataURL(input.files[0]);
    }
    }
    $("#imageUpload").change(function() {
    readURL(this);
    });
    });

@endsection
