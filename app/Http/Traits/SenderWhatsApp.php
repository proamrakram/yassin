<?php

namespace App\Http\Traits;

use App\Http\Controllers\BotController;
use App\Http\Controllers\SenderDocumentMessagesController;
use App\Http\Controllers\SenderTextMessagesController;
use App\Http\Controllers\WhatsAppSenderController;
use App\Http\Requests\StoreBotRequest;
use App\Http\Requests\StoreSenderDocumentMessagesRequest;
use App\Http\Requests\StoreSenderTextMessagesRequest;
use App\Http\Requests\StoreWhatsAppSenderRequest;
use App\Models\Bot;
use App\Models\WhatsAppSender;

trait SenderWhatsApp
{
    // private $value;
    // private $field;

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
        $request = new StoreSenderTextMessagesRequest();

        $senderTextMessages = new SenderTextMessagesController();

        $senderTextMessages = $senderTextMessages->store($request, $sender, $message);

        return $senderTextMessages;
    }

    public function saveSenderDocumentMessages($sender, $message)
    {
        $request = new StoreSenderDocumentMessagesRequest();

        $senderDocumentMessages = new SenderDocumentMessagesController();

        $senderDocumentMessages = $senderDocumentMessages->store($request, $sender, $message);

        return $senderDocumentMessages;
    }


}
