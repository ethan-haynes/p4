<?php

namespace p4;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public function message() {
        # Define a one-to-many relationship.
        return $this->hasMany('p4\Message');
    }

    public function chatroom() {
        # Define a one-to-many relationship.
        return $this->belongsToMany('p4\Chatroom')->withTimestamps();
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'user_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
