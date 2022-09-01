<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Http;

trait SendMessages
{
    public function send($headers, $type, $wa_user, $message_body)
    {
        $data = $this->sendMessageObject($type, $wa_user->phone_number, $message_body);
        return Http::withHeaders($headers)->post(env('URL_MESSAGING'), $data);
    }

    public function reply($headers, $type, $wa_user, $message_body, $wa_message_id)
    {
        $data = $this->replyToMessageObject($type, $wa_user->phone_number, $message_body, $wa_message_id);
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

    public function replyToMessageObject($type, $to, $message_body, $wa_message_id)
    {
        return [
            'messaging_product' => 'whatsapp',
            'recipient_type' => 'individual',
            "context" => [
                "message_id" => $wa_message_id
            ],
            'to' => $to,
            'type' => $type,
            $type => $message_body,
        ];
    }
}
