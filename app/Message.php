<?php

namespace p4;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function message() {
        # Book belongs to User
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('App\User');
    }
}
