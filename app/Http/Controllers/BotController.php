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

    public function __construct()
    {
        $this->headers = [
            'Authorization' => "Bearer "  . env('WHATS_APP_TOKEN'),
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

    public function replyToUsingMessageID($message_id)
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

    public function sendFileUsingCloudAPIID($file_id)
    {
        $whats_app_sender = WhatsAppSender::find(1);

        $data = [
            "messaging_product" => "whatsapp",
            "recipient_type" => "individual",
            "to" => $whats_app_sender->phone_number,
            "type" => "image",
            "image" => [
                "id" => $file_id
            ]
        ];

        return $this->send($this->headers, $data);
    }

    public function sendFileUsingURL($url)
    {
        $whats_app_sender = WhatsAppSender::find(1);

        $data = [
            "messaging_product" =>  "whatsapp",
            "recipient_type" => "individual",
            "to" => $whats_app_sender->phone_number,
            "type" => "image",
            "image" => [
                "link" => $url
            ]
        ];

        return $this->send($this->headers, $data);
    }
}




// { Send Text Message
//     "messaging_product": "whatsapp",
//     "recipient_type": "individual",
//     "to": "{{Recipient-Phone-Number}}",
//     "type": "text",
//     "text": {
//         "preview_url": false,
//         "body": "text-message-content"
//     }
// }

// { Reply to Text Message
//     "messaging_product": "whatsapp",
//     "recipient_type": "individual",
//     "to": "{{Recipient-Phone-Number}}",
//     "context": {
//         "message_id": "<MSGID_OF_PREV_MSG>"
//     },
//     "type": "text",
//     "text": {
//         "preview_url": false,
//         "body": "<TEXT_MSG_CONTENT>"
//     }
// }


// { Send Text Message with Link Preview
//     "messaging_product": "whatsapp",
//     "to": "{{Recipient-Phone-Number}}",
//     "text": {
//         "preview_url": true,
//         "body": "Please visit https://youtu.be/hpltvTEiRrY to inspire your day!"
//     }
// }

// { Send Image Using ID from Cloud API
//     "messaging_product": "whatsapp",
//     "recipient_type": "individual",
//     "to": "{{Recipient-Phone-Number}}",
//     "type": "image",
//     "image": {
//         "id": "<IMAGE_OBJECT_ID>"
//     }
// }

#For replying on any message, just we are using context object
// "messaging_product": "whatsapp",
// "recipient_type": "individual",
// "to": "{{Recipient-Phone-Number}}",
// "context": {
//     "message_id": "<MSGID_OF_PREV_MSG>"
// },
// "type": "image",
// "image": {
//     "id": "<IMAGE_OBJECT_ID>"
// }

// {
//     "messaging_product": "whatsapp",
//     "recipient_type": "individual",
//     "to": "{{Recipient-Phone-Number}}",
//     "type": "image",
//     "image": {
//         "link": "http(s)://image-url"
//     }
// }
