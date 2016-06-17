<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Auth;
use Session;
use App\Comment;
use App\Post;

class ProfileController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function viewSettings(){
        $user = User::find(Auth::user()->id);

        return view('user.settings')->withUser($user);
    }
    public function saveSettings(Request $request){

        $user = User::find(Auth::user()->id);

        $this->validate($request, [
            'profile_banner_url' => 'url',
            'profile_image_url' => 'url',
            'age' => 'required|numeric',
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

    public function viewProfile($id){
        $user = User::find($id);
        $user_id = Auth::user()->id;
        $comments = Comment::where('user_id', '=', $user_id)->count();
        $posts = Post::where('user_id', '=', $user_id)->get();

        return view('user.profile')->withUser($user)->withComments($comments)->withUser_id($user_id)->withPosts($posts);
    }

}
