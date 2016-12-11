<?php

namespace p4;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function user() {
        # Book belongs to User
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('p4\User');
    }

    public function chatroom() {
        # Book belongs to User
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('p4\Chatroom');
    }
}
