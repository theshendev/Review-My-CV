@extends('layouts.app')
@section('head')
    <link rel="stylesheet" href="{{asset('css/star-rating.min.css')}}" />
    <script src="{{asset('js/star-rating.min.js')}}"></script>

@endsection
@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger text-right">
                <ul class="list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                {{$comment->reviewer->name}}
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        {!! $comment->body !!}
                    </div>
                    @if(!$comment->is_checked)
                    <div class="col-4">
                            <form action="{{route('reviewer.score',['reviewer'=>$comment->reviewer,'comment'=>$comment])}}"
                                  method="post">
                                @csrf
                                <input class="rating rating-animate rating-loading" type="text" id="input-1" name="score"
                                       data-min="0" data-max="5" data-step="0.5" value="2.5"
                                       data-size="sm"  data-show-caption="true" data-show-clear="false">
                                <button id="submit" type="submit">ثبت امتیاز</button>
                            </form>

                    </div>
                        @else
                        <div class="col-4">
                            <div class="reviewer-score-icons">
                                <span class="fa fa-star{{$comment->score==0.5 ? "-half-alt" : ($comment->score>=1 ? " full" : "")}}"></span>
                                <span class="fa fa-star{{$comment->score==1.5 ? "-half-alt" : ($comment->score>=2 ? " full" : "")}}"></span>
                                <span class="fa fa-star{{$comment->score==2.5 ? "-half-alt" : ($comment->score>=3 ? " full" : "")}}"></span>
                                <span class="fa fa-star{{$comment->score==3.5 ? "-half-alt" : ($comment->score>=4 ? " full" : "")}}"></span>
                                <span class="fa fa-star{{$comment->score==4.5 ? "-half-alt" : ($comment->score>=5 ? " full" : "")}}"></span>
                            </div>
                        </div>
                        @endif
                </div>

            </div>

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