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
            <div class="col-md-7 register-image">
                <img width="100%" src="{{asset('images/Reviewmycv.png')}}" alt="">
            </div>
            <div class="col-md-5">
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
                                                    <label for="imageUpload"><span class="fa fa-plus"></span>
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
                                                <div class="">
                                                    <input id="name" type="text"
                                                           class="form-control @error('name') is-invalid @enderror"
                                                           name="name" value="{{ old('name') }}" required
                                                           autocomplete="name" autofocus>

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

                                                <div class="">
                                                    <input id="email" type="email"
                                                           class="form-control @error('email') is-invalid @enderror"
                                                           name="email" value="{{ old('email') }}" required
                                                           autocomplete="email">

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

                                                <div class="row">
                                                    <div class="col-5 align-self-center pr-0">
                                                        https://www.linkedin.com/in/
                                                    </div>
                                                    <div class="col-7">
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

                                                <div class="">
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

                                                <div class="">
                                                    <input id="password-confirm" type="password" class="form-control"
                                                           name="password_confirmation" required
                                                           autocomplete="new-password">
                                                </div>
                                            </div>


                                        @endisset
                                        <div class="form-group  mb-0">
                                            <div class=" offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    ثبت نام
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    @isset($url)
                                        <a class="btn btn-link" href="{{ route('register') }}">
                                            Register as user
                                        </a>
                                    @else
                                        <a class="btn btn-link" href="{{ route('register.reviewer') }}">
                                            Register as reviewer
                                        </a>
                        @endisset

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
