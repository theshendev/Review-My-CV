@extends('layouts.app')
@section('title','لیست ارزیاب ها')
@section('content')
    <section class="reviewers-list">

        @if(getGuard()=='web' ? commentsToCheck(auth()->user()) or anyRelationExists(auth()->user()) : false)
            <h3 class="text-center text-white">ابتدا ارزیابی های قبلی را چک کنید</h3>
        @elseif(count($reviewers)==0)
            <h3 class="text-center text-white">ارزیابی برای شما وجود ندارد</h3>

        @else
            <div class="container text-white">
                <div class="row justify-content-start my-5" dir="rtl">

                    <h2 class="text-right heading-line">
                        فهرست ارزیاب ها

                    </h2>
                    {{--<select class="custom-select">--}}
                    {{--<option value="adasd">بالاترین رتبه</option>--}}
                    {{--</select>--}}
                    @foreach($reviewers as $reviewer)
                        <div class="reviewer row no-gutters w-100">
                            <div class="col-md-8 col-lg-7 col-xl-8 offset-lg-2">
                                <div class="row no-gutters">
                                    <div class="col-md-5 col-lg-4 col-xl-3 reviewer-image-container">
                                        <div class="reviewer-image-wrapper">
                                        <img
                                                class="reviewer-image rounded-circle"
                                                src="{{$reviewer->image}}"
                                                alt="">
                                        </div>
                                        <div class="reviewer-score-icons" title="{{$reviewer->score}}">
                                            <span class="fa fa-star custom-star star-{{$reviewer->score<=1 ? $reviewer->score*100: "100"}}"></span>
                                            <span class="fa fa-star custom-star star-{{isBetween(1,2,$reviewer->score) ? getDecimalPart($reviewer->score)*100 : ($reviewer->score>=2 ? "100" : "0")}}"></span>
                                            <span class="fa fa-star custom-star star-{{isBetween(2,3,$reviewer->score) ? getDecimalPart($reviewer->score)*100 : ($reviewer->score>=3 ? "100" : "0")}}"></span>
                                            <span class="fa fa-star custom-star star-{{isBetween(3,4,$reviewer->score) ? getDecimalPart($reviewer->score)*100 : ($reviewer->score>=4 ? "100" : "0")}}"></span>
                                            <span class="fa fa-star custom-star star-{{isBetween(4,5,$reviewer->score) ? getDecimalPart($reviewer->score)*100 : ($reviewer->score>=5 ? "100" : "0")}}"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-7 col-lg-8 col-xl-9 align-self-center text-center text-md-right">
                                        <p>
                                            {{$reviewer->name}}
                                        </p>
                                        <p>
                                            {{$reviewer->position}}
                                        </p>
                                        <p>
                                            {{$reviewer->company}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-3 col-xl-2 align-self-center text-center text-xl-right my-3">
                                @if(getGuard()=='web')
                                    <a class="btn btn-warning mb-2"
                                       href="{{route('allow_reviewer',['user'=>auth()->id(),'reviewer'=>$reviewer->id])}}">
                                        انتخاب ارزیاب
                                        <span class="fas fa-check mr-2" style="vertical-align: middle"></span>

                                    </a>
                                    <br>
                                @endif
                                <a class="btn btn-primary"
                                   href="{{route('reviewers.show',['reviewer'=>$reviewer->id])}}">
                                    مشاهده پروفایل
                                    <span class="fas fa-chevron-left mr-2" style="vertical-align: middle"></span>
                                </a>
                            </div>

                        </div>
                    @endforeach
                </div>
                <div class="row justify-content-center">
                    {{$reviewers->links()}}
                </div>
            </div>

        @endif
    </section>
@endsection
