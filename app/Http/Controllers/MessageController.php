<?php

namespace p4\Http\Controllers;

use Illuminate\Http\Request;

use p4\Http\Requests;
use p4\Message;
use p4\User;
use Auth;

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

    public function test(Request $request) {

        $text = $request->input('message');
        $user = Auth::user();
        var_dump($user);

        $message = new Message();
        $message->user_id = $user->id;
        $message->message = $text;
        $message->recieved = false;
        $message->save();

        return $message;
    }

    public function getTest(Request $request) {
        $user = Auth::user();
        $last_message = $user->last_message;
        if ($last_message) {
            $messages = Message::where('id','>=',$last_message)->orderBy('id', 'ASC')->limit(30)->get();
        } else {
            $messages = Message::orderBy('id', 'ASC')->first();
            $user->last_message = $messages->id;
            $user->save();
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
