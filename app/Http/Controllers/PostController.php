<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use App\Category;
use App\User;
use Auth;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);

        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        if (Auth::check()) {
            $users = Auth::user()->id;
        } else {
            $users = null;
        }
        return view('posts.create')->withCategories($categories)->withUsers($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the data
        $this->validate($request, array(
                'title' => 'required|max:255',
                'category_id' => 'required|integer',
                'user_id' => 'required|integer',
                'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'body' => 'required'
             ));
        //store in the database
        $post = new Post;

        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->user_id = $request->user_id;
        $post->slug = $request->slug;
        $post->body = $request->body;

        $post->save();

        Session::flash('success', 'The blog post was successfully save!');

        //redirect to another page
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->withPost($post);
    ///////////////////////////////with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $cats = Category::lists('name', 'id');

        if (Auth::check()) {
            $users = Auth::user()->id;
        } else {
            $users = null;
        }

        return view('posts.edit')->withPost($post)->withCategories($cats)->withUsers($users);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if ($request->input('slug') == $post->slug) {
            $this->validate($request, array(
                'title' => 'required|max:255',
                'category_id' => 'required|integer',
                'user_id' => 'required|integer',
                'body' => 'required'
            ));
        } else {
            $this->validate($request, array(
                'title' => 'required|max:255',
                'category_id' => 'required|integer',
                'user_id' => 'required|integer',
                'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
                'body' => 'required'
            ));
        }

        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->category_id = $request->category_id;
        $post->user_id = $request->user_id;
        $post->slug = $request->input('slug');
        $post->body = $request->input('body');

        $post->save();

        Session::flash('success', 'This post was successfully saved!');

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        Session::flash('success', 'This post was successfully deleted!');

        return redirect()->route('posts.index');
    }
}
