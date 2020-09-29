@extends('layouts.app')

@section('content')
    <section class="change-password text-white">
    <div class="container">
        @if(session('status'))
            <div class="alert alert-success text-right">
                {{ session('status') }}
            </div>
        @endif

        <div class="row mt-5">
            <h3 class="heading-line full-circle-before">تغییر رمز عبور</h3>
        </div>
    <form action="{{route("password.auth.update")}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="change-password_form">

            <div class="form-group">
                <label for="current-password"
                       class="col-form-label text-md-right empty-circle-before">رمز عبور کنونی</label>

                <div class="input-field @error('current-password') is-invalid @enderror">
                    <input id="current-password" type="password"
                           class="form-control @error('current-password') is-invalid @enderror"
                           name="current-password" required>
                    <span class="input-field_icon icon-right">
                        <i class="fal fa-eye-slash"></i>
                    </span>
                </div>
                @error('current-password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="new-password"
                       class="col-form-label text-md-right empty-circle-before">رمز عبور جدید</label>

                <div class="input-field @error('new-password') is-invalid @enderror">
                    <input id="new-password" type="password"
                           class="form-control @error('new-password') is-invalid @enderror"
                           name="new-password" required>
                    <span class="input-field_icon icon-right">
                        <i class="fal fa-eye-slash"></i>
                    </span>
                </div>
                @error('new-password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="new-password-confirm"
                       class="col-form-label text-md-right empty-circle-before">تکرار رمز عبور جدید</label>

                <div class="input-field @error('new-password-confirm') is-invalid @enderror">
                    <input id="new-password-confirm" type="password"
                           class="form-control @error('new-password-confirm') is-invalid @enderror"
                           name="new-password_confirmation" required>
                    <span class="input-field_icon icon-right">
                        <i class="fal fa-eye-slash"></i>
                    </span>
                </div>
                @error('new-password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <div class="form-group text-center">
                <button class="btn btn-success">
                    ثبت تغییرات
                </button>
            </div>
        </div>
    </form>
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