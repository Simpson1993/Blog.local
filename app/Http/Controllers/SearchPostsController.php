<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class SearchPostsController extends Controller
{
    public function postSearch(Request $request)
    {
        $query = \Request::input('search');
        $posts = Post::where('title', 'LIKE', '%' . $query . '%')->paginate(10);

        return view('pages.search', compact('posts', 'query'));
    }
}
