@extends('layouts.app')
@section('body_bg')
    url("{{asset('images/index.jpg')}}") no-repeat center center fixed

@endsection
@section('content')
    <section class="home">
    <div class="container text-center">
        <div class="row justify-content-center">
            <svg height="210" width="350">
                <line x1="50%" y1="0" x2="50%" y2="100%" style="stroke:#23699b;stroke-width:2"/>
            </svg>
        </div>
        <div class="row justify-content-center">
            <svg height="20" width="500">
                <line x1="0%" y1="0" x2="100%" y2="0" style="stroke:#23699b;stroke-width:2"/>
            </svg>
        </div>
        <div class="row justify-content-center" dir="rtl">
            <h1 style="color: #FFD166;white-space: pre-line">ReviewMyCV
                پلتفرم ارزیابی داوطلبانه رزومه‌های کاری
            </h1>
            <p style="font-size: 1.2rem;width: 70%;color: white;white-space: pre-line">
                این پروژه دین ما است به بازار کار ایران که حداقل نیاز یک شخص جویای کار، که یک رزومه‌ی حرفه‌ای و استاندارد و در عین حال منحصر به فرد هست رو برطرف کنه.
                ما، اجتماعی از متخصصان منابع انسانی و استخدام هستیم و سعی داریم از طریق این پلتفرم رزومه‌های افراد جویای کار رو بررسی کنیم و نکاتی که برای داشتن یه رزومه‌ی حرفه‌ای و معتبر لازم هست رو بهشون یادآوری کنیم.

                به اجتماع مدیریت منابع انسانی Open-Source بپیوندید :)
                همچنین اگر جویای کار هستین، می‌تونین از متخصصانی که داوطلب بررسی رزومه‌ی شما هستن کمک بگیرین.            </p>
        </div>

        <div class="row justify-content-center d-none d-sm-flex">
            <svg height="1" width="200">
                <line x1="0%" y1="0" x2="100%" y2="0" style="stroke:#FFD166;stroke-width:2"/>
            </svg>
        </div>
        <div class="row justify-content-center">
            <div class="user-btn col-sm-4">
                <a href="login" class="btn btn-primary">
                    تقاضای ارزیابی رزومه
                </a>
            </div>
            <div class="col-sm-4 d-none d-sm-flex">
                <svg height="210" width="100%">
                    <line y1="0" y2="100%" style="stroke: rgb(255, 209, 102); stroke-width: 2px;" x1="50%" x2="50%"></line>
                </svg>
            </div>
            <div class="reviewer-btn col-sm-4">
                <a href="login/reviewer" class="btn btn-primary">
                    ارزیاب هستم
                </a>
            </div>
        </div>
    </div>
    </section>
@endsection