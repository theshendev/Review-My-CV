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
            @if(relationExists($user,auth('reviewer')->user()) and !isRelationExpired($user,auth('reviewer')->user()))
                <div class="row mt-3">
                    <form class="w-100" action="{{route('comment.store',['user'=>$user->id])}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="body">Comment Body</label>
                            <textarea class="form-control" name="body" id="body" rows="3"></textarea>
                        </div>
                        <button class="btn btn-success">
                            Submit
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
    $(document).ready(function() {
    tinymce.init({
    selector: '#body',
    plugins: 'print preview searchreplace autolink autosave save directionality visualblocks visualchars fullscreen image link media table hr anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help quickbars emoticons',
    });
    });
@endpush
@endif