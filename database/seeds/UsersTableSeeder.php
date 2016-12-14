<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "test",
            'email' => 'test@gmail.com',
            'password' => bcrypt('secret'),
            'user_name' => 'Ima Tester',
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        ]);

        DB::table('users')->insert([
            'name' => "Friendly Guy",
            'email' => 'friendly@gmail.com',
            'password' => bcrypt('secret'),
            'user_name' => 'friendly',
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        ]);

        DB::table('users')->insert([
            'name' => "ethan",
            'email' => 'ethan@gmail.com',
            'password' => bcrypt('123456'),
            'user_name' => 'sleepy',
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        ]);

        DB::table('users')->insert([
            'name' => "Jill",
            'email' => 'jill@harvard.edu',
            'password' => bcrypt('helloworld'),
            'user_name' => 'Jill_Harvard',
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        ]);

        DB::table('users')->insert([
            'name' => "Jamal",
            'email' => 'jamal@harvard.edu',
            'password' => bcrypt('helloworld'),
            'user_name' => 'Jamal_Harvard',
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
        ]);
    }
}
