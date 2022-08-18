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
            if (!$bot) {
                return error_log('Bot not found');
            }
        }

        if ($this->value->contacts && $bot) {
            $sender_whats_app = $this->saveSenderWhatsApp($bot, $this->value->contacts[0]);
            if (!$sender_whats_app) {
                return error_log('Sender not found');
            }
        }

        if ($this->value->messages && $this->value->messages->type == 'text') {
            $sender_text_message = $this->saveSenderTextMessages($sender_whats_app, $this->value->messages[0]);
        }

        if ($this->value->messages && $this->value->messages->type == 'document') {
            $sender_document_message = $this->saveSenderDocumentMessages($sender_whats_app, $this->value->messages[0]);
        }
    }
}
