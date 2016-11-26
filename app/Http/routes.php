<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () { return view('welcome')->with('title', "Friendly Messenger"); });
Route::get('/chatroom', function () { return view('chatroom')->with('title', "Friendly Messenger Chatroom"); });


Route::post('/test', 'MessageController@test')->name('message.show');
Route::post('/getTest', 'MessageController@getTest')->name('message.get');

if(App::environment('local')) {

    Route::get('/drop', function() {

        DB::statement('DROP database friendlyMessenger');
        DB::statement('CREATE database friendlyMessenger');

        return 'Dropped friendlyMessenger; created friendlyMessenger.';
    });
};
