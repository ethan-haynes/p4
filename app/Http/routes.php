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
Route::get('/profile/update', 'ProfileController@showUpdate')->name('profile.updateShow');
Route::post('/profile/submit', 'ProfileController@submitUpdate')->name('profile.submitUpdate');
Route::get('/profile/{user_id?}', 'ProfileController@showProfile')->name('profile.profileShow');
Route::get('/chatrooms', 'ChatroomController@showChatrooms')->name('chatrooms.show');
Route::get('/chatrooms/create', 'ChatroomController@createForm')->name('chatrooms.createShow');
Route::post('/chatrooms', 'ChatroomController@create')->name('chatrooms.create');
Route::get('/delete/confirm', 'DeleteController@showConfirmDelete')->name('delete.show');
Route::post('/delete', 'DeleteController@delete')->name('delete.delete');

Route::post('/sendMessage/{chatroom_id}', 'MessageController@sendMessage')->name('message.create');
Route::post('/getMessage/{chatroom_id}', 'MessageController@getMessage')->name('message.show');

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
