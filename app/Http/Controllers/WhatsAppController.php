<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBotRequest;
use App\Models\WhatsApp;
use App\Http\Requests\StoreWhatsAppSenderRequest;
use App\Models\Bot;
use App\Models\WhatsAppSender;

class WhatsAppController extends Controller
{
    private $value;
    private $field;
    private $bot;
    private $whatsAppSender;

    public function __construct(BotController $bot, WhatsAppSenderController $whatsAppSender)
    {
        $this->bot = $bot;
        $this->whatsAppSender = $whatsAppSender;

        $this->bot = $bot;
        $this->value = 'whatsapp';
        $this->field = 'messages';
    }

    public function handleMessage($data)
    {
        $this->value = $data->entry[0]->changes[0]->value;
        $this->field = $data->entry[0]->changes[0]->field;

        if ($this->value) {

            $bot = Bot::where('whats_app_business_account_id', (int)$data->entry[0]->id)->first();

            if (!$bot) {
                $request = new StoreBotRequest();

                $bot = $this->bot->store(
                    $request,
                    $data->object,
                    $data->entry[0]->id,
                    $this->value->metadata->display_phone_number,
                    $this->value->metadata->phone_number_id,
                    $this->value->messaging_product
                );
            }
        }

        // if ($this->value->contacts) {

        //     $contact = WhatsAppSender::where('phone_number', (int)$this->value->contacts[0]->wa_id)->first();

        //     if (!$contact) {

        //         $request = new StoreWhatsAppSenderRequest();

        //         $this->whatsAppSender->store($request, $bot->id, $this->value->contacts[0]);
        //     }
        // }

    }
}
