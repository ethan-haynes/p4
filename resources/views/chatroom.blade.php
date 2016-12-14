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
            <!-- main column left -->
            <div class="col-xs-1 col-md-2"></div>
            <!-- main column center -->
            <div class="col-xs-10 col-md-8 container text-center">
                <div>
                    <h2 class="article-title">{{ $title }}</h2>
                    <div class="half-line"></div>
                    <div>
                        @if($description)
                            {{ $description }}
                        @else
                            Powered by Magic &amp; Bubble Yum
                        @endif
                    </div>
                </div>
                @if(count($errors) > 0)
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="note">{{ $error }}</li>
                        @endforeach
                    </ul>
                @else
                <br>
                @endif

                <!-- value updated by model -->
                <form action="/lorem" method="POST" class="inner">
                    <div class="chat-container" id="chatbox">
                        <!-- chat messages appended here -->
                    </div>
                        <input type="text" name="message" id="message-input" placeholder="...">
                        <input type="submit" class="btn btn-info">
                        <br>
                        <br>
                </form>
                <div>
                    <div class="line"></div>
                    Please keep the language clean. People eat here.
                    <em class="note">*</em>
                </div>
                @if(Session::get('flash_view') != null)
                <div class="alert alert-danger">
                    <strong>Tarnation!</strong> {{Session::get('flash_view')}}
                </div>
                @endif
                @if(Session::get('flash_warning') != null)
                <div class="alert alert-danger">
                    <strong>Note!</strong> {{Session::get('flash_warning')}}
                </div>
                @endif
            </div>
            <div class="col-xs-1 col-md-2"></div>
        </div>
    @else
        <h1>No User Info Available</h1>
    @endif
    <input type="hidden" id="token" value="{{ csrf_token() }}">
    <input type="hidden" id="recieve_token" value="{{ csrf_token() }}">
@stop


@section('body')
    <script src="{{ URL::asset('js/main.js') }}" type="text/javascript"></script>
@stop
