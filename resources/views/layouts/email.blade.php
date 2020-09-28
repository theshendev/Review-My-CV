<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>پیام دریافتی از ReviewMyCV</title>
    <style>
        body{
            direction: rtl;
            background-color: #063443;
            color: #fff !important;
        }
        .container {
            padding-top: 3rem;
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
<section style="text-align: center;margin-top: 2rem;">
    <div class="container">
        <div style="text-align: center">
            <a href="{{url('/')}}">
            <img class="logo-main" src="{{asset('images/logo.png')}}" alt="logo-1" width="200px">
            </a>
        </div>
        <h3>@yield('title')</h3>
        <div class="card">
            @yield('content')
        </div>
    </div>
</section>

</body>
</html>
