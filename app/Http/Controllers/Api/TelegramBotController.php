<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use GuzzleHttp\Client;
use Session;

class TelegramBotController extends Controller
{
    public $bot_token = ' 231106898:AAHtUk4kn59vAuATU9QyHJTiL6BkfQKcbBM';
    public $url = 'https://api.telegram.org/bot231106898:AAHtUk4kn59vAuATU9QyHJTiL6BkfQKcbBM/';

    public function getMessage(Request $request)
    {
        $client = new Client(['base_uri' => $this->url]);

        $input_text = $request->json('message.text');
        $chat_id = $request->json('message.chat.id');

        $keyboard = [];
        switch ($input_text) {
            case '/currencies':
                $text = 'Курс валют Національного банку';
                $keyboard = [
                    "keyboard" =>[
                        ["🇺🇸USD"],
                        ["🇪🇺EUR"],
                        ["🇵🇱PLN"],
                        ["🇬🇧GBR"]
                    ],
                    "one_time_keyboard" => true
                ];
                break;

            case '🇺🇸USD':
                return $this->sendCurrencyMessage($chat_id, 'USD');

            case '🇪🇺EUR':
                return $this->sendCurrencyMessage($chat_id, 'EUR');

            case '🇵🇱PLN':
                return $this->sendCurrencyMessage($chat_id, 'PLN');

            case '🇬🇧GBR':
                return $this->sendCurrencyMessage($chat_id, 'GBR');

            /*
            case '🇺🇸USD':
                $text = number_format(Currency::whereIsLatest(1)
                    ->whereProvider(Providers::getId('nbu'))->where('currency', '=', '🇺🇸USD')->pluck('bid')->first(), 2);
                $keyboard = null;
                break;
            case '🇪🇺EUR':
                $text = number_format(Currency::whereIsLatest(1)
                    ->whereProvider(Providers::getId('nbu'))->where('currency', '=', '🇪🇺EUR')->pluck('bid')->first(), 2);
                $keyboard = null;
                break;

            case '🇵🇱PLN':
                $text = number_format(Currency::whereIsLatest(1)
                    ->whereProvider(Providers::getId('nbu'))->where('currency', '=', '🇵🇱PLN')->pluck('bid')->first(), 2);
                $keyboard = null;
                break;

            case '🇬🇧GBR':
                $text = number_format(Currency::whereIsLatest(1)
                    ->whereProvider(Providers::getId('nbu'))->where('currency', '=', '🇬🇧GBR')->pluck('bid')->first(), 2);
                $keyboard = null;
                break;
            */

            case '/providers':
                $text = 'Курс валют в Луцьку';
                $keyboard = [
                    "keyboard" =>[
                        ["Говерла"],
                        ["Ніко"],
                        ["West Finance"],
                        ["Gost"],
                        ["Kompas"],
                        ["Kantor"],
                        ["ПриватБанк"],
                        ["Приват24"],
                        ["KredoBank"],
                        ["РайффайзенБанк"],
                        ["Укрсиббанк"],
                    ],
                    "one_time_keyboard" => true,
                ];
                break;

            case 'Говерла':
                return $this->sendProviderMessage($chat_id, 'goverla');

            case 'Ніко':
                return $this->sendProviderMessage($chat_id, 'niko');

            case 'West Finance':
                return $this->sendProviderMessage($chat_id, 'westfinance');

            case 'Express':
                return $this->sendProviderMessage($chat_id, 'express');

            case 'Gost':
                return $this->sendProviderMessage($chat_id, 'gost');

            case 'Kompas':
                return $this->sendProviderMessage($chat_id, 'kompas-kurs');

            case 'Kantor':
                return $this->sendProviderMessage($chat_id, 'kantor');

            case 'ПриватБанк':
                return $this->sendProviderMessage($chat_id, 'privatbank_cash');

            case 'Приват24':
                return $this->sendProviderMessage($chat_id, 'privatbank_card');

            case 'KredoBank':
                return $this->sendProviderMessage($chat_id, 'kredobank');

            case 'РайффайзенБанк':
                return $this->sendProviderMessage($chat_id, 'aval');

            case 'Укрсиббанк':
                return $this->sendProviderMessage($chat_id, 'ukrsibbank');

            default:
                return null;
        }

        $client->post('sendMessage', [
            'form_params' => [
                'chat_id' => $chat_id,
                'text' => $text,
                'reply_markup' => json_encode($keyboard),
            ]
        ]);
    }

    public function sendProviderMessage($chat_id, $provider)
    {
        $client = new Client(['base_uri' => $this->url]);
        $currency = Currency::whereIsLatest(1)->whereProvider(Providers::getId($provider))->get();

        $usd_bid = number_format($currency->where('currency', 'USD')->pluck('bid')->first(), 2);
        $usd_ask = number_format($currency->where('currency', 'USD')->pluck('ask')->first(), 2);
        $eur_bid = number_format($currency->where('currency', 'EUR')->pluck('bid')->first(), 2);
        $eur_ask = number_format($currency->where('currency', 'EUR')->pluck('ask')->first(), 2);
        $pln_bid = number_format($currency->where('currency', 'PLN')->pluck('bid')->first(), 2);
        $pln_ask = number_format($currency->where('currency', 'PLN')->pluck('ask')->first(), 2);
        $gbp_bid = number_format($currency->where('currency', 'GBR')->pluck('bid')->first(), 2);
        $gbp_ask = number_format($currency->where('currency', 'GBR')->pluck('ask')->first(), 2);

        $text = "************************************************
                 🇺🇸 USD Купівля: $usd_bid  Продаж: $usd_ask  
                 🇪🇺 EUR Купівля: $eur_bid  Продаж: $eur_ask 
                 🇵🇱 PLN Купівля: $pln_bid  Продаж: $pln_ask 
                 🇬🇧 GBP Купівля: $gbp_bid  Продаж: $gbp_ask";

        $client->post('sendMessage', [
            'form_params' => [
                'chat_id' => $chat_id,
                'text' => $text,
            ]
        ]);
    }

    public function sendCurrencyMessage($chat_id, $text)
    {
        $client = new Client(['base_uri' => $this->url]);

        $currency = Currency::whereIsLatest(1)->whereProvider(Providers::getId('nbu'))->get();

        $response = number_format($currency->where('currency', $text)->pluck('bid')->first(), 2);

        $client->post('sendMessage', [
            'form_params' => [
                'chat_id' => $chat_id,
                'text' => $response,
            ]
        ]);
    }
}
