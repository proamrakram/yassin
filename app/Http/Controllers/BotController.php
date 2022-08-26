<?php

namespace App\Http\Controllers;

use App\Models\Bot;
use App\Http\Requests\StoreBotRequest;
use App\Http\Resources\SendMessagesResource;
use App\Http\Traits\SendMessages;
use App\Models\WhatsAppSender;
use Illuminate\Http\Request;
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

    public function sendFileUsingURL(Request $request)
    {
        $url = $request->query('url');

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

    public function sendContact()
    {
        $whats_app_sender = WhatsAppSender::find(1);

        $data = [
            "messaging_product" => "whatsapp",
            "to" => $whats_app_sender->phone_number,
            "type" => "contacts",
            "contacts" => [
                [
                    "addresses" => [
                        [
                            "street" => "Jamal Abed Al-Nasser Street",
                            "city" => "Gaza",
                            "state" => "Khan Younis",
                            "zip" => "9990300",
                            "country" => "Palestine",
                            "country_code" => "P30",
                            "type" => "HOME"
                        ]
                    ],
                    "birthday" => now(),
                    "emails" => [
                        [
                            "email" => "amroaarsi@gmail.com",
                            "type" => "HOME"
                        ]
                    ],
                    "name" => [
                        "formatted_name" => "Amr Akram",
                        "first_name" => "Amr",
                        "last_name" => "Akram",
                        "middle_name" => "Akram",
                        "suffix" => "pro",
                        "prefix" => "amrakram"
                    ],
                    "org" => [
                        "company" => "Spark Studio",
                        "department" => "Software",
                        "title" => "Spark Studio"
                    ],
                    "phones" => [
                        [
                            "phone" => $whats_app_sender->phone_number,
                            "wa_id" => $whats_app_sender->phone_number,
                            "type" => "HOME"
                        ]
                    ],
                    "urls" => [
                        [
                            "url" => "https://developers.facebook.com/support/faq/",
                            "type" => "WORK"
                        ]
                    ]
                ]
            ]
        ];

        return $this->send($this->headers, $data);

    }
}




// { Send Text Message
//     "messaging_product" => "whatsapp",
//     "recipient_type" => "individual",
//     "to" => "{{Recipient-Phone-Number}}",
//     "type" => "text",
//     "text" => {
//         "preview_url" => false,
//         "body" => "text-message-content"
//     }
// }

// { Reply to Text Message
//     "messaging_product" => "whatsapp",
//     "recipient_type" => "individual",
//     "to" => "{{Recipient-Phone-Number}}",
//     "context" => {
//         "message_id" => "<MSGID_OF_PREV_MSG>"
//     },
//     "type" => "text",
//     "text" => {
//         "preview_url" => false,
//         "body" => "<TEXT_MSG_CONTENT>"
//     }
// }


// { Send Text Message with Link Preview
//     "messaging_product" => "whatsapp",
//     "to" => "{{Recipient-Phone-Number}}",
//     "text" => {
//         "preview_url" => true,
//         "body" => "Please visit https://youtu.be/hpltvTEiRrY to inspire your day!"
//     }
// }

// { Send Image Using ID from Cloud API
//     "messaging_product" => "whatsapp",
//     "recipient_type" => "individual",
//     "to" => "{{Recipient-Phone-Number}}",
//     "type" => "image",
//     "image" => {
//         "id" => "<IMAGE_OBJECT_ID>"
//     }
// }

#For replying on any message, just we are using context object
// "messaging_product" => "whatsapp",
// "recipient_type" => "individual",
// "to" => "{{Recipient-Phone-Number}}",
// "context" => {
//     "message_id" => "<MSGID_OF_PREV_MSG>"
// },
// "type" => "image",
// "image" => {
//     "id" => "<IMAGE_OBJECT_ID>"
// }

// {
//     "messaging_product" => "whatsapp",
//     "recipient_type" => "individual",
//     "to" => "{{Recipient-Phone-Number}}",
//     "type" => "image",
//     "image" => {
//         "link" => "http(s)://image-url"
//     }
// }

