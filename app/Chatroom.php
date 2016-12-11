<?php

namespace p4;

use Illuminate\Database\Eloquent\Model;

class Chatroom extends Model
{
    public function user()
    {
        # With timetsamps() will ensure the pivot table has its created_at/updated_at fields automatically maintained
        return $this->belongsToMany('p4\User')->withTimestamps();
    }

    public function message() {
        # Define a one-to-many relationship.
        return $this->hasMany('p4\Message');
    }
}
