@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Chatroom List</div>

                <div class="panel-body">
                    <ul>
                        <li><a href="{{ url('/chatroom') }}">chatroom</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
