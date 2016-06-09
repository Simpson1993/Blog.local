<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Category;
use App\User;

use App\Http\Requests;

class PagesController extends Controller
{

    public function getIndex(){
        $posts = Post::orderBy('created_at', 'desc')->limit(10)->get();
        $comments = Comment::orderBy('id', 'desc')->limit(4)->get();
        $categories = Category::all();
        # process variable data or params
        # talk to the model
        # recieve from the model
        # compile or process data from the model if needed
        # pass that data to the correct view

        return view('pages.welcome')->withPosts($posts)->withComments($comments)->withCategories($categories);
    }

    public function getAbout(){
        $first = 'Volodya';
        $last = 'Simpson';

        $fullname = $first . " " . $last;
        $email = 'simpson@gmail.com';
        $data = [];
        $data['email'] = $email;
        $data['fullname'] = $fullname;

        return view('pages.about')->withData($data);
    }

    public function getContact(){
        return view('pages.contact');
    }
}
