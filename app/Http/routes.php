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

Route::get('/', function () { return view('home')->with('title', "Friendly Messenger"); });
Route::get('/chatroom/{chatroom_id?}', 'ChatroomController@showChatroom')->name('chatroom.show');
Route::post('/profile/create', 'ProfileController@create')->name('profile.create');
Route::get('/profile/{user_id?}', 'ProfileController@showProfile')->name('profile.show');
Route::get('/chatrooms', 'ChatroomController@showChatrooms')->name('chatrooms.show');
Route::get('/chatrooms/create', 'ChatroomController@createForm')->name('chatrooms.show');
Route::post('/chatrooms', 'ChatroomController@create')->name('chatrooms.create');

Route::post('/test/{chatroom_id}', 'MessageController@test')->name('message.show');
Route::post('/getTest/{chatroom_id}', 'MessageController@getTest')->name('message.get');

if(App::environment('local')) {
    Route::get('/drop', function() {

        DB::statement('DROP database friendlyMessenger');
        DB::statement('CREATE database friendlyMessenger');

        return 'Dropped friendlyMessenger; created friendlyMessenger.';
    });
};

// generating all routes for Authentication
Route::auth();
Route::get('logout', 'Auth\AuthController@logout')->name('logout');
// Route::get('/', function () { return view('home')->with('title', "Friendly Messenger"); });
Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');
