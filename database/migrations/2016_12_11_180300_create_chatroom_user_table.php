<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatroomUserTable extends Migration
{
     public function up()
     {
         Schema::create('chatroom_user', function (Blueprint $table) {

             $table->increments('id');
             $table->timestamps();

             $table->integer('user_id')->unsigned();
             $table->integer('chatroom_id')->unsigned();

             # Make foreign keys
             $table->foreign('user_id')->references('id')->on('users');
             $table->foreign('chatroom_id')->references('id')->on('chatrooms');
         });
     }

    public function down()
    {
        Schema::drop('chatroom_user');
    }
}
