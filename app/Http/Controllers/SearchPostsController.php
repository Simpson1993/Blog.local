<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;

class SearchPostsController extends Controller
{
    public function postSearch(Request $request)
    {
        $query = \Request::input('search');
        $posts = Post::where('title', 'LIKE', '%' . $query . '%')->paginate(10);

        return view('pages.search', compact('posts', 'query'));
    }
}
