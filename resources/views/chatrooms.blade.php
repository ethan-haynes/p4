@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Chatroom List</div>

                <div class="panel-body">
                    @if($chatrooms)
                        <ul>
                        @foreach ($chatrooms as $chatroom)
                            <li><a href="{{ url('/chatroom', $chatroom->id) }}">{{ $chatroom->name }}</a></li>
                        @endforeach
                        </ul>
                    @endif
                    <form class="" action="{{ url('/chatrooms/create') }}" method="get">
                        <div class="form-group">
                            <div class="col-md-12 col-md-offset-5">
                                <button type="submit" class="btn btn-info">
                                    <i class="fa fa-btn fa-sign-in"></i> Create a Chatroom
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
