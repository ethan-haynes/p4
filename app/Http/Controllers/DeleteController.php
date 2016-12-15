<?php

namespace p4\Http\Controllers;

use Illuminate\Http\Request;

use p4\Http\Requests;
use p4\User;
use Auth;
use View;

class DeleteController extends Controller
{
    public function showConfirmDelete()
    {
        return View::make('confirmDelete')->with('title', "Confirm Delete");
    }

    # deletes user and its relations recursively
    public function delete()
    {
        $user = Auth::user();
        Auth::logout();
        User::destroy($user->id);

        return View::make('home')->with('title', "Home");
    }
}
