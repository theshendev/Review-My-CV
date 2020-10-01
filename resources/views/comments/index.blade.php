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
                            {!! Str::limit(strip_tags($comment->body),50) !!}
                            <a href="{{route('comment.show',['id'=>$comment->id])}}">مشاهده کامنت</a>
                        </div>
                        <div class="reviewer-info row no-gutters mt-5 text-center text-lg-right">
                            <div class="col-lg-7 col-xl-8 d-block d-lg-flex">
                                <div class="col-lg-4 col-xl-3 reviewer-info_image">
                                    <img class="rounded-circle" src="{{$comment->reviewer->image}}" alt="">
                                </div>
                                <div class="col-lg-8 col-xl-9 reviewer-info_caption my-4 my-lg-0">
                                    <h5>
                                        {{$comment->reviewer->name}}
                                    </h5>
                                    <p>

                                        {{$comment->reviewer->position}}
                                    </p>
                                    <p>
                                        {{$comment->reviewer->company}}
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-5 col-xl-4 rating-wrapper">

                                <div class="col-12 text-center">
                                    @isset($comment->score)
                                        <div class="reviewer-score-icons">
                                            <span class="fa fa-star{{$comment->score==0.5 ? "-half-alt" : ($comment->score>=1 ? " full" : "")}}"></span>
                                            <span class="fa fa-star{{$comment->score==1.5 ? "-half-alt" : ($comment->score>=2 ? " full" : "")}}"></span>
                                            <span class="fa fa-star{{$comment->score==2.5 ? "-half-alt" : ($comment->score>=3 ? " full" : "")}}"></span>
                                            <span class="fa fa-star{{$comment->score==3.5 ? "-half-alt" : ($comment->score>=4 ? " full" : "")}}"></span>
                                            <span class="fa fa-star{{$comment->score==4.5 ? "-half-alt" : ($comment->score>=5 ? " full" : "")}}"></span>
                                        </div>
                                    @else
                                        <div class="font-weight-bold" dir="rtl">
                                        این ارزیابی، امتیاز ندارد.
                                        </div>

                                    @endisset
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection