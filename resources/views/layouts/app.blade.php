<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('fonts/font-awesome/css/font-awesome.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    @yield('head')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <style>
        body{
            background: @yield('body_bg','#063443');
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        /*.custom-select{*/
            /*width: 13%;*/
            /*text-align: center;*/
            /*border-radius: 20px;*/
        /*}*/

    </style>
</head>
<body>
    <div id="app">
        @includeWhen(!Str::contains(Request::path(),'login'),'partials.nav')
        <main class="py-4">
            @yield('content')
        </main>
    </div>

        @stack('scripts')
</body>
</html>
