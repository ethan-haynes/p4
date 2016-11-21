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

Route::get('/', function () {
    return view('welcome');
});


Route::post('/test', 'MessageController@test')->name('message.show');

if(App::environment('local')) {

    Route::get('/drop', function() {

        DB::statement('DROP database friendlyMessenger');
        DB::statement('CREATE database friendlyMessenger');

        return 'Dropped friendlyMessenger; created friendlyMessenger.';
    });

};
