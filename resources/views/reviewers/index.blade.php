@extends('layouts.app')

@section('content')

    {{--@if(commentsToCheck(auth()->user()))--}}
    @if(false)
        <h3 class="text-center text-white">ابتدا ارزیابی های قبلی را چک کنید</h3>
        @elseif(count($reviewers)==0)
            <h3 class="text-center text-white">ارزیابی برای شما وجود ندارد</h3>

    @else
        <div class="container text-white">
            <div class="row justify-content-start my-5" dir="rtl">
                <h2 class="text-right">
                    فهرست ارزیاب ها

                </h2>

                <select class="custom-select">
                    <option value="adasd">بالاترین رتبه</option>
                </select>
                @foreach($reviewers as $reviewer)
                    <div class="test row border-left border-right text-right border-dark w-100">
                        <div class="col-10">
                            <div class="row">
                                <div class="col-3" style="position: relative">
                                    <img style="width: 200px;height: 200px;margin-top: 1rem;padding: 0.25rem;background-color: #f8fafc;border: 1px solid #dee2e6;"
                                         class="rounded-circle"
                                         src="{{$reviewer->image}}"
                                         alt="">
                                    <div style="position: absolute;bottom: 10px;left:78px;">
                                        <span class="fa fa-search"></span>
                                        <span class="fa fa-search"></span>
                                        <span class="fa fa-search"></span>
                                        <span class="fa fa-search"></span>
                                        <span class="fa fa-search"></span>
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
@endsection
