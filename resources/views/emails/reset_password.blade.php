@extends('layouts.email')
@section('title')
    Reset Password Email
@endsection
@section('content')

    <p>
        <a class="btn btn-primary" href="{{ $url }}">
            Reset Password
        </a>
    </p>

    <p>Thanks</p>



@endsection
