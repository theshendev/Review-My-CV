@extends('layouts.app')
{{--@section('body_bg')--}}
    {{--url("{{asset('images/index.jpg')}}") no-repeat center center fixed--}}

{{--@endsection--}}
@section('content')
    <section class="home">

        @includeWhen(Auth::guard(getGuard())->check(),'partials.index.auth')
        @includeWhen(!Auth::guard(getGuard())->check(),'partials.index.guest')

    </section>
@endsection