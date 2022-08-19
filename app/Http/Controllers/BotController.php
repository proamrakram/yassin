<?php

namespace App\Http\Controllers;

use App\Models\Bot;
use App\Http\Requests\StoreBotRequest;
use App\Http\Requests\UpdateBotRequest;
use App\Http\Resources\SendMessagesResource;
use App\Http\Traits\SendMessages;
use App\Models\WhatsAppSender;
use Illuminate\Support\Facades\Http;
use stdClass;

class BotController extends Controller
{
    use SendMessages;

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

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
            'Content-Type' => 'application/json',
        ])->post($this->url, [
            'messaging_product' => 'whatsapp',
            'recipient_type' => 'individual',
            'to' => $whats_app_sender->phone_number,
            'type' => 'text',
            'text' => [
                'preview_url' => false,
                'body' => $message,
            ],
        ]);
    }

    public function replyToMessage($message_id)
    {
        $whats_app_sender = WhatsAppSender::find(1);

        $headers = [
            'Authorization' => "Bearer "  . env('WHATS_APP_TOKEN'),
            'Content-Type' => 'application/json',
        ];

        $data = new stdClass();

        $data->messaging_product = 'whatsapp';
        $data->recipient_type = 'individual';
        $data->to = $whats_app_sender->phone_number;
        $data->message_id = $message_id;
        $data->type = 'text';
        $data->preview_url = false;
        $data->body = 'I am sorry for replying you in this time, Hello World';

        $data = new SendMessagesResource($data);


        // $array = json_decode(json_encode($data), true);

        // $array = json_decode(json_encode($data), true);
        dd($data);


        $this->replyToMessage($message_id, $headers, $data);
    }





    public function sendReplyToTextMessage()
    {
        $message_id = request()->query('message_id');

        $whats_app_sender = WhatsAppSender::find(1);

        $headers = [
            'Authorization' => "Bearer "  . env('WHATS_APP_TOKEN'),
            'Content-Type' => 'application/json',
        ];

        $data = new stdClass();

        $data->messaging_product = 'whatsapp';
        $data->recipient_type = 'individual';
        $data->to = $whats_app_sender->phone_number;
        $data->message_id = $message_id;
        $data->type = 'text';
        $data->preview_url = false;
        $data->body = 'I am sorry for replying you in this time, Hello World';

        $data = new SendMessagesResource($data);
        dd($data);
        $this->replyToMessage($message_id, $headers, $data);
    }

    public function sendRTextMessageWithPreviewUrl()
    {
        $message = "Hello I am Amr Akram https://www.youtube.com/watch?v=Mi696rhyvYI&list=RDMM&index=10";
        $whats_app_sender = WhatsAppSender::find(1);




        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
            'Content-Type' => 'application/json',
        ])->post($this->url, [
            'messaging_product' => 'whatsapp',
            'recipient_type' => 'individual',
            'to' => $whats_app_sender->phone_number,
            'type' => 'text',
            'text' => [
                'preview_url' => true,
                'body' => $message,
            ],
        ]);
    }

    public function sendImageMessageById()
    {
        $message_image_id = request()->query('message_image_id');

        $whats_app_sender = WhatsAppSender::find(1);

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
            'Content-Type' => 'application/json',
        ])->post($this->url, [
            'messaging_product' => 'whatsapp',
            "recipient_type" => "individual",
            "to" => $whats_app_sender->phone_number,
            "image" => [
                "id" => $message_image_id,
                "caption" => "This is an image",
            ],
            "type" => "image",
        ]);
    }

    public function sendReplyToImageMessageById()
    {
        $message_id = request()->query('message_id');

        $message_image_id = request()->query('message_image_id');

        $whats_app_sender = WhatsAppSender::find(1);

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
            'Content-Type' => 'application/json',
        ])->post($this->url, [
            'messaging_product' => 'whatsapp',
            "recipient_type" => "individual",
            "to" => $whats_app_sender->phone_number,
            "context" => [
                "message_id" => $message_id,
            ],
            "image" => [
                "id" => $message_image_id,
                "caption" => "This is an image",
            ],
            "type" => "image",
        ]);
    }

    public function sendImageMessageByURL()
    {
        $whats_app_sender = WhatsAppSender::find(1);

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
            'Content-Type' => 'application/json',
        ])->post($this->url, [
            'messaging_product' => 'whatsapp',
            "recipient_type" => "individual",
            "to" => $whats_app_sender->phone_number,
            "image" => [
                "link" => "https://thumbs.dreamstime.com/b/beautiful-rain-forest-ang-ka-nature-trail-doi-inthanon-national-park-thailand-36703721.jpg",
                "caption" => "Testing",
            ],
            "type" => "image",
        ]);
    }
}
