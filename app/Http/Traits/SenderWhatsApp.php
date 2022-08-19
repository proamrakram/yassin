<?php

namespace App\Http\Traits;

use App\Http\Controllers\BotController;
use App\Http\Controllers\SenderAudioMessagesController;
use App\Http\Controllers\SenderContactMessagesController;
use App\Http\Controllers\SenderDocumentMessagesController;
use App\Http\Controllers\SenderImageMessagesController;
use App\Http\Controllers\SenderLocationMessagesController;
use App\Http\Controllers\SenderStickerMessagesController;
use App\Http\Controllers\SenderTextMessagesController;
use App\Http\Controllers\SenderVideoMessagesController;
use App\Http\Controllers\WhatsAppSenderController;
use App\Http\Requests\StoreBotRequest;
use App\Http\Requests\StoreSenderAudioMessagesRequest;
use App\Http\Requests\StoreSenderContactMessagesRequest;
use App\Http\Requests\StoreSenderDocumentMessagesRequest;
use App\Http\Requests\StoreSenderImageMessagesRequest;
use App\Http\Requests\StoreSenderLocationMessagesRequest;
use App\Http\Requests\StoreSenderStickerMessagesRequest;
use App\Http\Requests\StoreSenderTextMessagesRequest;
use App\Http\Requests\StoreSenderVideoMessagesRequest;
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

    public function saveSenderStickerMessages($sender, $message)
    {
        $request = new StoreSenderStickerMessagesRequest();

        $senderStickerMessages = new SenderStickerMessagesController();

        $senderStickerMessages = $senderStickerMessages->store($request, $sender, $message);

        return $senderStickerMessages;
    }

    public function saveSenderAudioMessages($sender, $message)
    {
        $request = new StoreSenderAudioMessagesRequest();

        $senderAudioMessages = new SenderAudioMessagesController();

        $senderAudioMessages = $senderAudioMessages->store($request, $sender, $message);

        return $senderAudioMessages;
    }

    public function saveSenderVideoMessages($sender, $message)
    {
        $request = new StoreSenderVideoMessagesRequest();

        $senderVideoMessages = new SenderVideoMessagesController();

        $senderVideoMessages = $senderVideoMessages->store($request, $sender, $message);

        return $senderVideoMessages;
    }

    public function saveSenderImageMessages($sender, $message)
    {
        $request = new StoreSenderImageMessagesRequest();

        $senderImageMessages = new SenderImageMessagesController();

        $senderImageMessages = $senderImageMessages->store($request, $sender, $message);

        return $senderImageMessages;
    }

    public function saveSenderLocationMessages($sender, $message)
    {
        $request = new StoreSenderLocationMessagesRequest();

        $senderLocationMessages = new SenderLocationMessagesController();

        $senderLocationMessages = $senderLocationMessages->store($request, $sender, $message);

        return $senderLocationMessages;
    }

    public function saveSenderContactMessages($sender, $message)
    {
        $request = new StoreSenderContactMessagesRequest();

        $senderContactMessages = new SenderContactMessagesController();

        $senderContactMessages = $senderContactMessages->store($request, $sender, $message);

        return $senderContactMessages;
    }
}
