<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConnectMessagesAndChatrooms extends Migration
{
    public function up() {
        Schema::table('messages', function (Blueprint $table) {
            $table->integer('chatroom_id')->unsigned();
            $table->foreign('chatroom_id')->references('id')->on('chatrooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('messages', function (Blueprint $table) {
            $table->dropForeign('chatrooms_chatroom_id_foreign');
            $table->dropColumn('chatroom_id');
        });
    }
}
