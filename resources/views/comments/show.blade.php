@extends('layouts.app')
@section('head')
    <link rel="stylesheet" href="{{asset('css/star-rating.min.css')}}" />
    <script src="{{asset('js/star-rating.min.js')}}"></script>

@endsection
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                {{$comment->reviewer->name}}
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        {{$comment->body}}
                    </div>
                    <div class="col-4">
                        {{--<div class="rating-container">--}}
                            <form action="{{route('reviewer.score',['reviewer'=>$comment->reviewer,'comment'=>$comment])}}"
                                  method="post">
                                @csrf
                                <input class="rating rating-animate rating-loading" type="text" id="input-1" name="score"
                                       data-min="0" data-max="5" data-step="0.5" value="2.5"
                                       data-size="sm"  data-show-caption="true" data-show-clear="false">
                                <button id="submit" type="submit">ثبت امتیاز</button>
                            </form>

                        {{--</div>--}}
                    </div>
                </div>

            </div>

        </div>
        <div class="row justify-content-center">
            @if(count($user->comments)>1)
                Rate the first comment to see the other one(s).
            @endif
        </div>
    </div>
@endsection
@section('scripts')
    $("#input-id").rating();
    $(document).ready(function(){
        $(".rating-stars").click(function(){
            if($(".filled-stars").width()>0){
                $("#submit").attr("disabled", false);
            }
            else{
                $("#submit").attr("disabled", true);

    }
        });

        $("form").submit(function(){
            console.log($(".rating").val());
            if($(this).val()>0){
    }

        });
    });
@endsection