@extends('layouts.email')
@section('title')
    اطلاعات ورود به حساب
@endsection
@section('content')

    <p>سلام، به سایت ما خوش آمدید. امیدواریم تجربه‌ی خوبی داشته باشید.</p>
    <p>با ما در تماس باشید و نظرهای خود را به ما اطلاع دهید</p>
    <p style="margin-top: 4rem">اطلاعات ورود به حساب شما به شرح زیر است:</p>
    <p>
        ایمیل:{{$email}}
    </p>
    <p>
        رمز عبور: {{$password}}
    </p>




@endsection
