@extends('layouts.app')
{{--{{dd($errors)}}--}}
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> {{ isset($url) ? ucwords($url) : ""}} {{ __('Register') }}</div>

                    <div class="card-body">
                        @isset($url)
                            @php
                                $email='company_email'
                            @endphp
                            <form method="POST" action='{{ url("register/$url") }}' aria-label="{{ __('Register') }}">
                                @else
                                    @php
                                        $email='email'
                                    @endphp
                                    <form method="POST" action="{{ route('register') }}"
                                          aria-label="{{ __('Register') }}" enctype="multipart/form-data">
                                        @endisset
                                        @csrf

                                        <div class="form-group row">
                                            <label for="name"
                                                   class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                                            <div class="col-md-6">
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

                                        <div class="form-group row">
                                            <label for="{{$email}}"
                                                   class="col-md-4 col-form-label text-md-right">@isset($url) Company @endisset{{ __('E-Mail Address') }}</label>

                                            <div class="col-md-6">
                                                <input id="{{$email}}" type="email"
                                                       class="form-control @error($email) is-invalid @enderror"
                                                       name="{{$email}}" value="{{ old($email) }}" required
                                                       autocomplete="email">

                                                @error($email)
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ ucwords($message) }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        @isset($url)
                                            <div class="form-group row">
                                                <label for="company"
                                                       class="col-md-4 col-form-label text-md-right">{{ __('Company') }}</label>

                                                <div class="col-md-6">
                                                    <input id="company" type="text"
                                                           class="form-control @error('company') is-invalid @enderror"
                                                           name="company" value="{{ old('company') }}" required
                                                           >

                                                    @error('company')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>

                                            </div>
                                            <div class="form-group row">
                                                <label for="position"
                                                       class="col-md-4 col-form-label text-md-right">{{ __('Position') }}</label>

                                                <div class="col-md-6">
                                                    <input id="position" type="text"
                                                           class="form-control @error('position') is-invalid @enderror"
                                                           name="position" value="{{ old('position') }}" required
                                                    >

                                                    @error('position')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>

                                            </div>
                                        @endisset
                                        <div class="form-group row">
                                            <label for="phone"
                                                   class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                                            <div class="col-md-6">
                                                <input id="phone" type="text"
                                                       class="form-control @error('phone') is-invalid @enderror"
                                                       name="phone" value="{{ old('phone') }}" required
                                                       autocomplete="phone">

                                                @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password"
                                                   class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                            <div class="col-md-6">
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

                                        <div class="form-group row">
                                            <label for="password-confirm"
                                                   class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control"
                                                       name="password_confirmation" required
                                                       autocomplete="new-password">
                                            </div>
                                        </div>
                                        @isset($url)


                                            @else
                                        <div class="form-group row">
                                            <label for="cv"
                                                   class="col-md-4 col-form-label text-md-right">{{ __('Upload CV') }}</label>

                                            <div class="col-md-6">
                                                <input id="cv" type="file" class="form-control @error('cv') is-invalid @enderror"
                                                       name="cv" required>
                                                @error('cv')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>

                                        </div>

                                        @endisset
                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Register') }}
                                                </button>
                                            </div>
                                        </div>
                                        @isset($url)
                                            <a class="btn btn-link" href="{{ route('register') }}">
                                                Register as user
                                            </a>
                                        @else
                                            <a class="btn btn-link" href="{{ route('register.reviewer') }}">
                                                Register as reviewer
                                            </a>
                                        @endisset
                                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
