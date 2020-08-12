@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-start my-5" dir="rtl">
            <h2 class="text-right">
                فهرست ارزیاب ها

            </h2>

                <select class="custom-select">
                    <option value="adasd">بالاترین رتبه</option>
                </select>
            <div class="test row border-left border-right text-right border-dark w-100">
                <div class="col-10">
                    <div class="row">
                        <div class="col-2">
                        <img style="width: 150px;height: 150px;" class="img-thumbnail rounded-circle" src="https://andrejgajdos.com/wp-content/uploads/2019/09/custom-select-dropdown-html-730x350.png?x80378" alt="">
                        </div>
                        <div class="col-9 align-self-center text-right">
                        <p>
                            حمیدرضا شندآبادی
                        </p>
                        <p>
                            منابع انسانی علی بابا
                        </p>
                        </div>
                    </div>
                </div>
                <div class="col-2 align-self-center">
                    <button class="btn btn-warning w-100 mb-2">
                        انتخاب ارزیاب
                    </button>
                    <br>
                    <button class="btn btn-primary w-100">
                       مشاهده پروفایل
                    </button>
                </div>

            </div>
        </div>
        {{--<div class="row justify-content-center my-5">--}}
            {{--<div class="col-8">--}}
                {{--<div class="card">--}}
                    {{--<div class="card-header">--}}
                        {{--Reviewers--}}
                    {{--</div>--}}
                    {{--<div class="card-body">--}}
                        {{--@foreach($reviewers as $reviewer)--}}
                            {{--<div class="row">--}}

                                {{--<div class="col-md-8 align-self-center" style="font-size: 1.3rem">--}}

                                    {{--{{$reviewer->name}}--}}
                                    {{--<small style="color: #f66d9b;">{{$reviewer->position}} at {{$reviewer->company}}</small>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-4">--}}
                                    {{--@if(\Illuminate\Support\Facades\Auth::user()->allowed_reviewers()->where('expires_at','>',now())->where('allowed_reviewer_id',$reviewer->id)->exists())--}}
                                        {{--<a class="btn btn-info" href="{{route('forbid_reviewer',['user'=>\Illuminate\Support\Facades\Auth::id(),'reviewer'=>$reviewer->id])}}">--}}
                                            {{--Forbid user from seeing my CV--}}
                                        {{--</a>--}}
                                    {{--@else--}}
                                        {{--<a class="btn btn-primary" href="{{route('allow_reviewer',['user'=>\Illuminate\Support\Facades\Auth::id(),'reviewer'=>$reviewer->id])}}">--}}
                                            {{--Allow to see my CV--}}
                                        {{--</a>--}}
                                    {{--@endif--}}

                                {{--</div>--}}
                            {{--</div>--}}
                    {{--</div>--}}

                    {{--@endforeach--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
@endsection
