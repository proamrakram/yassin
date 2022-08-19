<?php

return [
    'audio' => [
        "audio/aac" => [
            "extension" => "aac",
            "mime" => "audio/aac",
        ],

        "audio/mp4" => [
            "extension" => "mp4",
            "mime" => "audio/mp4",
        ],

        "audio/mpeg" => [
            "extension" => "mp3",
            "mime" => "audio/mpeg",
        ],

        "audio/ogg" => [
            "extension" => "ogg",
            "mime" => "audio/ogg",
            "note" => "only opus codecs, base audio/ogg is not supported",
        ],

        "size-limit" => "16MB",
    ],

    "document" => [

        "text/plain" => [
            "extension" => "txt",
            "mime" => "text/plain",
        ],

        "application/pdf" => [
            "extension" => "pdf",
            "mime" => "application/pdf",
        ],

        "application/vnd.ms-powerpoint" => [
            "extension" => "ppt",
            "mime" => "application/vnd.ms-powerpoint",
        ],

        "application/msword" => [
            "extension" => "doc",
            "mime" => "application/msword",
        ],

        "application/vnd.ms-excel" => [
            "extension" => "xls",
            "mime" => "application/vnd.ms-excel",
        ],

        "application/vnd.openxmlformats-officedocument.wordprocessingml.document" => [
            "extension" => "docx",
            "mime" => "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
        ],

        "application/vnd.openxmlformats-officedocument.presentationml.presentation" => [
            "extension" => "pptx",
            "mime" => "application/vnd.openxmlformats-officedocument.presentationml.presentation",
        ],

        "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" => [
            "extension" => "xlsx",
            "mime" => "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
        ],

        "size-limit" => "100MB",
    ],

    "image" => [

        "image/jpeg" => [
            "extension" => "jpg",
            "mime" => "image/jpeg",
        ],

        "image/png" => [
            "extension" => "png",
            "mime" => "image/png",
        ],

        "image/gif" => [
            "extension" => "gif",
            "mime" => "image/gif",
        ],

        "size-limit" => "5MB",
    ],

    "video" => [
        "video/mp4" => [
            "extension" => "mp4",
            "mime" => "video/mp4",
        ],

        "video/3gpp" => [
            "extension" => "3gp",
            "mime" => "video/3gpp",
            "notes" => [
                "Only H.264 video codec and AAC audio codec is supported.",
                "We support videos with a single audio stream or no audio stream."
            ],
        ],

        "size-limit" => "16MB",
    ],

    "sticker" => [
        "image/webp" => [
            "extension" => "webp",
            "mime" => "image/webp",
        ],
        "size-limit" => "100KB",
    ],

];
