@extends('layouts.app')
@section('title','تایید ایمیل')
@section('content')
    <section class="verify-notice">
        <div class="container">
            <div class="row">
                <div class="verify-notice_caption col-md-9 col-lg-6 offset-lg-1">
                    @if (session('resent'))
                        <div class="alert alert-success text-center my-3" role="alert">
                            لینک تایید تازه‌ای به آدرس ایمیل شما ارسال شد.
                        </div>
                    @endif
                    <h3>
                        <span class="fal fa-frown"></span>
                        هنوز ایمیل ات رو تایید نکردی؟
                    </h3>
                    <p>
                        قبل از ادامه دادن، ایمیل خود را برای ایمیل تایید چک کنید، اگر ایمیلی دریافت نکردید، کلیک کنید تا ایمیل دیگری برایتان ارسال شود.
                    </p>

                        <form class="text-center mt-4" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary">ارسال مجدد ایمیل</button>
                        </form>
                </div>
                <div class="col-md-9 mx-auto col-lg-5">
                    <img width="100%" src="{{asset('images/4.png')}}" alt="">
                </div>

            </div>
        </div>
    </section>
@endsection
