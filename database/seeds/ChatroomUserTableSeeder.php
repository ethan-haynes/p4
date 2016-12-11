<?php

use Illuminate\Database\Seeder;
use p4\User;
use p4\Chatroom;

class ChatroomUserTableSeeder extends Seeder
{
    public function run()
    {

        $user_id = User::where('user_name','=','friendly')->pluck('id')->first();
        $chatroom_id = Chatroom::where('name','=','friendlychat')->pluck('id')->first();

        DB::table('chatroom_user')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'chatroom_id' => $chatroom_id,
            'user_id' => $user_id
        ]);

    }
}
