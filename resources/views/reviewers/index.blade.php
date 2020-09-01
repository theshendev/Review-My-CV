@extends('layouts.app')

@section('content')
    <section class="reviewers-list">
    @if(commentsToCheck(auth()->user()) or anyRelationExists(auth()->user()))
        <h3 class="text-center text-white">ابتدا ارزیابی های قبلی را چک کنید</h3>
        @elseif(count($reviewers)==0)
            <h3 class="text-center text-white">ارزیابی برای شما وجود ندارد</h3>

    @else
        <div class="container text-white">
            <div class="row justify-content-start my-5" dir="rtl">

                <h2 class="text-right">
                    فهرست ارزیاب ها

                </h2>
                {{--<select class="custom-select">--}}
                    {{--<option value="adasd">بالاترین رتبه</option>--}}
                {{--</select>--}}
                @foreach($reviewers as $reviewer)
                    <div class="reviewer row no-gutters text-right w-100">
                        <div class="col-10">
                            <div class="row">
                                <div class="col-3 reviewer-image-container">
                                    <img
                                         class="reviewer-image rounded-circle"
                                         src="{{$reviewer->image}}"
                                         alt="">
                                    <div class="reviewer-score-icons">
                                        <span class="fa fa-search{{$reviewer->score>=1 ? " full" : ""}}"></span>
                                        <span class="fa fa-search{{$reviewer->score==1.5 ? " half-full" : ($reviewer->score>=2 ? " full" : "")}}"></span>
                                        <span class="fa fa-search{{$reviewer->score>=3 ? " full" : ""}}"></span>
                                        <span class="fa fa-search{{$reviewer->score>=4 ? " full" : ""}}"></span>
                                        <span class="fa fa-search{{$reviewer->score>=5 ? " full" : ""}}"></span>
                                    </div>
                                </div>
                                <div class="col-9 align-self-center text-right">
                                    <p>
                                        {{$reviewer->name}}
                                    </p>
                                    <p>
                                        {{$reviewer->position}} at {{$reviewer->company}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 align-self-center">
                            <a class="btn btn-warning mb-2 w-75"
                               href="{{route('allow_reviewer',['user'=>auth()->id(),'reviewer'=>$reviewer->id])}}">
                                انتخاب ارزیاب
                            </a>
                            <br>
                            <a class="btn btn-primary w-75"
                               href="{{route('reviewer.show',['reviewer'=>$reviewer->id])}}">
                                مشاهده پروفایل
                            </a>
                        </div>

                    </div>
                @endforeach
            </div>

        </div>

    @endif
    </section>
@endsection
