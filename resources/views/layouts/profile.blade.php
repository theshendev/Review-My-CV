@extends('layouts.app')
@section('content')
    <section class="profile text-white mt-5">

        <div class="container">
            <form action="{{route(Str::singular($user->getTable()).".update",$user)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="avatar-upload">
                <div class="avatar-edit">
                    <input class="@error('image') is-invalid @enderror" name="image" type='file' id="imageUpload" accept=".png, .jpg, .jpeg"/>
                    @error('image')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <label for="imageUpload"><span class="fal fa-plus"></span>
                    </label>
                </div>
                <div class="avatar-preview">
                    <div id="imagePreview" style="background-image: url({{$user->image}});">
                    </div>
                    </div>
                </div>
            <div class="row justify-content-center mt-5">
                <h3 class="profile-heading">پروفایل</h3>
            </div>

            <div class="profile-information">

                    <div class="form-group">
                        <label for="name"
                               class="col-form-label text-md-right">نام و نام خانوادگی</label>

                        <div class="input-field">
                            <input id="name" type="text"
                                   class="form-control @error('name') is-invalid @enderror"
                                   name="name" value="{{ $user->name }}" required
                                   autocomplete="name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ ucwords($message) }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row no-gutters">
                        <div class="form-group col-md-6">
                            <label for="email"
                                   class="col-form-label text-md-right">ایمیل</label>
                            <div class="input-field">
                                <input id="email" type="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ $user->email }}" required
                                       autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ ucwords($message) }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group col-md-6">
                            <label for="linkedin"
                                   class="col-form-label text-md-right">لینکدین</label>
                            <div class="input-field">
                                <input id="linkedin" type="text"
                                       class="form-control @error('linkedin') is-invalid @enderror"
                                       name="linkedin" value="{{ $user->linkedin }}" required
                                       autocomplete="linkedin">
                                @error('linkedin')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ ucwords($message) }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                        @yield('fields')
                    <div class="form-group text-center">
                        <button class="btn btn-success" onclick="console.log(this.form.submit())">
                            ذخیره کردن تغییرات
                        </button>
                    </div>
            </div>
            </form>

                <form action="{{route(Str::singular($user->getTable()).".password",$user)}}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="row justify-content-center mt-5 change-password">
                        <h3 class="profile-heading">تغییر رمز عبور</h3>
                    </div>
                    <div class="profile-information">

                        <div class="form-group">
                            <label for="current-password"
                                   class="col-form-label text-md-right">رمز عبور کنونی</label>

                            <div class="input-field">
                                <input id="current-password" type="password"
                                       class="form-control @error('current-password') is-invalid @enderror"
                                       name="current-password" required>
                                @error('current-password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="new-password"
                                   class="col-form-label text-md-right">رمز عبور جدید</label>

                            <div class="input-field">
                                <input id="new-password" type="password"
                                       class="form-control @error('new-password') is-invalid @enderror"
                                       name="new-password" required>
                                @error('new-password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="new-password-confirm"
                                   class="col-form-label text-md-right">تکرار رمز عبور جدید</label>

                            <div class="input-field">
                                <input id="new-password-confirm" type="password"
                                       class="form-control @error('new-password-confirm') is-invalid @enderror"
                                       name="new-password_confirmation" required>
                                @error('new-password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-success" onclick="console.log(this.form.submit())">
                                ذخیره کردن تغییرات
                            </button>
                        </div>
                    </div>
                </form>

{{--{{dd($errors)}}--}}
        </div>

    </section>

    {{--@if(!$comments->isEmpty())--}}
        {{--<div class="card">--}}
            {{--<div class="card-header">--}}
                {{--{{$comments->first()->reviewer->name}}--}}
            {{--</div>--}}
            {{--<div class="card-body">--}}
                {{--<div class="row">--}}
                    {{--<div class="col-8">--}}
                        {{--{{$comments->first()->body}}--}}
                    {{--</div>--}}
                    {{--<div class="col-4">--}}
                        {{--<div class="rating">--}}
                            {{--<form action="{{route('reviewer.score',['reviewer'=>$comments->first()->reviewer,'comment'=>$comments->first()])}}"--}}
                                  {{--method="post">--}}
                                {{--@csrf--}}
                                {{--<input type="text" onchange="this.form.submit()" id="input-1" name="score"--}}
                                       {{--class="rating" data-min="0" data-max="5" data-step="0.5" value="2.5"--}}
                                       {{--data-size="sm">--}}
                            {{--</form>--}}

                        {{--</div>--}}
                        {{--<div class="rating" dir="rtl">--}}
                        {{--<span class="fal fa-star"></span>--}}
                        {{--<span class="fal fa-star"></span>--}}
                        {{--<span class="fal fa-star"></span>--}}
                        {{--<span class="fal fa-star"></span>--}}
                        {{--<span class="fal fa-star"></span>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

            {{--</div>--}}

        {{--</div>--}}
        {{--<div class="row justify-content-center">--}}
            {{--@if(count($user->comments)>1)--}}
                {{--Rate the first comment to see the other one(s).--}}
            {{--@endif--}}
        {{--</div>--}}
    {{--@else--}}
        {{--<div class="row justify-content-center">--}}
            {{--There is no comment for your cv.--}}
        {{--</div>--}}
    {{--@endif--}}
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