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
                    @auth('reviewer')
                        @php
                            $commentExists = @auth('reviewer')->user()->comments()->exists();
                        @endphp
                        <div class="col-md-4">
                            @if($user->allowed_reviewers()->where('expires_at','>',now())->where('allowed_reviewer_id',auth('reviewer')->id())->exists())
                                <a class="btn btn-primary"
                                   href="{{route('cv_download',['user'=>$user->id,'reviewer'=> auth('reviewer')->id()])}}">
                                    Review CV
                                </a>
                            @else
                                <strong>You are not allowed to see CV</strong>
                            @endif
                        </div>

                    @endauth
                </div>
            </div>
        </div>
        @if($user->allowed_reviewers()->where('expires_at','>',now())->where('allowed_reviewer_id',auth('reviewer')->id())->exists() and !$commentExists)
            <div class="row col-8 mt-3">
                <form action="{{route('comment.store',['user'=>$user->id])}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="body">Comment Body</label>
                        <textarea class="form-control" name="body" id="body" rows="3"></textarea>
                    </div>
                    <button class="btn btn-success">
                        Submit
                    </button>
                </form>
            </div>
        @endif
    </div>
@endsection