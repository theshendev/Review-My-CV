@extends('layouts.app')
@section('title','درباره ما')
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
                    <div class="col-lg-8">
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
                                    <div class="quantity col-8 col-sm-6 row no-gutters order-1 order-sm-0">
                                        <div class="col-4">
                                            <span class="fal fa-plus"></span>
                                        </div>
                                        <div class="col-4">
                                        <span>
                                            <span>x</span>
                                            <span id="qty">1</span>

                                        </span>
                                        </div>
                                        <div class="col-4">
                                            <span class="fal fa-minus"></span>
                                        </div>
                                    </div>
                                    <div class="price col-sm-6">
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
                    <div class="col-lg-4 buy-coffee_image">
                        <img width="100%" src="{{asset('images/about/coffee.png')}}" alt="coffee">
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-12 text-right">
                    <h4 class="text-white heading-line">درباره ما</h4>
                </div>
            </div>
            <section class="about-website">
                <div class="row">
                    <div class="col-lg-5 col-xl-4 about-image">
                        <img src="{{asset('images/logos/main.png')}}" alt="ReviewMyCV">
                    </div>
                    <div class="col-lg-6 col-xl-7 offset-lg-1 align-self-center">
                        <div class="about-text">
                            <p>
                                این پروژه دین ما است به بازار کار ایران که حداقل نیاز یک شخص جویای کار، که یک رزومه‌ی
                                حرفه‌ای و
                                استاندارد و در عین حال منحصر به فرد هست رو برطرف کنه.
                                ما، اجتماعی از متخصصان منابع انسانی و استخدام هستیم و سعی داریم از طریق این پلتفرم
                                رزومه‌های افراد جویای
                                کار رو بررسی کنیم و نکاتی که برای داشتن یه رزومه‌ی حرفه‌ای و معتبر لازم هست رو بهشون
                                یادآوری کنیم.

                                به اجتماع مدیریت منابع انسانی Open-Source بپیوندید :)
                                همچنین اگر جویای کار هستین، می‌تونین از متخصصانی که داوطلب بررسی رزومه‌ی شما هستن کمک
                                بگیرین. </p></div>
                    </div>
                </div>
            </section>
            <div class="row">
                <div class="col-12 text-right">
                    <h4 class="text-white heading-line">توسعه دهنده ها</h4>
                </div>
            </div>
            <section class="about-us">
                <div class="row developer">
                    <div class="col-lg-5 col-xl-4 about-image">
                        <img src="{{asset('images/about/hr-sh.jpg')}}" alt="حمیدرضا شندآبادی">
                    </div>
                    <div class="col-lg-6 col-xl-7 offset-lg-1">
                        <h5 class="about-title">
                            حمیدرضا شندآبادی (موسس)
                        </h5>
                        <div class="about-text">
                            <p>
                                من حمیدرضا شندآبادی هستم. دوستان و همکارانم من رو شند صدا می‌زنن.
                                ایده‌ی این پروژه زمانی شکل گرفت که در لینکدین شخصی اعلام کردم که می تونم داوطلبانه به
                                افراد کمک کنم و نکاتی رو در مورد رزومه‌شون توضیح بدم که بتونن از نظر سازمان‌ها رزومه‌ی
                                حرفه‌ای‌تر و چشم‌گیر‌تری داشته باشن.

                                با توجه به علاقه‌ای که به دنیای Open-Source نرم‌افزارها دارم، این ایده‌ی مدیریت منابع
                                انسانی Open-Source، جایی که همه‌ی متخصصان HR کمک می‌کنن به توسعه و ارتقای جامعه‌ی
                                حرفه‌ای ایران، در ذهنم شکل گرفت که پروژه‌ی ReviewMyCV اولین گام در این زمینه است.

                                ما رو همراهی کنید.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row developer">

                    <div class="col-lg-6 col-xl-7 align-self-center">
                        <h5 class="about-title">
                            حسین شندآبادی (توسعه دهنده‌ی وب)
                        </h5>
                        <div class="about-text">
                            <p>
                                من یک ساله در زمینه‌ی توسعه‌ی وب کار میکنم و یاد می گیرم. این سایت، سومین پروژه‌ی آنلاین
                                من حساب میشه.
                                ابتدای کار هستم و خیلی چیزا برای یادگیری پیش رو دارم. این پروژه، چالش خوبی برای
                                یادگیری های
                                بیشتر بود و هدف نهایی پروژه که هموار کردن مسیر استخدامه، برای من با ارزشه. کدهای پروژه به صورت عمومی روی گیت هاب من
                                موجوده. اگر از نگاه شما نقصی وجود داره و یا پیشنهادی برای بهبودی سایت دارید، حتما باهام
                                در تماس باشید.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-5 col-xl-4 offset-lg-1 p-0 about-image">
                        <img src="{{asset('images/about/h-sh.jpg')}}" alt="حسین شندآبادی">
                    </div>
                </div>
                <div class="row developer">
                    <div class="col-lg-5 col-xl-4 about-image">
                        <img src="{{asset('images/about/m-sh.jpg')}}" alt="محمد شندآبادی">
                    </div>
                    <div class="col-lg-6 col-xl-7 offset-lg-1 align-self-center">
                        <h5 class="about-title">
                            محمد شندآبادی (طراح و گرافیست)
                        </h5>
                        <div class="about-text">
                            <p>
                                من محمد شندآبادی ، کارشناسی طراحی صنعتی و طراح گرافیک . در حال آموزش دیدن UI\UX هستم و
                                این پروژه، اولین پروژه‌ی اجرا شده‌ی من تحت عنوان طراحی سایت میباشد. سعی شده است که در
                                این
                                سایت، کاربر و ارزیاب بدون هیچ پیچیدگی با یکدیگر در ارتباط باشند و تجربه‌ی دلچسبی
                                داشته باشند. در صورت داشتن هر انتقاد یا پیشنهاد در "تماس با ما" میتونید با من در ارتباط
                                باشید.
                            </p>
                        </div>
                    </div>
                </div>

            </section>
        </div>

    </section>
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            let price = 12000;
            let qty = $('#qty');
            let qty_value, final_price, index;
            $('.fal').click(function () {
                qty_value = parseInt(qty.text());
                if ($(this).hasClass('fa-plus')) {
                    qty_value++;
                } else if ($(this).hasClass('fa-minus')) {
                    if (qty_value <= 1) {
                        return false;
                    }
                    qty_value--;
                }
                qty.text(qty_value);
                final_price = String(qty_value * price);
                index = final_price.length - 3;
                arr_final_price = final_price.split("");
                arr_final_price[index] = ',0';
                if (final_price.length == 7) {
                    arr_final_price[index - 3] = ',0';
                }
                edited_final_price = arr_final_price.join("");
                $('#price').text(edited_final_price);
            });
            $('#coffee-form').submit(function () {

                $('#amount').val($('#price').text().replace(',', ''));
            });
        });
    </script>
@endpush