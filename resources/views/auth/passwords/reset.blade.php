
@extends('layouts.app')

@section('content')
    <section class="change-password text-white">

    <div class="container">
        <div class="row mt-5">
            <h3 class="heading-line full-circle-before">تغییر رمز عبور</h3>
        </div>
    <div class="row justify-content-center">
        <div class="col-md-10">

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <div class="change-password_form">

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">
                            <label for="email" class="col-form-label text-md-right empty-circle-before">ایمیل</label>

                            <div class="input-field d-block">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                            <div class="form-group">
                                <label for="password"
                                       class="col-form-label text-md-right empty-circle-before">رمز عبور</label>

                                <div class="input-field @error('password') is-invalid @enderror">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           name="password" required>
                                    <span class="input-field_icon icon-right">
                        <i class="fal fa-eye-slash"></i>
                    </span>
                                </div>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password-confirm"
                                       class="col-form-label text-md-right empty-circle-before">تکرار رمز عبور</label>

                                <div class="input-field @error('password-confirm') is-invalid @enderror">
                                    <input id="password-confirm" type="password"
                                           class="form-control @error('password-confirm') is-invalid @enderror"
                                           name="password_confirmation" required>
                                    <span class="input-field_icon icon-right">
                        <i class="fal fa-eye-slash"></i>
                    </span>
                                </div>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">
                                    بازیابی رمز عبور
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
    </div>
</div>
    </section>
@endsection
@section('scripts')
    $(document).ready(function(){
    $('.input-field_icon').click(function(){
    if($(this).find('i').hasClass('fa-eye-slash')){
    $(this).prev().prop('type','text')
    $(this).find('i').removeClass('fa-eye-slash').addClass('fa-eye');
    }
    else{
    $(this).prev().prop('type','password')
    $(this).find('i').removeClass('fa-eye').addClass('fa-eye-slash');
    }

    });
    });
@endsection