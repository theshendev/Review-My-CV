@extends('layouts.app')
@section('title')
    {{$user->name}}
@endsection
@section('content')
    <section class="user-show">
        <div class="container">
            <div class="user-show_information">
                <div class="row justify-content-center">
                    <div class="col-12 text-center">
                        <img class="user-image" src="{{$user->image}}" alt="">
                    </div>
                    <h4>{{$user->name}}</h4>

                    @if(!relationExists($user,auth('reviewer')->user()) or isRelationExpired($user,auth('reviewer')->user()))
                        <h6 class="col-12 text-center text-white">
                            شما مجاز به دیدن رزومه نیستید
                        </h6>
                    @else
                        <div class="col-12 text-center">
                            <a class="btn btn-primary" href="{{asset("users_cv/$user->cv")}}">دانلود رزومه</a>
                        </div>
                    @endif
                </div>
                <div class="contact-info">
                    <div class="row">
                        <h4 class="full-circle-before">
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
            @if(relationExists($user,auth('reviewer')->user()) and !isRelationExpired($user,auth('reviewer')->user()))
                <div class="row mt-3">
                    <form class="w-100" action="{{route('comment.store',['user'=>$user->id])}}" method="post">
                        @csrf
                        <div class="form-group text-right mt-4">
                            <label class="text-white mb-4 full-circle-before" for="body">نظر ارزیاب</label>
                            <textarea class="form-control" name="body" id="body" rows="3"></textarea>
                        </div>
                        <button class="btn btn-success">
                            ثبت نظر
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </section>
@endsection
@if(relationExists($user,auth('reviewer')->user()) and !isRelationExpired($user,auth('reviewer')->user()))
@section('head')
    <script src="{{asset('js/tinymce.min.js')}}"></script>
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            tinymce.init({
                selector: '#body',
                plugins: 'print preview searchreplace autolink autosave save directionality visualblocks visualchars fullscreen image link media table hr anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help quickbars emoticons',
                directionality :"rtl",
            });
        });
    </script>
@endpush
@endif