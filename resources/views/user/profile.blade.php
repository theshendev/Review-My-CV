@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                {{$user->name}}
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 align-self-center">
                        Review CV
                    </div>
                    <div class="col-md-4">

                        @if($user->allowed_reviewers()->where('expires_at','>',now())->where('allowed_reviewer_id',\Illuminate\Support\Facades\Auth::guard('reviewer')->id())->exists())
                            <a class="btn btn-primary" href="{{route('cv_download',['user'=>$user->id,'reviewer'=>\Illuminate\Support\Facades\Auth::guard('reviewer')->id()])}}">
                                Review CV
                            </a>
                            @else
                                <strong>You are not allowed to see CV</strong>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection