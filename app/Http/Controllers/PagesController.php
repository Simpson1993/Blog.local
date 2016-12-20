<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Post;

class PagesController extends Controller
{

    public function getIndex()
    {
        $posts = Post::orderBy('created_at', 'desc')->limit(10)->get();
        $comments = Comment::orderBy('id', 'desc')->limit(4)->get();
        $categories = Category::all();
        $i = 0;
        # process variable data or params
        # talk to the model
        # recieve from the model
        # compile or process data from the model if needed
        # pass that data to the correct view

        return view('pages.welcome')->withPosts($posts)->withComments
        ($comments)->withCategories($categories)
            ->withI($i);
    }

    public function getAbout()
    {
        $first = 'Volodya';
        $last = 'Simpson';

        $fullname = $first . " " . $last;
        $email = 'simpson@gmail.com';
        $data = [];
        $data['email'] = $email;
        $data['fullname'] = $fullname;

        return view('pages.about')->withData($data);
    }
}
