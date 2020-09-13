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
            <h3 class="heading-line">تغییر رمز عبور</h3>
        </div>
    <form action="{{route("password.update")}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="change-password_form">

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
                <button class="btn btn-success">
                    ثبت تغییرات
                </button>
            </div>
        </div>
    </form>
    </div>
    </section>
@endsection