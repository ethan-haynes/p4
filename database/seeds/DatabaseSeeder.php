<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ChatroomsTableSeeder::class);
        $this->call(ChatroomUserTableSeeder::class);
        $this->call(MessagesTableSeeder::class);
        $this->call(ProfilesTableSeeder::class);
    }
}
