<?php

namespace p4;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public function user() {
        # Define a one-to-one relationship.
        return $this->hasOne('p4\User');
    }
}
