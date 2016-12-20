<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Mail;

class FeedbackController extends Controller
{
    /**
     * @return mixed
     */
    public function sendMessage(Requests\AddFeedbackRequest $request)
    {

        Mail::send(
            'emails.send-message',
            [['data' => $request->all()]],
            function ($message) {
                $message
                    ->from(env('MAIL_FROM'))
                    ->to('v.yakymchyk@ideil.com')
                    ->subject('From SparkPost with ❤');
            }
        );

        return Response::json(['message' => 'Успішно надіслано']);
    }
}
