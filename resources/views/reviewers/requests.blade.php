@extends('layouts.app')
@section('title','وضعیت درخواست‌ها')
@section('content')
    <section class="requests-container">
        <div class="container">
            <div class="row">
                <h3 class="heading-line full-circle-before">
                    وضعیت درخواست ها
                </h3>
            </div>
            <div class="requests">
            @forelse($requests as $request)
                <div class="row no-gutters request">
                    <div class="col-md-8">
                        <p class="text-right">
                            درخواست بررسی رزومه از طرف
                            {{$request->name}}
                        </p>
                    </div>
                    <div class="col-md-4 text-left">
                        <a class="btn btn-custom" href="{{route('users.show',['user'=>$request])}}">
                            مشاهده پروفایل
                        </a>
                    </div>
                </div>
                @empty
                <h5 class="text-center text-white" dir="rtl">درخواستی برای شما وجود ندارد.</h5>
            @endforelse
        </div>
            ‌</div>
    </section>
@endsection