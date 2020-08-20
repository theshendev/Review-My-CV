@extends('layouts.email')
@section('title')
    Verification Email
@endsection
@section('content')

    <p>Hello</p>
    <p>Your account has been created, please activate your account by clicking this link</p>
    <p><a class="btn btn-primary" href="{{ $url }}">
            Verify Email Address
        </a></p>

    <p>Thanks</p>



@endsection
