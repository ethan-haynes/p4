<?php

use Illuminate\Database\Seeder;

class ChatroomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chatrooms')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'description' => 'this is a test!',
            'name' => "friendlychat"
        ]);
    }
}
