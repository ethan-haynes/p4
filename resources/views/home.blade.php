@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default col-md-6 col-md-offset-4">

                <h1>Welcome back,
                    <span class="label label-welcome">
                    @if(Auth::check())
                        {{Auth::user()->name}}
                    @else
                        friend
                    @endif
                    </span>
                </h1>
                <div class="col-md-12">
                    <h1>This is friendly place where people can message each other, and we are happy that you took the time to stop by.</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
