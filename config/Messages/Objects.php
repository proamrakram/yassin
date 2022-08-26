<?php


return [
    "messages" => [
        "0" => [
            "audio" => [
                "id" => "",
                "link" => "",
                "caption" => "",
                "filename" => "",
                "provider" => ""
            ],
            "contacts" => [
                "0" => [
                    "addresses" => [
                        "0" => [
                            "street" => "",
                            "city" => "",
                            "state" => "",
                            "zip" => "",
                            "country" => "",
                            "country_code" => "",
                            "type" => "",
                        ]
                    ],
                    "birthday" => "YYYY-MM-DD",
                    "emails" => [
                        "0" => [
                            "email" => "",
                            "type" => "HOME or WORK",
                        ]
                    ],
                    "name" => [
                        "formatted_name" => "",
                        "first_name" => "",
                        "last_name" => "",
                        "middle_name" => "",
                        "suffix" => "",
                        "prefix" => "",
                    ],
                    "org" => [
                        "company" => "",
                        "department" => "",
                        "title" => "",
                    ],
                    "phones" => [
                        "0" => [
                            "phone" => "",
                            "type" => "CELL, MAIN, IPHONE, HOME, and WORK.",
                            "wa_id" => "",
                        ]
                    ],
                    "urls" => [
                        "0" => [
                            "url" => "",
                            "type" => "HOME or WORK",
                        ]
                    ],
                ],
            ],
            "document" => [
                "id" => "",
                "link" => "",
                "caption" => "",
                "filename" => "",
                "provider" => ""
            ],
            "hsm" => [],
            "image" => [
                "id" => "",
                "link" => "",
                "caption" => "",
                "filename" => "",
                "provider" => ""
            ],
            "interactive" => [

                "action" => [
                    "button" => "",
                    "buttons" => [
                        "0" => [
                            "type" => "",
                            "title" => "",
                            "id" => "", #is returned when user clicks on button
                        ]
                    ],
                    "sections" => [
                        "0" => [
                            "title" => "",
                            "rows" => [
                                "0" => [
                                    "id" => "",
                                    "title" => "",
                                    "description" => "",
                                ]
                            ],
                        ],
                    ]
                ],


                "body" => [
                    "text" => "The text of the message. 1024 characters max.",
                ],

                "footer" => [
                    "text" => "The footer of the message. 60 characters max.",
                ],

                "header" => [
                    "type" =>  "The header type you would like to use: image, video, text or document",
                    "text" => "Text for the header. Formatting allows emojis, but not markdown. Maximum length: 60 characters.",
                    "video" => "Contains the media object for this video.",
                    "image" => "Contains the media object for this image.",
                    "document" => "Contains the media object for this document.",
                ],

                "type" => [
                    "list" => "Use it for List Messages.",
                    "button" => "Use it for Reply Buttons.",
                ]
            ],
            "location" => [
                "longitude" => "",
                "latitude" => "",
                "name" => "",
                "address" => "",
            ],
            "messaging_product" => "whatsapp",
            "preview_url" => "false or true",
            "recipient_type" => "individual",
            "status" => "read",
            "sticker" => [
                "id" => "",
                "link" => "",
                "caption" => "",
                "filename" => "",
                "provider" => ""
            ],
            "template" => [
                "name" => "",
                "language" => [
                    "policy" => "",
                    "code" => "",
                ],
                "components" => [
                    "0" => [
                        "type" => "body or header or button",
                        "sub_type" => ["quick_reply", "url"],
                        "parameters" => [
                            "0" => [
                                "type" => "text",
                                "text" => "Hi there",
                            ],
                        ],
                        "index" => "index of buttons",
                    ]
                ],

                "namespace" => "",
            ],
            "text" => [
                "body" => "The text of the message. 1024 characters max.",
                "preview_url" => "false or true",
            ],
            "to" => "",
            "type" => "text",
        ]
    ]
];
