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
            # if no id is provided get logged in user's profile
            $user = ($user_id != null) ? User::where('id', '=', $user_id)->first() : Auth::user();

            # user does not have a profile yet:
            if ($user->profile == null) {
                # take user to make their own profile
                if (Auth::user()->id == $user->id) {
                    return View::make('createProfile')->with('title', "Profile");

                # warn that user who's profile they are selecting doesn't have one set up
                } else {
                    Session::flash('flash_view', $user->user_name . ' has not set up a profile yet.');
                    return redirect()->back();
                }
            }

            return View::make('profile')->with('title', "Profile")->with('user', $user);
        }

        # warn a user not logged in who is trying to view a profile
        Session::flash('flash_view', 'You need to be logged in for that feature.');
        return redirect('/login');
    }

    public function create(Request $request)
    {
        # validate and create new profile
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
    public function showUpdate()
    {
        return View::make('updateProfile')->with('title', "Update Profile")->with('user', Auth::user());
    }

    public function submitUpdate(Request $request)
    {
        # update existing profile
        $this->validate($request, [
            'description' => 'required|min:1|max:255',
        ]);

        $description = $request->input('description');
        $user = Auth::user();

        $profile = $user->profile;
        $profile->description = $description;
        $profile->save();

        return View::make('profile')->with('title', "Update Profile")->with('user', $user);
    }
}
