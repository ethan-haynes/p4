<?php

namespace p4\Http\Controllers;

use Illuminate\Http\Request;

use p4\Http\Requests;
use p4\User;
use Session;
use p4\Profile;
use Auth;
use View;

class ProfileController extends Controller
{
    public function showProfile($user_id = '')
    {
        if (!Auth::guest()) {
            $user = ($user_id != null) ? User::where('id', '=', $user_id)->first() : Auth::user();

            if ($user->profile == null) {
                return View::make('createProfile')->with('title', "Profile");
            }

            return View::make('profile')->with('title', "Profile")->with('user', $user);
        }

        Session::flash('flash_view', 'You need to be logged in for that feature.');
        return redirect('/login');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'description' => 'required|min:1|max:255',
        ]);

        if (!Auth::guest()) {

            $description = $request->input('description');

            $user = Auth::user();

            $profile = new Profile();
            $profile->description = $description;
            $profile->user_id = $user->id;
            $profile->save();

            $user->profile()->save($profile);
            return View::make('profile')->with('title', "Profile")->with('user', $user);
        } else {
            Session::flash('flash_view', 'You need to be logged in for that feature.');
            return redirect('/login');
        }
    }
}
