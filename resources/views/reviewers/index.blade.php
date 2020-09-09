@extends('layouts.app')

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
                        <div class="reviewer row no-gutters text-right w-100">
                            <div class="col-md-10">
                                <div class="row">
                                    <div class="col-md-3 reviewer-image-container">
                                        <img
                                                class="reviewer-image rounded-circle"
                                                src="{{$reviewer->image}}"
                                                alt="">
                                        <div class="reviewer-score-icons">
                                            <span class="fa fa-star{{$reviewer->score==0.5 ? "-half-alt" : ($reviewer->score>=1 ? " full" : "")}}"></span>
                                            <span class="fa fa-star{{$reviewer->score==1.5 ? "-half-alt" : ($reviewer->score>=2 ? " full" : "")}}"></span>
                                            <span class="fa fa-star{{$reviewer->score==2.5 ? "-half-alt" : ($reviewer->score>=3 ? " full" : "")}}"></span>
                                            <span class="fa fa-star{{$reviewer->score==3.5 ? "-half-alt" : ($reviewer->score>=4 ? " full" : "")}}"></span>
                                            <span class="fa fa-star{{$reviewer->score==4.5 ? "-half-alt" : ($reviewer->score>=5 ? " full" : "")}}"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-9 align-self-center text-right">
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
                            <div class="col-md-2 align-self-center">
                                @if(getGuard()=='web')
                                    <a class="btn btn-warning mb-2 w-75"
                                       href="{{route('allow_reviewer',['user'=>auth()->id(),'reviewer'=>$reviewer->id])}}">
                                        انتخاب ارزیاب
                                        <span class="fas fa-check mr-2" style="vertical-align: middle"></span>

                                    </a>
                                    <br>
                                @endif
                                <a class="btn btn-primary w-75"
                                   href="{{route('reviewer.show',['reviewer'=>$reviewer->id])}}">
                                    مشاهده پروفایل
                                    <span class="fas fa-chevron-left mr-2" style="vertical-align: middle"></span>
                                </a>
                            </div>

                        </div>
                    @endforeach
                </div>

            </div>

        @endif
    </section>
@endsection