// {
//     "messaging_product" => "whatsapp",
//     "recipient_type" => "individual",
//     "to" => "{{Recipient-Phone-Number}}",
//     "context" => {
//         "message_id" => "<MSGID_OF_PREV_MSG>"
//     },
//     "type" => "image",
//     "image" => {
//         "link" => "http(s)://image-url"
//     }
// }

// {
//     "messaging_product" => "whatsapp",
//     "recipient_type" => "individual",
//     "to" => "{{Recipient-Phone-Number}}",
//     "type" => "audio",
//     "audio" => {
//         "id" => "<AUDIO_OBJECT_ID>"
//     }
// }

// { Reply to audio message
//     "messaging_product" => "whatsapp",
//     "recipient_type" => "individual",
//     "to" => "{{Recipient-Phone-Number}}",
//     "context" => {
//         "message_id" => "<MSGID_OF_MSG_YOU_ARE_REPLYING_TO>"
//     },
//     "type" => "audio",
//     "audio" => {
//         "id" => "<AUDIO_OBJECT_ID>"
//     }
// }

// { Send to message using audio file.
//     "messaging_product" => "whatsapp",
//     "recipient_type" => "individual",
//     "to" => "{{Recipient-Phone-Number}}",
//     "type" => "audio",
//     "audio" => {
//         "link" => "http(s)://audio-url"
//     }
// }

// {  Reply to message using audio file.
//     "messaging_product" => "whatsapp",
//     "recipient_type" => "individual",
//     "to" => "{{Recipient-Phone-Number}}",
//     "context" => {
//         "message_id" => "<MSGID_OF_MSG_YOU_ARE_REPLYING_TO>"
//     },
//     "type" => "audio",
//     "audio" => {
//         "link" => "http(s)://audio-url"
//     }
// }

// { send docs from cloud API
//     "messaging_product" => "whatsapp",
//     "recipient_type" => "individual",
//     "to" => "{{Recipient-Phone-Number}}",
//     "type" => "document",
//     "document" => {
//         "id" => "<DOCUMENT_OBJECT_ID>",
//         "caption" => "<DOCUMENT_CAPTION_TO_SEND>",
//         "filename" => "<DOCUMENT_FILENAME>"
//     }
// }

// {
//     "messaging_product" => "whatsapp",
//     "recipient_type" => "individual",
//     "to" => "{{Recipient-Phone-Number}}",
//     "context" => {
//         "message_id" => "<MSGID_OF_MSG_YOU_ARE_REPLYING_TO>"
//     },
//     "type" => "document",
//     "document" => {
//         "id" => "<DOCUMENT_OBJECT_ID>",
//         "caption" => "<DOCUMENT_CAPTION_TO_SEND>",
//         "filename" => "<DOCUMENT_FILENAME>"
//     }
// }

// {
//     "messaging_product" => "whatsapp",
//     "recipient_type" => "individual",
//     "to" => "{{Recipient-Phone-Number}}",
//     "type" => "document",
//     "document" => {
//         "link" => "<http(s)://document-url>",
//         "caption" => "<DOCUMENT_CAPTION_TEXT>"
//     }
// }


// {
//     "messaging_product" => "whatsapp",
//     "recipient_type" => "individual",
//     "to" => "{{Recipient-Phone-Number}}",
//     "context" => {
//         "message_id" => "<MSGID_OF_MSG_YOU_ARE_REPLYING_TO>"
//     },
//     "type" => "document",
//     "document" => {
//         "link" => "<http(s)://document-url>",
//         "caption" => "<DOCUMENT_CAPTION_TEXT>"
//     }
// }


// {
//     "messaging_product" => "whatsapp",
//     "recipient_type" => "individual",
//     "to" => "{{Recipient-Phone-Number}}",
//     "type" => "sticker",
//     "sticker" => {
//         "id" => "<MEDIA_OBJECT_ID>"
//     }
// }


// {
//     "messaging_product" => "whatsapp",
//     "recipient_type" => "individual",
//     "to" => "{{Recipient-Phone-Number}}",
//     "context" => {
//         "message_id" => "<MSGID_OF_MSG_YOU_ARE_REPLYING_TO>"
//     },
//     "type" => "sticker",
//     "sticker" => {
//         "id" => "<MEDIA_OBJECT_ID>"
//     }
// }

