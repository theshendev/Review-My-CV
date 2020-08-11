@extends('layouts.app')
@section('content')
    <div class="container text-center">
        <div class="row justify-content-center">
            <svg height="210" width="500">
                <line x1="50%" y1="0" x2="50%" y2="100%" style="stroke:rgb(0,0,150);stroke-width:2"/>
                Sorry, your browser does not support inline SVG.
            </svg>
        </div>
        <div class="row justify-content-center">
            <svg height="20" width="500">
                <line x1="0%" y1="0" x2="100%" y2="0" style="stroke:rgb(0,0,150);stroke-width:2"/>
                Sorry, your browser does not support inline SVG.
            </svg>
        </div>
        <div class="row justify-content-center" dir="rtl">
            <h1 style="color: #FFD166">
                لورم ایپسوم متن ساختگی با تولید سادگی است.
            </h1>
            <p style="font-size: 1.2rem;width: 70%">
                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و
                متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
                کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده
                شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی
                الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و
                دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای
                اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
            </p>
        </div>

        <div class="row justify-content-center">
            <svg height="1" width="100">
                <line x1="0%" y1="0" x2="100%" y2="0" style="stroke:#FFD166;stroke-width:2"/>
                Sorry, your browser does not support inline SVG.
            </svg>
        </div>
        <div class="row justify-content-center">
            <div style="text-align: right;align-self: center;" class="col-sm-4">
                <button class="btn btn-primary">
                    ارزیاب هستم
                </button>
            </div>
            <div class="col-sm-4">
            <svg height="210" width="15">
                <line y1="0" y2="100%" style="stroke: rgb(255, 209, 102); stroke-width: 2px;" x1="57%" x2="57%"></line>
                Sorry, your browser does not support inline SVG.
            </svg>
            </div>
            <div style="text-align: left;align-self: center;" class="col-sm-4">
                <button class="btn btn-primary">
                    ارزیاب هستم
                </button>
            </div>
        </div>
    </div>
@endsection