<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use GuzzleHttp\Client;
Use Session;

class TelegramBotController extends Controller
{
    public $bot_token = '231106898:AAHtUk4kn59vAuATU9QyHJTiL6BkfQKcbBM';

    public function getMessage()
    {
        $url = 'https://api.telegram.org/bot' . $this->bot_token . '/';
        $client = new Client (['base_uri' => $url]);
        // var_dump($client);
        $response = $client->get('getUpdates');

        // var_dump($response);

        $updates = json_decode($response->getBody(), TRUE);

        // var_dump($updates);

        // $updates = json_decode(file_get_contents('php://input'), TRUE);
        $input_text = $updates['result'][12]['message']['text'];
        $chat_id = $updates['result'][12]['message']['chat']['id'];

        if ($input_text == 'Hello')
            return file_get_contents($url . 'sendmessage?chat_id=' . $chat_id . '&text=' . 'hello, bro!');
        else
            return file_get_contents($url . 'sendmessage?chat_id=' . $chat_id . '&text=' . 'Enter correct message!');



    }
}
