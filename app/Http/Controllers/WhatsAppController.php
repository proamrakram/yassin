<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBotRequest;
use App\Http\Requests\StoreSenderTextMessagesRequest;
use App\Models\WhatsApp;
use App\Http\Requests\StoreWhatsAppSenderRequest;
use App\Http\Traits\SenderWhatsApp;
use App\Models\Bot;
use App\Models\SenderTextMessages;
use App\Models\WhatsAppSender;

class WhatsAppController extends Controller
{
    use SenderWhatsApp;

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

            $bot = $this->saveBotWhatsApp($data);

            // $bot = Bot::where('whats_app_business_account_id', (int)$data->entry[0]->id)->first();

            // if (!$bot) {
            //     $request = new StoreBotRequest();

            //     $bot = $this->bot->store(
            //         $request,
            //         $data->object,
            //         $data->entry[0]->id,
            //         $this->value->metadata->display_phone_number,
            //         $this->value->metadata->phone_number_id,
            //         $this->value->messaging_product
            //     );
            // }
        }

        if ($this->value->contacts) {

            $sender_whats_app = $this->saveSenderWhatsApp($bot, $this->value->contacts[0]);

            // $contact = WhatsAppSender::where('phone_number', (string)$this->value->contacts[0]->wa_id)->first();

            // if (!$contact && $bot) {

            //     $request = new StoreWhatsAppSenderRequest();

            //     $contact = $this->whatsAppSender->store($request, $bot->id, $this->value->contacts[0]);
            // }
        }



        // if ($this->value->messages) {
        //     if ($bot && $contact) {

        //         $request = new StoreSenderTextMessagesRequest();

        //     }
        // }
    }
}
