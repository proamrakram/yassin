<?php

namespace App\Http\Traits;

use App\Http\Controllers\Bot\BotController;
use App\Http\Controllers\Whatsapp\AudioController;
use App\Http\Controllers\Whatsapp\ContactController;
use App\Http\Controllers\Whatsapp\DocumentController;
use App\Http\Controllers\Whatsapp\ImageController;
use App\Http\Controllers\Whatsapp\LocationController;
use App\Http\Controllers\Whatsapp\StickerController;
use App\Http\Controllers\Whatsapp\TextController;
use App\Http\Controllers\Whatsapp\VideoController;
use App\Http\Controllers\Whatsapp\WhatsAppSenderController;
use App\Http\Requests\StoreAudioRequest;
use App\Http\Requests\StoreBotRequest;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\StoreLocationRequest;
use App\Http\Requests\StoreStickerRequest;
use App\Http\Requests\StoreTextRequest;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\StoreWhatsAppSenderRequest;

use App\Models\WhatsAppSender;
use App\Models\Bot;
use Illuminate\Support\Facades\Http;

trait SenderWhatsApp
{
    public function saveBotWhatsApp($data)
    {
        $value = $data->entry[0]->changes[0]->value;
        $field = $data->entry[0]->changes[0]->field;

        $bot = Bot::where('whats_app_business_account_id', (int)$data->entry[0]->id)->first();

        if (!$bot) {

            $request = new StoreBotRequest();

            $bot = new BotController();

            $bot = $bot->store(
                $request,
                $data->object,
                $data->entry[0]->id,
                $value->metadata->display_phone_number,
                $value->metadata->phone_number_id,
                $value->messaging_product
            );

            return $bot;
        }

        return $bot;
    }

    public function saveSenderWhatsApp($bot, $contacts)
    {
        $contact = WhatsAppSender::where('phone_number', (string)$contacts->wa_id)->first();

        if (!$contact && $bot) {

            $request = new StoreWhatsAppSenderRequest();

            $whatsAppSender = new WhatsAppSenderController();

            $contact = $whatsAppSender->store($request, $bot->id, $contacts);

            return $contact;
        }

        return $contact;
    }


    public function saveSenderTextMessages($sender, $message)
    {
        $request = new StoreTextRequest();

        $text_messages = new TextController();

        $text_messages = $text_messages->store($request, $sender, $message);

        $this->sendingGreetingMessage();

        return $text_messages;
    }

    public function saveSenderDocumentMessages($sender, $message)
    {
        $request = new StoreDocumentRequest();

        $document_messages = new DocumentController();

        $document_messages = $document_messages->store($request, $sender, $message);

        return $document_messages;
    }

    public function saveSenderStickerMessages($sender, $message)
    {
        $request = new StoreStickerRequest();

        $sticker_messages = new StickerController();

        $sticker_messages = $sticker_messages->store($request, $sender, $message);

        return $sticker_messages;
    }

    public function saveSenderAudioMessages($sender, $message)
    {
        $request = new StoreAudioRequest();

        $audio_messages = new AudioController();

        $audio_messages = $audio_messages->store($request, $sender, $message);

        return $audio_messages;
    }

    public function saveSenderVideoMessages($sender, $message)
    {
        $request = new StoreVideoRequest();

        $video_messages = new VideoController();

        $video_messages = $video_messages->store($request, $sender, $message);

        return $video_messages;
    }

    public function saveSenderImageMessages($sender, $message)
    {
        $request = new StoreImageRequest();

        $image_messages = new ImageController();

        $image_messages = $image_messages->store($request, $sender, $message);

        return $image_messages;
    }

    public function saveSenderLocationMessages($sender, $message)
    {
        $request = new StoreLocationRequest();

        $location_messages = new LocationController();

        $location_messages = $location_messages->store($request, $sender, $message);

        return $location_messages;
    }

    public function saveSenderContactMessages($sender, $message)
    {
        $request = new StoreContactRequest();

        $contact_messages = new ContactController();

        $contact_messages = $contact_messages->store($request, $sender, $message);

        return $contact_messages;
    }

    public function saveSenderInteractiveMessages($sender, $message)
    {
        $bot = Bot::find(1);

        $headers =  [
            'Authorization' => "Bearer "  . env('WHATS_APP_TOKEN'),
            'Content-Type' => 'application/json',
        ];

        $interactive =
            [
                'messaging_product' => "whatsapp",
                "recipient_type" => "individual",
                "to" => "972599916672",
                "type" => "interactive",
                "interactive" => [
                    "type" => "list",
                    "header" => [
                        "type" => "text",
                        "text" => "#111111111"
                    ],
                    "body" => [
                        "text" => "Hi there! 👋 Thanks for your message! 😃\nIt’s just me and [insert names of other workers] running [insert business name]. We receive tons of messages every day and may not be able to get to you right away – so sorry!"
                    ],
                    "footer" => [
                        "text" => "Cheers!"
                    ],
                    "action" => [
                        "button" => "Accept Product",
                        "sections" => [
                            [
                                "title" => "Products Items",
                                "rows" => [
                                    [
                                        "id" => "1",
                                        "title" => "Jaspers Clapham",
                                        "description" => "11-13 Battersea Rise, S11 1HG"
                                    ],
                                    [
                                        "id" => "2",
                                        "title" => "Jaspers Brixton",
                                        "description" => "419 Coldharbour Ln, SW9 8LH"
                                    ],
                                    [
                                        "id" => "3",
                                        "title" => "Jaspers Shepherd's Bush",
                                        "description" => "15 Goldhawk Rd, W12 8QQ"
                                    ]
                                ],

                            ],
                            [
                                "title" => "Products Prices",
                                "rows" => [
                                    [
                                        "id" => "1",
                                        "title" => "Jaspers Clapham",
                                        "description" => "$456"
                                    ],
                                    [
                                        "id" => "2",
                                        "title" => "Jaspers Brixton",
                                        "description" => "$419"
                                    ],
                                    [
                                        "id" => "3",
                                        "title" => "Jaspers Shepherd's Bush",
                                        "description" => "$41"
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ];

        if ($message->interactive->type == 'button_reply'  && $message->interactive->button_reply->id == "12") {
            $response = Http::withHeaders($headers)->post(env('URL_MESSAGING'), $interactive);
            return true;
        }


        // dd($response->json());
    }


    public function sendingGreetingMessage()
    {
        //Sending Greeting Message
        $headers =  [
            'Authorization' => "Bearer "  . env('WHATS_APP_TOKEN'),
            'Content-Type' => 'application/json',
        ];

        //Send Greeting Message
        $data = [
            'messaging_product' => "whatsapp",
            'recipient_type' => 'individual',
            'to' => '972599916672',
            'type' => 'template',
            "template" => [
                "name" => "greeting_message_v4",
                'language' => [
                    'code' => 'en'
                ],

                "components" => [
                    [
                        "type" => "header",
                        "parameters" => [
                            [
                                "type" => "image",
                                "image" => [
                                    "link" => "https://thumbs.dreamstime.com/b/photo-programmer-workaholic-lady-work-late-night-meet-newyear-alone-office-hold-telephone-texting-colleagues-greet-drink-163723619.jpg"
                                ]
                            ]
                        ]
                    ],
                ]
            ]
        ];

        $response = Http::withHeaders($headers)->post(env('URL_MESSAGING'), $data);
    }
}
