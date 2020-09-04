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
                    @if($user->getTable()=='reviewers')
                        <h6 class="col-12 text-center text-white" dir="rtl">
                            {{$user->position}} در شرکت {{$user->company}}
                        </h6>
                        @else
                        @if(!relationExists($user,auth('reviewer')->user()) or isRelationExpired($user,auth('reviewer')->user()))
                            <h6 class="col-12 text-center text-white">
                                شما مجاز به دیدن رزومه نیستید
                            </h6>
                            @else
                            <div class="col-12 text-center">
                            <a class="btn btn-primary" href="sss">دانلود رزومه</a>
                            </div>
                                @endif
                    @endif
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
            {{--@if($user->allowed_reviewers()->where('expires_at','>',now())->where('allowed_reviewer_id',auth('reviewer')->id())->exists() and !$commentExists)--}}
                {{--<div class="row col-8 mt-3">--}}
                    {{--<form action="{{route('comment.store',['user'=>$user->id])}}" method="post">--}}
                        {{--@csrf--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="body">Comment Body</label>--}}
                            {{--<textarea class="form-control" name="body" id="body" rows="3"></textarea>--}}
                        {{--</div>--}}
                        {{--<button class="btn btn-success">--}}
                            {{--Submit--}}
                        {{--</button>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--@endif--}}
        </div>
    </section>
@endsection