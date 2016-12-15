<?php

namespace p4\Http\Controllers;

use Illuminate\Http\Request;

use p4\Http\Requests;
use p4\Chatroom;
use p4\Message;
use p4\User;
use Auth;
use DB;

class MessageController extends Controller
{

    public function sendMessage(Request $request, $chatroom_id) {

        if (!Auth::guest()) {
            # get message from ajax call
            $text = $request->input('message');
            $user = Auth::user();
            $room_id = Chatroom::where('id', '=', $chatroom_id)->pluck('id')->first();

            # create new message with ussr_id chatroom_id and message text
            $message = new Message();
            $message->user_id = $user->id;
            $message->message = $text;
            $message->chatroom_id = $room_id;
            $message->save();

            return $message;
        }
    }

    public function getMessage(Request $request, $chatroom_id) {

        # if user has a last message in session
        if ($request->session()->has('last_message')) {
            # get the messages table
            # join with users table
            # return all messages since last message recieved
            $messages = DB::table('users')
            ->join('messages', 'users.id', '=', 'messages.user_id')
            ->where('messages.chatroom_id', '=', $chatroom_id)
            ->where('messages.id', '>=', session('last_message'))
            ->select('users.user_name', 'messages.message', 'messages.id', 'messages.user_id')
            ->orderBy('messages.id', 'DES')
            ->limit(30)
            ->get();

        # if user does not have a last message in session
        } else {
            # get the messages table
            # join with users table
            # return latest message
            $messages = DB::table('users')
            ->join('messages', 'users.id', '=', 'messages.user_id')
            ->where('messages.chatroom_id', '=', $chatroom_id)
            ->select('users.user_name', 'messages.message', 'messages.id', 'messages.user_id')
            ->orderBy('messages.id', 'DES')
            ->limit(1)
            ->get(); /* using this method instead of first because laravel
                        complains about returning object instead of array in
                        request */

            session(['last_message' => $messages[0]->id]);
        }
        return $messages;
    }
}
