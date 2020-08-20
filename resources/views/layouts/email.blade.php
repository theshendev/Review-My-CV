<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--<title>پیام دریافتی از قصر نیلی</title>--}}
    <style>
        body{
            direction: rtl;
        }
        .container {
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }
        @media (min-width: 576px) {
            .container {
                max-width: 540px;
            }
        }
        @media (min-width: 768px) {
            .container {
                max-width: 720px;
            }
        }
        @media (min-width: 992px) {
            .container {
                max-width: 960px;
            }
        }
        @media (min-width: 1200px) {
            .container {
                max-width: 1140px;
            }
        }
        table{
            width: 100%;
            border-spacing: 0;
            border-collapse: collapse;

        }

        th{
            width: 30%;
            background-color: #c91192;
            color: white;
            padding: 3rem;
            border-bottom: 2px solid #4A1800;


        }
        td{
            width: 50%;
            padding: 3rem;
            border-bottom: 2px solid #4A1800;


        }
        td p{
            width: 80%;
            margin: auto;
            text-align: justify;
        }
        .card{
            /*padding: 2rem;*/
            border: 2px solid #4A1800;
            width: 100%;
        }
        hr{
            width: 200px;
            height: 2px;
            background: #00354E;
            border-radius: 50%;
        }
        h3{
            margin-bottom: 2rem;
        }
        @media (max-width: 576px) {
            td , th {
                display: block;
                width: 100%;
                padding-right: 0;
                padding-left: 0;
            }
            .container{
                padding: 0;
            }
        }
    </style>
</head>
<body>
<header>
    <div style="text-align: center">
        <img class="logo-main" src="{{asset('images/logo.png')}}" alt="logo-1" width="200px">
    </div>
</header>
<hr>
<section style="text-align: center;margin-top: 2rem;">
    <div class="container">
        <h3>@yield('title')</h3>
        <div class="card">
            @yield('content')
        </div>
    </div>
</section>

</body>
</html>
