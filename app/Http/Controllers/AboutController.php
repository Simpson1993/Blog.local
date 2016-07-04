<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ContactFormRequest;

class AboutController extends Controller
{
    public function create()
    {
        return view('pages.contact');
    }

    public function store(ContactFormRequest $request)
    {
        \Mail::send('auth.emails.contact',
            array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'user_message' => $request->get('message')
            ), function ($message) {
                $message->from('wj@wjgilmore.com');
                $message->to('wj@wjgilmore.com', 'Admin')->subject('Blog Feedback');
            });

        \Session::flash('success', 'Thanks for contacting us!');

        return \Redirect::back();
    }
}
