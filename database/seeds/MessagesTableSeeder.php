<?php

use Illuminate\Database\Seeder;
use p4\User;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_id = User::where('user_name','=','friendly')->pluck('id')->first();
        DB::table('messages')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'message' => 'this is a test!',
            'user_id' => $user_id,
        ]);
    }
}
