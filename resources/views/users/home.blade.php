@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center my-5">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        Reviewers
                    </div>
                    <div class="card-body">
                        @foreach($reviewers as $reviewer)
                            <div class="row">

                                <div class="col-md-8 align-self-center" style="font-size: 1.3rem">

                                    {{$reviewer->name}}
                                    <small style="color: #f66d9b;">{{$reviewer->position}} at {{$reviewer->company}}</small>
                                </div>
                                <div class="col-md-4">
                                    @if(\Illuminate\Support\Facades\Auth::user()->allowed_reviewers()->where('expires_at','>',now())->where('allowed_reviewer_id',$reviewer->id)->exists())
                                        <a class="btn btn-info" href="{{route('forbid_reviewer',['user'=>\Illuminate\Support\Facades\Auth::id(),'reviewer'=>$reviewer->id])}}">
                                            Forbid user from seeing my CV
                                        </a>
                                    @else
                                        <a class="btn btn-primary" href="{{route('allow_reviewer',['user'=>\Illuminate\Support\Facades\Auth::id(),'reviewer'=>$reviewer->id])}}">
                                            Allow to see my CV
                                        </a>
                                    @endif

                                </div>
                            </div>
                    </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
