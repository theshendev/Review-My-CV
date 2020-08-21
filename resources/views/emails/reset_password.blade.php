@extends('layouts.email')
@section('title')
    Reset Password Email
@endsection
@section('content')

    <p>Hello</p>
    <p>You are receiving this email because we received a password reset request for your account.</p>
    <p><a class="btn btn-primary" href="{{ $url }}">
            Reset Password
        </a></p>

    <p>Thanks</p>



@endsection
