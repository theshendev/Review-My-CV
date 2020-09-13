@extends('layouts.email')
@section('title')
    Login Information
@endsection
@section('content')

    <p>Hello</p>
    <p>Welcome to our website.</p>
    <p>This is your login info.</p>
    <p>
        Email: {{$email}}
    </p>
    <p>
        Password: {{$password}}
    </p>




@endsection