// {
//     "messaging_product" => "whatsapp",
//     "recipient_type" => "individual",
//     "to" => "{{Recipient-Phone-Number}}",
//     "type" => "sticker",
//     "sticker" => {
//         "link" => "<http(s)://sticker-url>"
//     }
// }


// {
//     "messaging_product" => "whatsapp",
//     "recipient_type" => "individual",
//     "to" => "{{Recipient-Phone-Number}}",
//     "context" => {
//         "message_id" => "<MSGID_OF_MSG_YOU_ARE_REPLYING_TO>"
//     },
//     "type" => "sticker",
//     "sticker" => {
//         "link" => "<http(s)://sticker-url>"
//     }
// }


// {
//     "messaging_product" => "whatsapp",
//     "recipient_type" => "individual",
//     "to" => "{{Recipient-Phone-Number}}",
//     "type" => "video",
//     "video" => {
//         "caption" => "<VIDEO_CAPTION_TEXT>",
//         "id" => "<VIDEO_OBJECT_ID>"
//     }
// }


// {
//     "messaging_product" => "whatsapp",
//     "recipient_type" => "individual",
//     "to" => "{{Recipient-Phone-Number}}",
//     "context" => {
//         "message_id" => "<MSGID_OF_MSG_YOU_ARE_REPLYING_TO>"
//     },
//     "type" => "video",
//     "video" => {
//         "caption" => "<VIDEO_CAPTION_TEXT>",
//         "id" => "<VIDEO_OBJECT_ID>"
//     }
// }


// {
//     "messaging_product" => "whatsapp",
//     "recipient_type" => "individual",
//     "to" => "{{Recipient-Phone-Number}}",
//     "type" => "video",
//     "video" => {
//         "link" => "<http(s)://video-url>",
//         "caption" => "<VIDEO_CAPTION_TEXT>"
//     }
// }

// {
//     "messaging_product" => "whatsapp",
//     "recipient_type" => "individual",
//     "to" => "{{Recipient-Phone-Number}}",
//     "context" => {
//         "message_id" => "<MSGID_OF_MSG_YOU_ARE_REPLYING_TO>"
//     },
//     "type" => "video",
//     "video" => {
//         "link" => "<http(s)://video-url>",
//         "caption" => "<VIDEO_CAPTION_TEXT>"
//     }
// }



// {
//     "messaging_product" => "whatsapp",
//     "to" => "{{Recipient-Phone-Number}}",
//     "type" => "contacts",
//     "contacts" => [
//         {
//             "addresses" => [
//                 {
//                     "street" => "<ADDRESS_STREET>",
//                     "city" => "<ADDRESS_CITY>",
//                     "state" => "<ADDRESS_STATE>",
//                     "zip" => "<ADDRESS_ZIP>",
//                     "country" => "<ADDRESS_COUNTRY>",
//                     "country_code" => "<ADDRESS_COUNTRY_CODE>",
//                     "type" => "<HOME|WORK>"
//                 }
//             ],
//             "birthday" => "<CONTACT_BIRTHDAY>",
//             "emails" => [
//                 {
//                     "email" => "<CONTACT_EMAIL>",
//                     "type" => "<WORK|HOME>"
//                 }
//             ],
//             "name" => {
//                 "formatted_name" => "<CONTACT_FORMATTED_NAME>",
//                 "first_name" => "<CONTACT_FIRST_NAME>",
//                 "last_name" => "<CONTACT_LAST_NAME>",
//                 "middle_name" => "<CONTACT_MIDDLE_NAME>",
//                 "suffix" => "<CONTACT_SUFFIX>",
//                 "prefix" => "<CONTACT_PREFIX>"
//             },
//             "org" => {
//                 "company" => "<CONTACT_ORG_COMPANY>",
//                 "department" => "<CONTACT_ORG_DEPARTMENT>",
//                 "title" => "<CONTACT_ORG_TITLE>"
//             },
//             "phones" => [
//                 {
//                     "phone" => "<CONTACT_PHONE>",
//                     "wa_id" => "<CONTACT_WA_ID>",
//                     "type" => "<HOME|WORK>"
//                 }
//             ],
//             "urls" => [
//                 {
//                     "url" => "<CONTACT_URL>",
//                     "type" => "<HOME|WORK>"
//                 }
//             ]
//         }
//     ]
// }
