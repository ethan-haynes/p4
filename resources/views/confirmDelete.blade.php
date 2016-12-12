@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Confirm Delete</div>
                <div class="panel-body">
                        <h1>Are you sure?</h1>
                    <div class="alert alert-danger visible">
                        <strong>Hold up!</strong> 95% of all people who delete their accounts regret it. True story.
                    </div>
                    <div class="alert alert-success visible">
                        <strong>Good Choice!</strong> Science has proven our site makes you smarter.
                    </div>
                    <div class="flex col-md-offset-4">
                        <form class="" action="{{ url('/delete') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-btn fa-sign-in"></i> Delete
                                </button>
                            </div>
                        </form>

                        <form class="" action="{{ url('/home') }}" method="get">
                            <div class="form-group">
                                <button type="submit" class="btn btn-info">
                                    <i class="fa fa-btn fa-sign-in"></i> Nevermind
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('body')
<script type="text/javascript">
    $('.btn-danger').hover(function(){
        $('.alert-danger').css('visibility', 'visible');
    }, function(){
        $('.alert-danger').css('visibility', 'hidden');
    });

    $('.btn-info').hover(function(){
        $('.alert-success').css('visibility', 'visible');
    }, function(){
        $('.alert-success').css('visibility', 'hidden');
    });
</script>
@endsection
