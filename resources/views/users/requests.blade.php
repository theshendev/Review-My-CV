@extends('layouts.app')

@section('content')
    <section class="requests-container">
        <div class="container">
            <div class="row">
                <h3 class="heading-line">
                    وضعیت درخواست ها
                </h3>
            </div>
            <div class="requests">
                @foreach($requests as $request)
                    <div class="row no-gutters request">
                        <div class="col-md-8">
                            <p>
                                درخواست بررسی رزومه برای
                                {{$request->name}}
                            </p>
                        </div>
                        <div class="col-md-4 text-left">
                            <span>
                                وضعیت:
                            </span>
                            <span class="font-weight-bold">
                                @if(reviewerCommented(Auth::user(),$request))
                                    بررسی شد
                                    <a href="">مشاهده</a>
                                @else
                                    در انتظار بررسی
                                @endif
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection