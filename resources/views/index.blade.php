@extends('layouts.app')
@section('content')
    <section class="home">
        @if(session('status'))
            <div class="container">
                <div class="alert alert-primary text-right" dir="rtl">
                    {{ session('status') }}
                </div>
            </div>

        @endif
        @includeWhen(Auth::guard(getGuard())->check(),'partials.index.auth')
        @includeWhen(!Auth::guard(getGuard())->check(),'partials.index.guest')

    </section>
@endsection