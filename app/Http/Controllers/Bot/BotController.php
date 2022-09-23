<?php

namespace App\Http\Controllers\Bot;

use App\Http\Controllers\Controller;
use App\Models\Bot;
use App\Http\Requests\StoreBotRequest;
use App\Http\Traits\SendMessages;
use App\Http\Traits\TemplateMessages;
use App\Http\Traits\uploadOne;
use App\Models\WhatsAppSender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class BotController extends Controller
{
    use SendMessages;
    use uploadOne;
    use TemplateMessages;

    private $headers;

    public function __construct()
    {
        $this->headers = [
            'Authorization' => "Bearer "  . env('WHATS_APP_TOKEN'),
            'Content-Type' => 'application/json',
        ];
    }

    public function testSending()
    {
        $message_body = ['preview_url' => false, 'body' => "Hello Amr Akram"];
        return $this->sendTest($this->headers, 'text', '972599916672', $message_body);
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

    public function sendTextMessage(Request $request, WhatsAppSender $wa_user)
    {
        $message_body = ['preview_url' => false, 'body' => $request->new_message];
        $result = $this->send($this->headers, 'text', $wa_user, $message_body);
        if (!$result) {
            return redirect()->back()->with('success', 'Message has not been sent successfully!!');
        }
        return redirect()->back()->with('success', 'Message has been sent successfully!!');
    }

    public function sendTextMessagewithPreviewURL(Request $request, WhatsAppSender $wa_user)
    {
        $message_body = ["preview_url" => true, "body" => "Hello World\n\nhttps://www.youtube.com/watch?v=OTd28lXLEfc"];
        $result = $this->send($this->headers, 'text', $wa_user, $message_body);
        if (!$result) {
            return redirect()->back()->with('success', 'Message has not been sent successfully!!');
        }
        return redirect()->back()->with('success', 'Message has been sent successfully!!');
    }

    public function sendReplyToTextMessage(Request $request, WhatsAppSender $wa_user, $wa_message_id)
    {
        $message_body = ['preview_url' => false, 'body' => $request->message_reply,];
        $result = $this->reply($this->headers, 'text', $wa_user, $message_body, $wa_message_id);
        if (!$result) {
            return redirect()->back()->with('success', 'Message has not been sent successfully!!');
        }
        return redirect()->back()->with('success', 'Message has been sent successfully!!');
    }

    public function sendImageMessage(Request $request, WhatsAppSender $wa_user)
    {
        if ($request->hasFile('new_image_message')) {
            $file = $request->file('new_image_message');
            if ($file->isValid()) {
                $folder = '/uploading';

                $file_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

                $path = $folder . '/' . $file_name . '.' . $file->getClientOriginalExtension();

                $this->uploadOne($file, $folder, 'public', $file_name);

                $url = 'https://wwg.nserveu.com/storage' . $path;

                return $this->sendImageMessageByURL($url, $wa_user, $path);
            }
        }
    }

    public function sendImageMessagebyID(Request $request, WhatsAppSender $wa_user, $wa_image_id)
    {
        $message_body = ['id' => $wa_image_id];
        $result = $this->send($this->headers, 'image', $wa_user, $message_body);
        if (!$result) {
            return redirect()->back()->with('success', 'Message has not been sent successfully!!');
        }
        return redirect()->back()->with('success', 'Message has been sent successfully!!');
    }

    public function sendImageMessageByURL($url, $wa_user, $path)
    {
        $message_body = ['link' => $url];
        $result = $this->send($this->headers, 'image', $wa_user, $message_body);
        sleep(3);
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
        if (!$result) {
            return redirect()->back()->with('success', 'Message has not been sent successfully!!');
        }
        return redirect()->back()->with('success', 'Message has been sent successfully!!');
    }

    public function createTemplateMessage(Request $request)
    {
        $bot = Bot::find($request->bot_id);
        $res = $this->createTemplate($request, $this->headers, $bot->whats_app_business_account_id);
        dd($res->json());
    }

    public function sendTemplateMessageTest()
    {
        $bot = Bot::find(2)->whats_app_business_account_id;

        $data = [
            'messaging_product' => "whatsapp",
            'recipient_type' => 'individual',
            'to' => '972599916672',
            'type' => 'template',
            "template" => [
                "name" => "hello_world",
                'language' => [
                    'code' => 'en_US'
                ],
            ]
        ];

        $url =  "https://graph.facebook.com/v14.0/$bot/messages";

        $response = Http::withHeaders($this->headers)->post(env('URL_MESSAGING'), $data);
        dd($response->json());
    }

    public function sendTemplateMessagewithHeaderImage()
    {
        $bot = Bot::find(2)->whats_app_business_account_id;

        $data = [
            'messaging_product' => "whatsapp",
            'recipient_type' => 'individual',
            'to' => '972599916672',
            'type' => 'template',
            "template" => [
                "name" => "message_admin_tem",
                'language' => [
                    'code' => 'en_US'
                ],

                "components" => [
                    [
                        "type" => "header",
                        "parameters" => [
                            [
                                "type" => "image",
                                "image" => [
                                    "link" => "https://tgtgreenteknoloji.com/storage/images/1110896826469682.jpg"
                                ]
                            ]
                        ]
                    ],
                ]
            ]
        ];

        $url =  "https://graph.facebook.com/v14.0/$bot/messages";
        $response = Http::withHeaders($this->headers)->post(env('URL_MESSAGING'), $data);
        dd($response);
        // return redirect()->back()->with('success', 'Message template has been sent successfully');
    }

    public function sendTemplateMessageWithHeaderDocument()
    {
        $bot = Bot::find(2)->whats_app_business_account_id;

        $data = [
            'messaging_product' => "whatsapp",
            'recipient_type' => 'individual',
            'to' => '972599064812',
            'type' => 'template',
            "template" => [
                "name" => "message_admin_tem",
                'language' => [
                    'code' => 'en_US'
                ],

                "components" => [
                    [
                        "type" => "header",
                        "parameters" => [
                            [
                                "type" => "document",
                                "document" => [
                                    "link" => "https://www.orimi.com/pdf-test.pdf",
                                    "filename" => "document-test"
                                ]
                            ]
                        ]
                    ],
                    [
                        "type" => "body",
                        "parameters" => [
                            [
                                "type" => "text",
                                "text" => "amrakram"
                            ]
                        ]
                    ]
                ]
            ]
        ];

        $url =  "https://graph.facebook.com/v14.0/$bot/messages";
        $response = Http::withHeaders($this->headers)->post(env('URL_MESSAGING'), $data);
        dd($response->json());
    }

    public function sendInteractive()
    {
        $bot = Bot::find(1);

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

        $response = Http::withHeaders($this->headers)->post(env('URL_MESSAGING'), $interactive);
        dd($response->json());
    }



    public function sendInteractiveButtons()
    {
        $bot = Bot::find(1);

        $interactive =
            [
                'messaging_product' => "whatsapp",
                "recipient_type" => "individual",
                "to" => "972599916672",
                "type" => "interactive",
                "interactive" => [
                    "type" => "button",
                    "header" => [
                        "type" => "video",
                        "video" => [
                            "link" => "https://www.youtube.com/watch?v=6TrPOrOlsMs&list=RDDCef2aeepO0&index=9",
                            "provider" => [
                                "name" => "Youtube"
                            ]
                        ]
                    ],
                    "body" => [
                        "text" => "Hi there! 👋 Thanks for your message! 😃\nIt’s just me and [insert names of other workers] running [insert business name]. We receive tons of messages every day and may not be able to get to you right away – so sorry!"
                    ],
                    "footer" => [
                        "text" => "Cheers!"
                    ],
                    "action" => [
                        "buttons" => [
                            [
                                "type" => "reply",
                                "reply" => [
                                    "id" => "12",
                                    "title" => "The First",
                                ]
                            ],
                            [
                                "type" => "reply",
                                "reply" => [
                                    "id" => "13",
                                    "title" => "The Second",
                                ]
                            ]
                        ],
                    ]
                ]
            ];

        $response = Http::withHeaders($this->headers)->post(env('URL_MESSAGING'), $interactive);
        dd($response->json());
    }


    // public function sendReplyToImageMessageByID($message_id, $image_id)
    // {
    //     $whats_app_sender = WhatsAppSender::find(1);

    //     $data = $this->replyToMessageObject(
    //         'image',
    //         $whats_app_sender->phone_number,
    //         [
    //             'id' => $image_id
    //         ],

    //         $message_id
    //     );

    //     return $this->send($this->headers, $data);
    // }



    // public function sendReplyToImageMessageByURL(Request $request, $message_id)
    // {
    //     $whats_app_sender = WhatsAppSender::find(1);

    //     $url = $request->query('url');

    //     $data = $this->replyToMessageObject(
    //         'image',
    //         $whats_app_sender->phone_number,
    //         [
    //             'link' => $url
    //         ],
    //         $message_id
    //     );

    //     return $this->send($this->headers, $data);
    // }

    // public function sendAudioMessageByID($audio_id)
    // {
    //     $whats_app_sender = WhatsAppSender::find(1);

    //     $data = $this->sendMessageObject(
    //         'audio',
    //         $whats_app_sender->phone_number,
    //         [
    //             'id' => $audio_id
    //         ],
    //     );

    //     return $this->send($this->headers, $data);
    // }

    // public function sendReplyToAudioMessageByID($message_id, $audio_id)
    // {
    //     $whats_app_sender = WhatsAppSender::find(1);

    //     $data = $this->replyToMessageObject(
    //         'audio',
    //         $whats_app_sender->phone_number,
    //         [
    //             'id' => $audio_id
    //         ],

    //         $message_id
    //     );

    //     return $this->send($this->headers, $data);
    // }

    // public function sendAudioMessageByURL(Request $request)
    // {
    //     $whats_app_sender = WhatsAppSender::find(1);

    //     $url = $request->query('url');

    //     $data = $this->sendMessageObject(
    //         'audio',
    //         $whats_app_sender->phone_number,
    //         [
    //             'link' => $url
    //         ],
    //     );

    //     return $this->send($this->headers, $data);
    // }

    // public function sendReplyToAudioMessageByURL(Request $request, $message_id)
    // {
    //     $whats_app_sender = WhatsAppSender::find(1);

    //     $url = $request->query('url');

    //     $data = $this->replyToMessageObject(
    //         'audio',
    //         $whats_app_sender->phone_number,
    //         [
    //             'link' => $url
    //         ],
    //         $message_id
    //     );

    //     return $this->send($this->headers, $data);
    // }

    // public function sendDocumentMessageByID($document_id)
    // {
    //     $whats_app_sender = WhatsAppSender::find(1);

    //     $document = SenderDocumentMessages::where('sender_message_id', $whats_app_sender)
    //         ->where('document_id', $document_id)
    //         ->first();

    //     if ($document) {
    //         $id = $document->document_id;
    //         $caption = $document->caption;
    //         $filename =  $document->file_name;
    //     } else {
    //         $id = $document_id;
    //         $caption = "None";
    //         $filename =  "None";
    //     }

    //     $data = $this->sendMessageObject(
    //         'document',

    //         $whats_app_sender->phone_number,
    //         [
    //             'id' => $id,
    //             'caption' => $caption,
    //             'filename' => $filename
    //         ],
    //     );

    //     return $this->send($this->headers, $data);
    // }

    // public function sendReplyToDocumentMessageByID($message_id, $document_id)
    // {
    //     $whats_app_sender = WhatsAppSender::find(1);

    //     $document = SenderDocumentMessages::where('sender_message_id', $whats_app_sender)
    //         ->where('document_id', $document_id)
    //         ->first();

    //     if ($document) {
    //         $id = $document->document_id;
    //         $caption = $document->caption;
    //         $filename =  $document->file_name;
    //     } else {
    //         $id = $document_id;
    //         $caption = "None";
    //         $filename =  "None";
    //     }

    //     $data = $this->replyToMessageObject(
    //         'document',
    //         $whats_app_sender->phone_number,
    //         [
    //             'id' => $id,
    //             'caption' => $caption,
    //             'filename' => $filename
    //         ],
    //         $message_id
    //     );

    //     return $this->send($this->headers, $data);
    // }

    // public function sendDocumentMessageByURL(Request $request)
    // {
    //     $whats_app_sender = WhatsAppSender::find(1);

    //     $url = $request->query('url');

    //     $data = $this->sendMessageObject(
    //         'document',
    //         $whats_app_sender->phone_number,
    //         [
    //             "link" => $url,
    //             "caption" =>  "None"
    //         ],
    //     );

    //     return $this->send($this->headers, $data);
    // }

    // public function sendReplyToDocumentMessageByURL(Request $request, $message_id)
    // {
    //     $whats_app_sender = WhatsAppSender::find(1);

    //     $url = $request->query('url');

    //     $data = $this->replyToMessageObject(
    //         'document',
    //         $whats_app_sender->phone_number,
    //         [
    //             "link" => $url,
    //             "caption" =>  "None"
    //         ],
    //         $message_id
    //     );

    //     return $this->send($this->headers, $data);
    // }

    // public function sendStickerMessageByID($sticker_id)
    // {
    //     $whats_app_sender = WhatsAppSender::find(1);

    //     $data = $this->sendMessageObject(
    //         'sticker',
    //         $whats_app_sender->phone_number,
    //         [
    //             'id' => $sticker_id,
    //         ],
    //     );

    //     return $this->send($this->headers, $data);
    // }

    // public function sendReplyToStickerMessageByID($message_id, $sticker_id)
    // {
    //     $whats_app_sender = WhatsAppSender::find(1);

    //     $data = $this->replyToMessageObject(
    //         'sticker',
    //         $whats_app_sender->phone_number,
    //         [
    //             'id' => $sticker_id,
    //         ],
    //         $message_id
    //     );

    //     return $this->send($this->headers, $data);
    // }

    // public function sendStickerMessageByURL(Request $request)
    // {
    //     $whats_app_sender = WhatsAppSender::find(1);

    //     $url = $request->query('url');

    //     $data = $this->sendMessageObject(
    //         'sticker',
    //         $whats_app_sender->phone_number,
    //         [
    //             "link" => $url,
    //         ],
    //     );

    //     return $this->send($this->headers, $data);
    // }

    // public function sendReplyToStickerMessageByURL(Request $request, $message_id)
    // {
    //     $whats_app_sender = WhatsAppSender::find(1);

    //     $url = $request->query('url');

    //     $data = $this->replyToMessageObject(
    //         'sticker',
    //         $whats_app_sender->phone_number,
    //         [
    //             "link" => $url,
    //         ],

    //         $message_id
    //     );

    //     return $this->send($this->headers, $data);
    // }



    // public function sendVideoMessageByID($video_id)
    // {
    //     $whats_app_sender = WhatsAppSender::find(1);

    //     $video = SenderVideoMessages::where('sender_message_id', $whats_app_sender)
    //         ->where('video_id', $video_id)
    //         ->first();

    //     if ($video) {
    //         $id = $video->video_id;
    //         $caption = "None";
    //     } else {
    //         $id = $video_id;
    //         $caption = "None";
    //     }

    //     $data = $this->sendMessageObject(
    //         'video',
    //         $whats_app_sender->phone_number,
    //         [
    //             'id' => $id,
    //             'caption' => $caption

    //         ],
    //     );

    //     return $this->send($this->headers, $data);
    // }

    // public function sendReplyToVideoMessageByID($message_id, $video_id)
    // {
    //     $whats_app_sender = WhatsAppSender::find(1);

    //     $video = SenderVideoMessages::where('sender_message_id', $whats_app_sender)
    //         ->where('video_id', $video_id)
    //         ->first();

    //     if ($video) {
    //         $id = $video->video_id;
    //         $caption = "None";
    //     } else {
    //         $id = $video_id;
    //         $caption = "None";
    //     }

    //     $data = $this->replyToMessageObject(
    //         'video',
    //         $whats_app_sender->phone_number,
    //         [
    //             'id' => $id,
    //             'caption' => $caption
    //         ],
    //         $message_id
    //     );

    //     return $this->send($this->headers, $data);
    // }

    // public function sendVideoMessageByURL(Request $request)
    // {
    //     $whats_app_sender = WhatsAppSender::find(1);

    //     $url = $request->query('url');

    //     $data = $this->sendMessageObject(
    //         'video',
    //         $whats_app_sender->phone_number,
    //         [
    //             'link' => $url,
    //             'caption' => "None"

    //         ],
    //     );

    //     return $this->send($this->headers, $data);
    // }

    // public function sendReplyToVideoMessageByURL(Request $request, $message_id)
    // {
    //     $whats_app_sender = WhatsAppSender::find(1);

    //     $url = $request->query('url');

    //     $data = $this->replyToMessageObject(
    //         'video',
    //         $whats_app_sender->phone_number,
    //         [
    //             'link' => $url,
    //             'caption' => "None"
    //         ],
    //         $message_id
    //     );

    //     return $this->send($this->headers, $data);
    // }

    // public function sendContactMessage()
    // {
    //     $whats_app_sender = WhatsAppSender::find(1);

    //     $data = $this->sendMessageObject(
    //         'contacts',
    //         $whats_app_sender->phone_number,

    //         [
    //             "contacts" =>  [
    //                 [
    //                     "addresses" =>  [
    //                         [
    //                             "street" =>  "<ADDRESS_STREET>",
    //                             "city" =>  "<ADDRESS_CITY>",
    //                             "state" =>  "<ADDRESS_STATE>",
    //                             "zip" =>  "<ADDRESS_ZIP>",
    //                             "country" =>  "<ADDRESS_COUNTRY>",
    //                             "country_code" =>  "<ADDRESS_COUNTRY_CODE>",
    //                             "type" =>  "<HOME|WORK>"
    //                         ]
    //                     ],
    //                     "birthday" =>  "<CONTACT_BIRTHDAY>",
    //                     "emails" =>  [
    //                         [
    //                             "email" =>  "<CONTACT_EMAIL>",
    //                             "type" =>  "<WORK|HOME>"
    //                         ]
    //                     ],
    //                     "name" =>  [
    //                         "formatted_name" =>  "<CONTACT_FORMATTED_NAME>",
    //                         "first_name" =>  "<CONTACT_FIRST_NAME>",
    //                         "last_name" =>  "<CONTACT_LAST_NAME>",
    //                         "middle_name" =>  "<CONTACT_MIDDLE_NAME>",
    //                         "suffix" =>  "<CONTACT_SUFFIX>",
    //                         "prefix" =>  "<CONTACT_PREFIX>"
    //                     ],
    //                     "org" =>  [
    //                         "company" =>  "<CONTACT_ORG_COMPANY>",
    //                         "department" =>  "<CONTACT_ORG_DEPARTMENT>",
    //                         "title" =>  "<CONTACT_ORG_TITLE>"
    //                     ],
    //                     "phones" =>  [
    //                         [
    //                             "phone" =>  "<CONTACT_PHONE>",
    //                             "wa_id" =>  "<CONTACT_WA_ID>",
    //                             "type" =>  "<HOME|WORK>"
    //                         ]
    //                     ],
    //                     "urls" =>  [
    //                         [
    //                             "url" =>  "<CONTACT_URL>",
    //                             "type" =>  "<HOME|WORK>"
    //                         ]
    //                     ]
    //                 ]
    //             ]


    //         ],
    //     );

    //     return $this->send($this->headers, $data);
    // }

    // public function sendReplyToContactMessage()
    // {
    // }

    // public function sendLocationMessage(Request $request, $message_id)
    // {
    //     $whats_app_sender = WhatsAppSender::find(1);

    //     $url = $request->query('url');

    //     $data = $this->sendMessageObject(
    //         'location',
    //         $whats_app_sender->phone_number,
    //         [
    //             "latitude" => "<LOCATION_LATITUDE>",
    //             "longitude" => "<LOCATION_LONGITUDE>",
    //             "name" => "<LOCATION_NAME>",
    //             "address" => "<LOCATION_ADDRESS>"
    //         ],
    //     );

    //     return $this->send($this->headers, $data);
    // }

    // public function sendReplyToLocationMessage($message_id)
    // {
    //     $whats_app_sender = WhatsAppSender::find(1);

    //     $data = $this->sendMessageObject(
    //         'location',
    //         $whats_app_sender->phone_number,
    //         [
    //             "latitude" => "<LOCATION_LATITUDE>",
    //             "longitude" => "<LOCATION_LONGITUDE>",
    //             "name" => "<LOCATION_NAME>",
    //             "address" => "<LOCATION_ADDRESS>"
    //         ],
    //         $message_id
    //     );

    //     return $this->send($this->headers, $data);
    // }



























    // public function sendMessageTemplateMedia()
    // {
    //     $whats_app_sender = WhatsAppSender::find(1);

    //     $data = $this->sendMessageObject(
    //         'template',
    //         $whats_app_sender->phone_number,
    //         [
    //             "name" => "template-name",
    //             "language" => [
    //                 "code" => "language-and-locale-code"
    //             ],
    //             "components" => [
    //                 [
    //                     "type" => "header",
    //                     "parameters" => [
    //                         [
    //                             "type" => "image",
    //                             "image" => [
    //                                 "link" => "http(s)://the-image-url"
    //                             ]
    //                         ]
    //                     ]
    //                 ],
    //                 [
    //                     "type" => "body",
    //                     "parameters" => [
    //                         [
    //                             "type" => "text",
    //                             "text" => "text-string"
    //                         ],
    //                         [
    //                             "type" => "currency",
    //                             "currency" => [
    //                                 "fallback_value" => "$100.99",
    //                                 "code" => "USD",
    //                                 "amount_1000" => 100990
    //                             ]
    //                         ],
    //                         [
    //                             "type" => "date_time",
    //                             "date_time" => [
    //                                 "fallback_value" => "February 25, 1977",
    //                                 "day_of_week" => 5,
    //                                 "year" => 1977,
    //                                 "month" => 2,
    //                                 "day_of_month" => 25,
    //                                 "hour" => 15,
    //                                 "minute" => 33,
    //                                 "calendar" => "GREGORIAN"
    //                             ]
    //                         ]
    //                     ]
    //                 ]
    //             ]
    //         ],
    //     );

    //     return $this->send($this->headers, $data);
    // }

    // public function sendMessageTemplateInteractive()
    // {
    //     $whats_app_sender = WhatsAppSender::find(1);

    //     $data = $this->sendMessageObject(
    //         'template',
    //         $whats_app_sender->phone_number,
    //         [
    //             "name" => "template-name",
    //             "language" => [
    //                 "code" => "language-and-locale-code"
    //             ],
    //             "components" => [
    //                 [
    //                     "type" => "header",
    //                     "parameters" => [
    //                         [
    //                             "type" => "image",
    //                             "image" => [
    //                                 "link" => "http(s)://the-image-url"
    //                             ]
    //                         ]
    //                     ]
    //                 ],
    //                 [
    //                     "type" => "body",
    //                     "parameters" => [
    //                         [
    //                             "type" => "text",
    //                             "text" => "text-string"
    //                         ],
    //                         [
    //                             "type" => "currency",
    //                             "currency" => [
    //                                 "fallback_value" => "$100.99",
    //                                 "code" => "USD",
    //                                 "amount_1000" => 100990
    //                             ]
    //                         ],
    //                         [
    //                             "type" => "date_time",
    //                             "date_time" => [
    //                                 "fallback_value" => "February 25, 1977",
    //                                 "day_of_week" => 5,
    //                                 "year" => 1977,
    //                                 "month" => 2,
    //                                 "day_of_month" => 25,
    //                                 "hour" => 15,
    //                                 "minute" => 33,
    //                                 "calendar" => "GREGORIAN"
    //                             ]
    //                         ]
    //                     ]
    //                 ],
    //                 [
    //                     "type" => "button",
    //                     "sub_type" => "quick_reply",
    //                     "index" => "0",
    //                     "parameters" => [
    //                         [
    //                             "type" => "payload",
    //                             "payload" => "aGlzIHRoaXMgaXMgY29v"
    //                         ]
    //                     ]
    //                 ],
    //                 [
    //                     "type" => "button",
    //                     "sub_type" => "quick_reply",
    //                     "index" => "1",
    //                     "parameters" => [
    //                         [
    //                             "type" => "payload",
    //                             "payload" => "9rwnB8RbYmPF5t2Mn09x4h"
    //                         ]
    //                     ]
    //                 ]
    //             ]
    //         ],
    //     );

    //     return $this->send($this->headers, $data);
    // }

    // public function sendListMessage()
    // {
    //     $whats_app_sender = WhatsAppSender::find(1);


    //     //     "type" => "interactive",
    //     //     "interactive" => {
    //     //         "type" => "list",
    //     //         "header" => {
    //     //             "type" => "text",
    //     //             "text" => "<HEADER_TEXT>"
    //     //         },
    //     //         "body" => {
    //     //             "text" => "<BODY_TEXT>"
    //     //         },
    //     //         "footer" => {
    //     //             "text" => "<FOOTER_TEXT>"
    //     //         },
    //     //         "action" => {
    //     //             "button" => "<BUTTON_TEXT>",
    //     //             "sections" => [
    //     //                 {
    //     //                     "title" => "<LIST_SECTION_1_TITLE>",
    //     //                     "rows" => [
    //     //                         {
    //     //                             "id" => "<LIST_SECTION_1_ROW_1_ID>",
    //     //                             "title" => "<SECTION_1_ROW_1_TITLE>",
    //     //                             "description" => "<SECTION_1_ROW_1_DESC>"
    //     //                         },
    //     //                         {
    //     //                             "id" => "<LIST_SECTION_1_ROW_2_ID>",
    //     //                             "title" => "<SECTION_1_ROW_2_TITLE>",
    //     //                             "description" => "<SECTION_1_ROW_2_DESC>"
    //     //                         }
    //     //                     ]
    //     //                 },
    //     //                 {
    //     //                     "title" => "<LIST_SECTION_2_TITLE>",
    //     //                     "rows" => [
    //     //                         {
    //     //                             "id" => "<LIST_SECTION_2_ROW_1_ID>",
    //     //                             "title" => "<SECTION_2_ROW_1_TITLE>",
    //     //                             "description" => "<SECTION_2_ROW_1_DESC>"
    //     //                         },
    //     //                         {
    //     //                             "id" => "<LIST_SECTION_2_ROW_2_ID>",
    //     //                             "title" => "<SECTION_2_ROW_2_TITLE>",
    //     //                             "description" => "<SECTION_2_ROW_2_DESC>"
    //     //                         }
    //     //                     ]
    //     //                 }
    //     //             ]
    //     //         }
    //     //     }
    //     // }
    // }

    // public function sendReplyToListMessage()
    // {
    // //     "type" => "interactive",
    // //     "interactive" => {
    // //         "type" => "list",
    // //         "header" => {
    // //             "type" => "text",
    // //             "text" => "<HEADER_TEXT>"
    // //         },
    // //         "body" => {
    // //             "text" => "<BODY_TEXT>"
    // //         },
    // //         "footer" => {
    // //             "text" => "<FOOTER_TEXT>"
    // //         },
    // //         "action" => {
    // //             "button" => "<BUTTON_TEXT>",
    // //             "sections" => [
    // //                 {
    // //                     "title" => "<LIST_SECTION_1_TITLE>",
    // //                     "rows" => [
    // //                         {
    // //                             "id" => "<LIST_SECTION_1_ROW_1_ID>",
    // //                             "title" => "<SECTION_1_ROW_1_TITLE>",
    // //                             "description" => "<SECTION_1_ROW_1_DESC>"
    // //                         },
    // //                         {
    // //                             "id" => "<LIST_SECTION_1_ROW_2_ID>",
    // //                             "title" => "<SECTION_1_ROW_2_TITLE>",
    // //                             "description" => "<SECTION_1_ROW_2_DESC>"
    // //                         }
    // //                     ]
    // //                 },
    // //                 {
    // //                     "title" => "<LIST_SECTION_2_TITLE>",
    // //                     "rows" => [
    // //                         {
    // //                             "id" => "<LIST_SECTION_2_ROW_1_ID>",
    // //                             "title" => "<SECTION_2_ROW_1_TITLE>",
    // //                             "description" => "<SECTION_2_ROW_1_DESC>"
    // //                         },
    // //                         {
    // //                             "id" => "<LIST_SECTION_2_ROW_2_ID>",
    // //                             "title" => "<SECTION_2_ROW_2_TITLE>",
    // //                             "description" => "<SECTION_2_ROW_2_DESC>"
    // //                         }
    // //                     ]
    // //                 }
    // //             ]
    // //         }
    // //     }
    // // }
    // }

    // public function sendReplyButton()
    // {
    // //     "interactive" => {
    // //         "type" => "button",
    // //         "body" => {
    // //             "text" => "<BUTTON_TEXT>"
    // //         },
    // //         "action" => {
    // //             "buttons" => [
    // //                 {
    // //                     "type" => "reply",
    // //                     "reply" => {
    // //                         "id" => "<UNIQUE_BUTTON_ID_1>",
    // //                         "title" => "<BUTTON_TITLE_1>"
    // //                     }
    // //                 },
    // //                 {
    // //                     "type" => "reply",
    // //                     "reply" => {
    // //                         "id" => "<UNIQUE_BUTTON_ID_2>",
    // //                         "title" => "<BUTTON_TITLE_2>"
    // //                     }
    // //                 }
    // //             ]
    // //         }
    // //     }
    // // }
    // }

    // public function markMessageAsRead()
    // {
    //     // {
    //     //     "messaging_product" => "whatsapp",
    //     //     "status" => "read",
    //     //     "message_id" => "<INCOMING_MSG_ID>"
    //     // }
    // }


}
