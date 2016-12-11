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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $test = Input::get('test');

        return $test;
    }

    public function test(Request $request, $chatroom_id) {
        if (!Auth::guest()) {
            $text = $request->input('message');
            $user = Auth::user();
            $room_id = Chatroom::where('id', '=', $chatroom_id)->pluck('id')->first();

            $message = new Message();
            $message->user_id = $user->id;
            $message->message = $text;
            $message->chatroom_id = $room_id;
            $message->save();

            return $message;
        }
    }

    public function getTest(Request $request, $chatroom_id) {

        if ($request->session()->has('last_message')) {
            $messages = DB::table('users')
            ->join('messages', 'users.id', '=', 'messages.user_id')
            ->where('messages.chatroom_id', '=', $chatroom_id)
            ->where('messages.id', '>=', session('last_message'))
            ->select('users.user_name', 'messages.message', 'messages.id', 'messages.user_id')
            ->orderBy('messages.id', 'DES')
            ->limit(30)
            ->get();
        } else {
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
