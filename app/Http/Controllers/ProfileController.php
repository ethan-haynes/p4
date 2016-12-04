<?php

namespace p4\Http\Controllers;

use Illuminate\Http\Request;

use p4\Http\Requests;
use View;

class ProfileController extends Controller
{
    public function showProfile($user_id = '')
    {
        $profile = ($user_id != null) ? $user_id : "Friendly Messenger Profile";
        return View::make('profile')->with('title', $profile);
    }
}
