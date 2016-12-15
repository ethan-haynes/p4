<?php

namespace p4\Http\Controllers;

use Illuminate\Http\Request;

use p4\Http\Requests;
use p4\Chatroom;
use Session;
use Auth;
use View;

class ChatroomController extends Controller
{
    public function showChatroom(Request $request, $chatroom_id = '')
    {
        # default name
        $room = "Friendly Messenger Chatroom";

        # check if they entered chatroom via chatrooms link
        if ($chatroom_id != null) {
            # reset last message recieved to null when they land on page
            if ($request->session()->has('last_message')) {
                session(['last_message' => null]);
            }

            $chatroom = Chatroom::where('id', '=', $chatroom_id)->first();
            $room = $chatroom->name;
        }
        # warning for users who are not logged in
        if (Auth::guest()) {
            Session::flash('flash_warning', 'Only logged in users can post messages to the chatroom.');
        }
        return View::make('chatroom')->with('title', $room)->with('description', $chatroom->description);
    }

    public function showChatrooms()
    {
        $chatrooms = Chatroom::all();
        return View::make('chatrooms')->with('title', "Chatrooms")->with( "chatrooms" , $chatrooms);
    }

    public function createForm()
    {
        return View::make('createChatroom')->with('title', "Create a Chatroom");
    }

    public function create(Request $request)
    {
        # validation for new chatroom
        $this->validate($request, [
            'name' => 'required|min:1|max:50|unique:users',
            'description' => 'required|min:1|max:255',
        ]);

        # check if they are a guest
        if (!Auth::guest()) {
            $name = $request->input('name');
            $description = $request->input('description');

            $user = Auth::user();

            $chatroom = new Chatroom();
            $chatroom->name = $name;
            $chatroom->description = $description;
            $chatroom->save();

            $chatroom->user()->attach($user->id);
        } else {
            # if they are a guest, send them a message and redirect
            Session::flash('flash_view', 'You need to be logged in for that feature.');
            return redirect('/chatrooms/create');
        }

        $chatrooms = Chatroom::all();
        return View::make('chatrooms')->with('title', "Chatrooms")->with( "chatrooms" , $chatrooms);
    }
}
