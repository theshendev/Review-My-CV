@extends('layouts.app')
@section('title','نظرات ارزیاب ها')
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
                            <a href="{{route('comments.show',['id'=>$comment->id])}}">مشاهده کامنت</a>
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
                                            <span class="fa fa-star custom-star star-{{$comment->score<=1 ? $comment->score*100: "100"}}"></span>
                                            <span class="fa fa-star custom-star star-{{isBetween(1,2,$comment->score) ? getDecimalPart($comment->score)*100 : ($comment->score>=2 ? "100" : "0")}}"></span>
                                            <span class="fa fa-star custom-star star-{{isBetween(2,3,$comment->score) ? getDecimalPart($comment->score)*100 : ($comment->score>=3 ? "100" : "0")}}"></span>
                                            <span class="fa fa-star custom-star star-{{isBetween(3,4,$comment->score) ? getDecimalPart($comment->score)*100 : ($comment->score>=4 ? "100" : "0")}}"></span>
                                            <span class="fa fa-star custom-star star-{{isBetween(4,5,$comment->score) ? getDecimalPart($comment->score)*100 : ($comment->score>=5 ? "100" : "0")}}"></span>
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
                <div class="row justify-content-center" dir="ltr">
                    {{$comments->links()}}
                </div>
        </div>
    </section>

@endsection