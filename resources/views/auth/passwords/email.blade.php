@extends('layouts.app')

@section('content')
    <section class="reset-password">

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-10 col-lg-9">
                <h3 class="heading-line full-circle-before overflow-hidden">بازیابی رمز عبور</h3>

                    @if (session('status'))
                        <div class="alert alert-success text-right my-3" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="col-md-9 mx-auto mt-5" method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group text-right">
                            <label for="email" class="col-form-label empty-circle-before text-white mb-2">ایمیل</label>

                            <div class="input-field">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{auth(getGuard())->check() ? auth(getGuard())->user()->email : old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center mt-4">
                            <div>
                                <button type="submit" class="btn btn-primary">
                                    ارسال لینک بازیابی
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
