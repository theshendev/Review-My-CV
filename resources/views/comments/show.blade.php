@extends('layouts.app')
@section('head')
    <link rel="stylesheet" href="{{asset('css/star-rating.min.css')}}"/>
    <script src="{{asset('js/star-rating.min.js')}}"></script>

@endsection
@section('content')
    <section class="comment">
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
            <section class="reviewer-info row no-gutters">
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
                    @if(!$comment->is_checked)
                        <div class="col-12">
                            <form action="{{route('reviewer.score',['reviewer'=>$comment->reviewer,'comment'=>$comment])}}"
                                  method="post">
                                @csrf
                                <div class="form-row">
                                    <div class="col-auto">
                                        <input class="rating rating-animate rating-loading" type="text" id="input-1"
                                               name="score"
                                               data-min="0" data-max="5" data-step="0.1" value="2.5"
                                               data-size="sm" data-show-caption="true" data-show-clear="false">
                                    </div>
                                </div>
                                <div class="ml-5 mt-2">
                                    <button class="btn btn-success" id="submit" type="submit">ثبت امتیاز</button>
                                </div>
                            </form>

                        </div>
                    @else
                        <div class="col-12">
                            <div class="reviewer-score-icons">
                                <span class="fa fa-star custom-star star-{{$comment->score<=1 ? $comment->score*100: "100"}}"></span>
                                <span class="fa fa-star custom-star star-{{isBetween(1,2,$comment->score) ? getDecimalPart($comment->score)*100 : ($comment->score>=2 ? "100" : "0")}}"></span>
                                <span class="fa fa-star custom-star star-{{isBetween(2,3,$comment->score) ? getDecimalPart($comment->score)*100 : ($comment->score>=3 ? "100" : "0")}}"></span>
                                <span class="fa fa-star custom-star star-{{isBetween(3,4,$comment->score) ? getDecimalPart($comment->score)*100 : ($comment->score>=4 ? "100" : "0")}}"></span>
                                <span class="fa fa-star custom-star star-{{isBetween(4,5,$comment->score) ? getDecimalPart($comment->score)*100 : ($comment->score>=5 ? "100" : "0")}}"></span>
                            </div>
                        </div>
                    @endif
                </div>
            </section>
            <div class="comment-text">
                <div dir="rtl">
                    {!! $comment->body !!}
                </div>
            </div>
            <div class="row justify-content-end my-5 ml-4">
                <a href="{{route('comments.index')}}" class="btn btn-primary py-2 px-4">
                    بازگشت به صفحه‌ی نظرات
                </a>
            </div>
        </div>
    </section>

@endsection
@push('scripts')
    <script>
        $("#input-id").rating();
        $(document).ready(function () {
            $(".rating-stars").click(function () {
                if ($(".filled-stars").width() > 0) {
                    $("#submit").attr("disabled", false);
                } else {
                    $("#submit").attr("disabled", true);

                }
            });

            $("form").submit(function () {
                console.log($(".rating").val());
                if ($(this).val() > 0) {
                }

            });
        });
    </script>
@endpush