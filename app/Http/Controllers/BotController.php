<?php

namespace App\Http\Controllers;

use App\Models\Bot;
use App\Http\Requests\StoreBotRequest;
use App\Http\Requests\UpdateBotRequest;
use App\Models\WhatsAppSender;
use Illuminate\Support\Facades\Http;

class BotController extends Controller
{
    private $url;
    private $token;
    private $bot;

    public function __construct()
    {
        $this->initialization();
    }

    public function initialization($phone_number_id = 111278218357261)
    {
        $this->bot = Bot::where('phone_number_id', $phone_number_id)->first();
        if ($this->bot) {
            $this->url = 'https://graph.facebook.com/v14.0/' . $this->bot->phone_number_id . '/messages';
        }
        $this->token = env('WHATS_APP_TOKEN');
    }

    public function store(StoreBotRequest $request, $name = "whatsapp_business_account", $whats_app_business_account_id = null,  $phone_number = null, $phone_number_id = null, $messaging_product = "whatsapp")
    {
        $bot = Bot::create([
            'name' => $name,
            'whats_app_business_account_id' => $whats_app_business_account_id,
            'phone_number' => $phone_number,
            'phone_number_id' => $phone_number_id,
            'messaging_product' => $messaging_product,
        ]);

        return $bot;
    }

    public function sendTextMessage($message = "Hello World")
    {
        $message = "Hello I am Amr Akram From Gaza Strip";

        $whats_app_sender = WhatsAppSender::find(1);

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, '`');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "{ \"messaging_product\": \"whatsapp\", \"to\": \"972599916672\", \"type\": \"template\", \"template\": { \"name\": \"hello_world\", \"language\": { \"code\": \"en_US\" } } }");

        $headers = array();
        $headers[] = 'Authorization: Bearer EAAFJigKvv6cBAAqpIZCTlFOjcvZCBzHqX23UpZAZC3MFEnjt4kUWsq3e7CcpX6T1KT2cvbKWqEGPJmcOpikxZA84lvgIXU5JENMJs6zTyLADi9Ny0zBoAKnboCEZBiEkq3mKkWd74vRROO7S3c5pc2kyW7n8UqecIU2G3qMwQt5WTExBGAAAv5aeXaV7rww29ccfHIlp7UmZA9cFeh2guIV';
        $headers[] = 'Content-Type: application/json';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

















        // Http::withHeaders([
        //     'Authorization' => 'Bearer ' . $this->token,
        // ])->post($this->url, [
        //     "messaging_product" => $this->bot->messaging_product,
        //     "recipient_type" => "PERSONAL",
        //     "to" => $whats_app_sender->phone_number,
        //     "type" => "text",
        //     "text" => [
        //         "preview_url" => false,
        //         "body" => $message,
        //     ],
        // ]);
    }
}
