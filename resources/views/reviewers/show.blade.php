@extends('layouts.app')
@section('title')
    {{$user->name}}
@endsection
@section('content')
    <section class="user-show">
        <div class="container">
            <div class="user-show_information">
                <div class="row justify-content-center">
                    <div class="col-12 reviewer-image-container">
                        <div class="reviewer-image-wrapper">
                            <img
                                    class="reviewer-image rounded-circle"
                                    src="{{$user->image}}"
                                    alt="">
                        </div>
                        <div class="reviewer-score-icons col-12" title="{{$user->score}}">
                            <span class="fa fa-star custom-star star-{{$user->score<=1 ? $user->score*100: "100"}}"></span>
                            <span class="fa fa-star custom-star star-{{isBetween(1,2,$user->score) ? getDecimalPart($user->score)*100 : ($user->score>=2 ? "100" : "0")}}"></span>
                            <span class="fa fa-star custom-star star-{{isBetween(2,3,$user->score) ? getDecimalPart($user->score)*100 : ($user->score>=3 ? "100" : "0")}}"></span>
                            <span class="fa fa-star custom-star star-{{isBetween(3,4,$user->score) ? getDecimalPart($user->score)*100 : ($user->score>=4 ? "100" : "0")}}"></span>
                            <span class="fa fa-star custom-star star-{{isBetween(4,5,$user->score) ? getDecimalPart($user->score)*100 : ($user->score>=5 ? "100" : "0")}}"></span>
                        </div>
                    </div>
                    <h4>{{$user->name}}</h4>
                        <h6 class="col-12 text-center text-white" dir="rtl">
                            {{$user->position}}
                        </h6>
                        <h6 class="col-12 text-center text-white" dir="rtl">
                            {{$user->company}}

                        </h6>
                </div>
                <div class="contact-info">
                    <div class="row">
                        <h4>
                            اطلاعات تماس
                        </h4>
                    </div>
                    <div class="contact-info_box row">
                        <div class="col-md-7">
                            <span class="fab fa-google pr-2 border-right">
                            </span>
                            <a href="mailto:{{$user->email}}">{{$user->email}}</a>
                        </div>
                        <div class="col-md-5">
                            <span class="fab fa-linkedin-in pr-2 border-right">
                            </span>
                            <a href="{{$user->linkedin}}">{{basename($user->linkedin)}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection