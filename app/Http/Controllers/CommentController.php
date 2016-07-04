<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use App\Comment;
use Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //save a new comment
        $this->validate($request, array(

            'body' => 'required',
            
        ));

        $comment = new Comment;

        $comment->user_id = Auth::user()->id;
        $comment->body = $request->body;
        $comment->post_id = $request->post_id;

        $comment->save();

        Session::flash('success', 'Comment added!');

        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);

        $comment->delete();

        Session::flash('success', 'This comment was successfully deleted!');
        return redirect()->back();
    }
}
