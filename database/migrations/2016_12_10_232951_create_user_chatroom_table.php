<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserChatroomTable extends Migration
{
     public function up()
     {
         Schema::create('user_chatroom', function (Blueprint $table) {

             $table->increments('id');
             $table->timestamps();

             $table->integer('author_id')->unsigned();
             $table->integer('chatroom_id')->unsigned();

             # Make foreign keys
             $table->foreign('author_id')->references('id')->on('users');
             $table->foreign('chatroom_id')->references('id')->on('chatrooms');
         });
     }

    public function down()
    {
        Schema::drop('user_chatroom');
    }
}
