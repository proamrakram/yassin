<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Http;

trait SendMessages
{
    public function send($headers, $data)
    {
        return Http::withHeaders($headers)->post(env('URL_MESSAGING'), $data);
    }

    public function sendMessageObject($type, $to, $message)
    {
        return [
            'messaging_product' => 'whatsapp',
            'recipient_type' => 'individual',
            'to' => $to,
            'type' => $type,
            $type => $message,
        ];
    }

    public function replyToMessageObject($type, $to, $message, $message_id)
    {
        return [
            'messaging_product' => 'whatsapp',
            'recipient_type' => 'individual',
            "context" => [
                "message_id" => $message_id
            ],
            'to' => $to,
            'type' => $type,
            $type => $message,
        ];
    }
}
