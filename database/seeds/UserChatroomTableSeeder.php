<?php

use Illuminate\Database\Seeder;
use p4\User;
use p4\Chatroom;

class UserChatroomTableSeeder extends Seeder
{
    public function run()
    {

        $author_id = User::where('user_name','=','friendly')->pluck('id')->first();
        $chatroom_id = Chatroom::where('name','=','friendlychat')->pluck('id')->first();

        DB::table('user_chatroom')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'chatroom_id' => $chatroom_id,
            'author_id' => $author_id
        ]);

    }
}
