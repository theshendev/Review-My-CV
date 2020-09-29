@extends('layouts.app')

@section('content')
    <section class="requests-container">
        <div class="container">
            <div class="row">
                <h3 class="heading-line full-circle-before">
                    وضعیت درخواست ها
                </h3>
            </div>
            <div class="requests">
            @foreach($requests as $request)
                <div class="row no-gutters request">
                    <div class="col-md-8">
                        <p>
                            درخواست بررسی رزومه از طرف
                            {{$request->name}}
                        </p>
                    </div>
                    <div class="col-md-4 text-left">
                        <a class="btn btn-custom" href="{{route('user.show',['user'=>$request])}}">
                            مشاهده پروفایل
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
            ‌</div>
    </section>
@endsection