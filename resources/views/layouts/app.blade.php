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
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .custom-select{
            width: 13%;
            text-align: center;
            border-radius: 20px;
        }

        .test:after {
            content: ""; /* This is necessary for the pseudo element to work. */
            display: block; /* This will put the pseudo element on its own line. */
            margin: 0 auto; /* This will center the border. */
            width: 95%; /* Change this to whatever width you want. */
            padding-top: 20px; /* This creates some space between the element and the border. */
            border-bottom: 1px solid black; /* This creates the border. Replace black with whatever color you want.*/
        }
        /*.custom-selected{*/
            /*border-radius: 20px;*/
            /*width: 15%;*/
            /*text-align: center;*/
            /*border: 1px solid white;*/
            /*-moz-appearance:none; !* Firefox *!*/
            /*-webkit-appearance:none; !* Safari and Chrome *!*/
            /*appearance:none;*/
        /*}*/
        /*.custom-selected:after {*/
            /*position: absolute;*/
            /*content: "asdasdas";*/
            /*top: 14px;*/
            /*right: 10px;*/
            /*width: 0;*/
            /*height: 0;*/
            /*border: 6px solid blue;*/
            /*border-color: blue transparent transparent transparent;*/
        /*}*/
        h2{
            width: 85%;
        }
        h2:after {
            content:"";
            display: inline-block;
            height: 0.5em;
            vertical-align: bottom;
            width: 80%;
            margin-right: 10px;
            margin-left: -100%;
            border-top: 1px solid black;
        }
    </style>
</head>
<body>
    <div id="app">
        @include('partials.nav')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
