@extends('layouts.master')

@section('title')
    p4
@stop

@section('head')

@stop


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="jumbotron panel-top">
                        <div class="page-header">
                            @if($user)
                            <h1>{{$user->name}}</h1>
                            <h2><small>username:</small> {{$user->user_name}}</h2>
                            @else
                            <h1>Name</h1>
                            <h2><small>username:</small>Example</h2>
                            @endif
                        </div>

                        <div>
                            <h3>Description</h3>
                            @if($user->profile)
                                <p>
                                    {{$user->profile->description}}
                                </p>
                            @endif
                        </div>
                        <div>
                            <h3>Chatroom List</h3>
                        </div>

                        @if($user->chatroom)
                        <ul class="list-group">
                            @foreach ($user->chatroom as $chatroom)
                            <li class="list-group-item list-group-item-info">
                                <a href="{{ url('/chatroom', $chatroom->id) }}">{{ $chatroom->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                        @endif

                    </div>

                    @if(Auth::user()->id == $user->id)
                    <div class="panel-body">
                        <form class="" action="{{ url('/profile/update') }}" method="get">
                            <div class="form-group">
                                <div class="col-md-offset-11">
                                    <button type="submit" class="btn btn-info">
                                        <i class="fa fa-btn fa-sign-in"></i> Edit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" id="token" value="{{ csrf_token() }}">
    <input type="hidden" id="recieve_token" value="{{ csrf_token() }}">
@stop


<!-- @section('body')

@stop -->
