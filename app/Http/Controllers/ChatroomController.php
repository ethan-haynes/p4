<?php

namespace p4\Http\Controllers;

use Illuminate\Http\Request;

use p4\Http\Requests;
use p4\Chatroom;
use Auth;
use View;

class ChatroomController extends Controller
{
    public function showChatroom($chatroom_id = '')
    {
        # default name
        $room = "Friendly Messenger Chatroom";
        if ($chatroom_id != null) {
            if (Auth::check()) {
                $user = Auth::user();
                $user->last_message = null;
                $user->save();
            }
            $chatroom = Chatroom::where('id', '=', $chatroom_id)->first();
            $room = $chatroom->name;
        }
        return View::make('chatroom')->with('title', $room)->with('description', $chatroom->description);
    }

    public function showChatrooms()
    {
        $chatrooms = Chatroom::all();
        return View::make('chatrooms')->with('title', "Chatrooms")->with( "chatrooms" , $chatrooms);
    }
}
