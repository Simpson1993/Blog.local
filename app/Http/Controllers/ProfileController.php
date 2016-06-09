<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Auth;
use Session;

class ProfileController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function viewSettings(){


        return view('user.settings', [
           'user' => User::find(Auth::user()->id)
        ]);
    }
    public function saveSettings(Request $request){

        $user = User::find(Auth::user()->id);
        $this->validate($request, [
            'profile_banner_url' => 'required',
            'profile_image_url' => 'required',
            'age' => 'required',
            'about_me' => 'required',
            'contacts' => 'required',
        ]);

        $user = User::find(Auth::user()->id);
        $user->profile_banner_url = $request->input('profile_banner_url');
        $user->profile_image_url = $request->input('profile_image_url');
        $user->age = $request->input('age');
        $user->about_me = $request->input('about_me');
        $user->contacts = $request->input('contacts');

        $user->save();

        Session::flash('success', 'Setting saved!');

        return Redirect()->back();
    }

    public function viewProfile($userId = null){
        $user = null;

        if($userId != null){
            $user = User::find($userId);
        }else{
            $user = User::find(Auth::user()->id);
        }

        return view('user.profile')->withUser($user);
    }

}
