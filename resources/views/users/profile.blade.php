@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            {{$user->name}}
        </div>
        @if(!$comments->isEmpty())
            <div class="card">
                <div class="card-header">
                    {{$comments->first()->reviewer->name}}
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-8">
                            {{$comments->first()->body}}
                        </div>
                        <div class="col-4">
                            <div class="rating">
                                <form action="{{route('reviewer.score',['reviewer'=>$comments->first()->reviewer,'comment'=>$comments->first()])}}"
                                      method="post">
                                    @csrf
                                    <input type="text" onchange="this.form.submit()" id="input-1" name="score"
                                           class="rating" data-min="0" data-max="5" data-step="0.5" value="2.5"
                                           data-size="sm">
                                </form>

                            </div>
                            {{--<div class="rating" dir="rtl">--}}
                            {{--<span class="fal fa-star"></span>--}}
                            {{--<span class="fal fa-star"></span>--}}
                            {{--<span class="fal fa-star"></span>--}}
                            {{--<span class="fal fa-star"></span>--}}
                            {{--<span class="fal fa-star"></span>--}}
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
        @else
            <div class="row justify-content-center">
                There is no comment for your cv.
            </div>
        @endif
    </div>


@endsection