<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Auth;
use Image;

class BlogController extends Controller
{

    public function getIndex()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);

        return view('blog.index')->withPosts($posts);
    }

    /**
     * @param Post $post
     * @return mixed
     */
    public function getSingle(Post $post)
    {
        //fetch from the DB based on slug
        $comments = Comment::orderBy('created_at', 'desc')->get();
        if (Auth::check()) {
            $users = Auth::user()->id;
        } else {
            $users = null;
        }
        return view('blog.single')->withPost($post)->withComments($comments)
            ->withUsers($users);
    }
}
