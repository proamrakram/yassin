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

    private $url_message;

    public function __construct()
    {
        $this->bot = Bot::find(1);
        $this->token = env('WHATS_APP_TOKEN');
        $this->url = 'https://graph.facebook.com/v14.0/' . $this->bot->phone_number_id . '/messages';
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

    public function sendTextMessage($message)
    {
        $message = "Hello I am Amr Akram From Gaza Strip";

        $whats_app_sender = WhatsAppSender::find(1);

        Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
        ])->post($this->url, [
            "messaging_product" => $this->bot->messaging_product,
            "recipient_type" => "PERSONAL",
            "to" => $whats_app_sender->phone_number,
            "type" => "text",
            "text" => [
                "preview_url" => false,
                "body" => $message,
            ],
        ]);
    }
}
