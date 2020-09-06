@extends('layouts.app')
@section('content')
    <section class="about">
        <div class="container">
            @if (session('status'))
                @if(session('status.success'))
                    <div class="alert alert-success">
                        {{ session('status.success') }}
                    </div>
                @else
                    <div class="alert alert-danger">
                        {{ session('status.failure') }}
                    </div>
                @endif

            @endif
            <section class="buy-coffee">
                <div class="row about-text">
                    <div class="col-md-8">
                        <h1 class="buy-coffee_heading">
                            قهوه، مهمان شما؟!
                        </h1>
                        <p class="buy-coffee_caption">
                            این پلتفرم رایگان است و رایگان خواهد ماند. جهت حمایت مالی از نگه‌داشت و توسعه‌ی این پلتفرم
                            خستگی ما را به در کنید :)
                        </p>
                        <form id="coffee-form" action="{{route('payment')}}" method="post">
                            @csrf
                            <input type="hidden" name="amount" id="amount">
                            <div class="buy-coffee_payment">
                                <div class="row">
                                    <div class="quantity col-6 row no-gutters">
                                        <div class="col-md-4">
                                            <span class="fal fa-plus"></span>
                                        </div>
                                        <div class="col-md-4">
                                        <span>
                                            <span>x</span>
                                            <span id="qty">1</span>

                                        </span>
                                        </div>
                                        <div class="col-md-4">
                                            <span class="fal fa-minus"></span>
                                        </div>
                                    </div>
                                    <div class="price col-6">
                                        <span id="price">
                                            12,000
                                        </span>
                                        <span>
                                            تومن
                                        </span>
                                    </div>

                                </div>

                            </div>
                            <div class="row justify-content-center mt-3">
                                <button class="btn btn-yellow-primary">
                                    خرید
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <img width="100%" src="{{asset('images/coffee.png')}}" alt="">
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-12 p-0 text-right">
                    <h4 class="text-white heading-line">درباره ما</h4>
                </div>
            </div>
            <section class="about-website">
                <div class="row">
                    <div class="col-md-4">
                        <img class="w-100" src="{{asset('images/main.png')}}" alt="">
                    </div>
                    <div class="col-md-6 offset-md-2 p-0">
                        <div class="about-text">
                            <p>
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک
                                است،
                                چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی
                                تکنولوژی
                                مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت
                                و
                                سه
                                درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت
                                بیشتری
                                را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد،
                                در
                                این
                                صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به
                                پایان
                                رسد و
                                زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود
                                طراحی
                                اساسا مورد استفاده قرار گیرد.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ،
                                و با
                                استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که
                                لازم
                                است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای
                                کاربردی
                                می
                                باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را
                                می
                                طلبد،
                                تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ
                                پیشرو
                                در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه
                                راهکارها،
                                و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی
                                سوالات
                                پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد. </p>
                        </div>
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-12 p-0 text-right">
                    <h4 class="text-white heading-line">توسعه دهنده ها</h4>
                </div>
            </div>
            <section class="about-us">
                <div class="row developer">
                    <div class="col-md-4">
                        <img class="w-100" src="{{asset('images/user-register.png')}}" alt="">
                    </div>
                    <div class="col-md-7 offset-md-1 p-0">
                        <h5 class="about-title">
                            حمیدرضا شندآبادی (موسس)
                        </h5>
                        <div class="about-text">
                            <p>
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک
                                است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط
                                فعلی
                                تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای
                                زیادی
                                در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم
                                افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در
                                زبان
                                فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها،
                                و
                                شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی
                                سوالات
                                پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.لورم ایپسوم متن ساختگی با
                                تولید

                            </p>
                        </div>
                    </div>
                </div>
                <div class="row developer">

                    <div class="col-md-7">
                        <h5 class="about-title">
                            حسین شندآبادی (برنامه نویس)
                        </h5>
                        <div class="about-text">
                            <p>
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک
                                است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط
                                فعلی
                                تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای
                                زیادی
                                در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم
                                افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در
                                زبان
                                فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها،
                                و
                                شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی
                                سوالات
                                پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.لورم ایپسوم متن ساختگی با
                                تولید

                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 offset-md-1  p-0">
                        <img class="w-100" src="{{asset('images/reviewer-register.png')}}" alt="">
                    </div>
                </div>
                <div class="row developer">
                    <div class="col-md-4">
                        <img class="w-100" src="{{asset('images/user-register.png')}}" alt="">
                    </div>
                    <div class="col-md-7 offset-md-1 p-0">
                        <h5 class="about-title">
                            محمد شندآبادی (طراح)
                        </h5>
                        <div class="about-text">
                            <p>
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک
                                است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط
                                فعلی
                                تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای
                                زیادی
                                در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم
                                افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در
                                زبان
                                فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها،
                                و
                                شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی
                                سوالات
                                پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.لورم ایپسوم متن ساختگی با
                                تولید

                            </p>
                        </div>
                    </div>
                </div>

            </section>
        </div>

    </section>
@endsection
@section('scripts')
    $(document).ready(function(){
    let price = 12000;
    let qty = $('#qty');
    let qty_value,final_price,index;
    $('.fal').click(function(){
    qty_value = parseInt(qty.text());
    if($(this).hasClass('fa-plus')){
    qty_value++;
    }
    else if($(this).hasClass('fa-minus')){
        if(qty_value<=1){
        return false;
    }
    qty_value--;
    }
    qty.text(qty_value);
    final_price = String(qty_value*price);
    index = final_price.length-3;
    arr_final_price = final_price.split("");
    arr_final_price[index] = ',0';
    if(final_price.length==7){
    arr_final_price[index-3] = ',0';
    }
    edited_final_price = arr_final_price.join("");
    $('#price').text(edited_final_price);
    });
    $('#coffee-form').submit(function(){

    $('#amount').val($('#price').text().replace(',',''));
    });
    });
@endsection