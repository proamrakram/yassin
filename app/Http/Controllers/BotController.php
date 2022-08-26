<?php

namespace App\Http\Controllers;

use App\Models\Bot;
use App\Http\Requests\StoreBotRequest;
use App\Http\Resources\SendMessagesResource;
use App\Http\Traits\SendMessages;
use App\Models\WhatsAppSender;
use Illuminate\Support\Facades\Http;
use stdClass;

class BotController extends Controller
{
    use SendMessages;

    private $headers;

    private $token;

    public function __construct()
    {
        $this->token = "EAAFJigKvv6cBAH2g3umRzZBR1o2dBCXFC0dZBInZCW1suWZBOVsnYumv7Nx9TAW6tU9gvukHdiGeQFD9GaNsE4ZCcQ58ya52WAmqZB0kysN2h4tD9SUcsA5xE7G2foRZBV2hX8oNk5iXYtxTQrSP3T302a2qBPLW6RgmpxTH3jKQ20NIAg4ZAZCrRZAOhbAV7BnUzjl2CPntEQGbk2YDLV0cbZB";
        $this->headers = [
            'Authorization' => "Bearer " . $this->token,
            'Content-Type' => 'application/json',
        ];
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
        $message = "I am trying to do something in this world ^_^";
        $whats_app_sender = WhatsAppSender::find(1);

        $data = [
            'messaging_product' => 'whatsapp',
            'recipient_type' => 'individual',
            'to' => $whats_app_sender->phone_number,
            'type' => 'text',
            'text' => [
                'preview_url' => false,
                'body' => $message,
            ],
        ];

        $response = $this->send($this->headers, $data);

        return $response;
    }

    public function replyToMessage($message_id)
    {
        $whats_app_sender = WhatsAppSender::find(1);

        $data = [
            'messaging_product' => "whatsapp",
            "recipient_type" => "individual",
            "to" =>  $whats_app_sender->phone_number,
            "context" => [
                "message_id" => $message_id,
            ],
            "type" => "text",
            "text" => [
                "preview_url" => false,
                "body" => "Hello World",
            ],
        ];

        return $this->reply($this->headers, $data);
    }
}
