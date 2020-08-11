@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Users
            </div>
            <div class="card-body">
                @if(count($users)==0)
                    <p class="text-center">
                        No Users.
                    </p>
                @endif
                @foreach($users as $user)
                    <div class="row">

                        <div class="col-md-8 align-self-center">
                            {{$user->name}}
                        </div>
                        <div class="col-md-4">
                            <a href="{{route('user.show',['user'=>$user->id])}}">
                                Show Profile
                            </a>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
@endsection