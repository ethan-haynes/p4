<?php

use Illuminate\Database\Seeder;

use p4\User;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_id = User::where('user_name','=','sleepy')->pluck('id')->first();

        DB::table('profiles')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'description' => "This is an example of some data that will be passed to the profile.",
            'user_id' => $user_id
        ]);
    }
}
