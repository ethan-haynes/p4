<?php

namespace p4\Http\Controllers;

use Illuminate\Http\Request;

use p4\Http\Requests;
use View;

class LoginController extends Controller
{
    public function showLogin()
    {
        return View::make('welcome')->with('title', 'log in');
    }
}
