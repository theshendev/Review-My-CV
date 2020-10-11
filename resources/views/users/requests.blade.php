@extends('layouts.app')

@section('content')
    <section class="requests-container">
        <div class="container">
            <div class="row">
                <div class="col-12">
                <h3 class="heading-line full-circle-before">
                    وضعیت درخواست ها
                </h3>
                </div>
            </div>
            <div class="requests">
                @foreach($requests as $request)
                    <div class="row no-gutters request">
                        <div class="col-md-8 my-3 my-md-0">
                            <p class="text-md-right">
                                درخواست بررسی رزومه برای
                                {{$request->name}}
                            </p>
                        </div>
                        <div class="col-md-4 text-md-left mb-3 mb-md-0">
                            <span>
                                وضعیت:
                            </span>
                            <span class="font-weight-bold">
                                @if(reviewerCommented(Auth::user(),$request) and getComment(Auth::user(),$request)->is_checked==0)
                                    بررسی شد
                                    <a href="{{route('comment.show',['id'=> getComment(Auth::user(),$request)])}}">مشاهده</a>
                                @elseif(reviewerCommented(Auth::user(),$request) and getComment(Auth::user(),$request)->is_checked==1)
                                    اتمام بررسی
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