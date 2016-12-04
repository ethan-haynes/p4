<?php

namespace p4\Http\Controllers;

use Illuminate\Http\Request;

use p4\Http\Requests;
use View;

class ChatroomController extends Controller
{
    public function showChatroom($chatroom_id = '')
    {
        $room = ($chatroom_id != null) ? $chatroom_id : "Friendly Messenger Chatroom";
        return View::make('chatroom')->with('title', $room);
    }
}



// return View::make( 'viewfile', $data )
//    ->with( 'data', $data )
//    ->with( 'moreData', $moreData )
//    ->with( 'msg', 'hola amigo' );
