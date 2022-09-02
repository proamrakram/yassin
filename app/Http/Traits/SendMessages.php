<?php

namespace App\Http\Traits;

use App\Models\BotMessage;
use Illuminate\Support\Facades\Http;

trait SendMessages
{
    public function send($headers, $type, $wa_user, $message_body)
    {
        $data = $this->sendMessageObject($type, $wa_user->phone_number, $message_body);
        $response =  Http::withHeaders($headers)->post(env('URL_MESSAGING'), $data);
        return $this->saveResponse($response, $wa_user->bot_id);
    }

    public function reply($headers, $type, $wa_user, $message_body, $wa_message_id)
    {
        $data = $this->replyToMessageObject($type, $wa_user->phone_number, $message_body, $wa_message_id);
        $response = Http::withHeaders($headers)->post(env('URL_MESSAGING'), $data);
        return $this->saveResponse($response, $wa_user->bot_id);
    }

    public function saveResponse($response)
    {
        return $response;
        return BotMessage::create([
            'bot_id' => 1,
            'messaging_product' => $response->getData()->messaging_product,
            'contacts' => $response->getData()->contacts,
            'messages' => $response->getData()->messages
        ]);
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
