@extends('layouts.app')
@section('content')
    <section class="comments">
        <div class="container">
            <div class="row">
                <h3 class="heading-line full-circle-before mb-3">
                    نظرات ارزیاب ها
                </h3>
            </div>
            <div class="comments-list">
                @foreach($comments as $comment)
                    <div>
                        <div class="comments-list_comment">
                            {{Str::limit(strip_tags($comment->body),50)}}

                        </div>
                        <div class="reviewer-info row no-gutters mt-5 text-center text-lg-right">
                            <div class="col-lg-7 col-xl-8 row">
                                <div class="col-lg-4 col-xl-3 reviewer-info_image">
                                    <img class="rounded-circle" src="{{$comment->reviewer->image}}" alt="">
                                </div>
                                <div class="col-lg-8 col-xl-9 reviewer-info_caption">
                                    <h4>
                                        {{$comment->reviewer->name}}
                                    </h4>
                                    <p>

                                        {{$comment->reviewer->position}}
                                    </p>
                                    <p>
                                        {{$comment->reviewer->company}}
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-5 col-xl-4 rating-wrapper mt-4 mt-md-0">

                                <div class="col-12">
                                    <div class="reviewer-score-icons">
                                        <span class="fa fa-star{{$comment->score==0.5 ? "-half-alt" : ($comment->score>=1 ? " full" : "")}}"></span>
                                        <span class="fa fa-star{{$comment->score==1.5 ? "-half-alt" : ($comment->score>=2 ? " full" : "")}}"></span>
                                        <span class="fa fa-star{{$comment->score==2.5 ? "-half-alt" : ($comment->score>=3 ? " full" : "")}}"></span>
                                        <span class="fa fa-star{{$comment->score==3.5 ? "-half-alt" : ($comment->score>=4 ? " full" : "")}}"></span>
                                        <span class="fa fa-star{{$comment->score==4.5 ? "-half-alt" : ($comment->score>=5 ? " full" : "")}}"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection