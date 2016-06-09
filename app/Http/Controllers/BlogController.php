<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\Comment;
use App\User;
use Auth;


class BlogController extends Controller
{

    public function getIndex(){
        $posts = Post::paginate(10);

        return view('blog.index')->withPosts($posts);
    }

    public function getSingle($slug){
        //fetch from the DB based on slug
        $post = Post::where('slug', '=', $slug)->first();
        $comments =  Comment::orderBy('id', 'desc')->paginate(10);
        if (Auth::check()) {
            $users = Auth::user()->id;
        }else{
            $users = null;
        }
        return view('blog.single')->withPost($post)->withComments($comments)->withUsers($users);
    }
    public function getAdmin(){

    }

}
