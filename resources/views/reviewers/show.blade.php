@extends('layouts.app')

@section('content')
    <section class="user-show">
        <div class="container">
            <div class="user-show_information">
                <div class="row justify-content-center">
                    <div class="col-12 text-center">
                        <img class="user-image" src="{{$user->image}}" alt="">
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
                            <span class="fab fa-google">
                            </span>
                            <a href="mailto:{{$user->email}}">{{$user->email}}</a>
                        </div>
                        <div class="col-md-5">
                            <span class="fab fa-linkedin-in">
                            </span>
                            <a href="{{$user->linkedin}}">{{basename($user->linkedin)}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection