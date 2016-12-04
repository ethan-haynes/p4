@extends('layouts.master')

@section('title')
    p4
@stop

@section('head')
    <!-- head -->
@stop


@section('content')
    @if($title)
    <div class="row">
        <div class="col-xs-1 col-md-2"></div>
        <div class="col-xs-10 col-md-8 container text-center">
            <h2 class="article-title">{{ $title }}</h2>
        </div>
    </div>
    @else
        <h1>Home</h1>
    @endif

    <input type="hidden" id="token" value="{{ csrf_token() }}">
    <input type="hidden" id="recieve_token" value="{{ csrf_token() }}">
@stop


@section('body')
    <!-- <input type="hidden" id="token" value="{{ csrf_token() }}">
    <input type="hidden" id="recieve_token" value="{{ csrf_token() }}"> -->
@stop
