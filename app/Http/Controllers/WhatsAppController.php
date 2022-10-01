<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Bot\BotController;
use App\Http\Controllers\Whatsapp\WhatsAppSenderController;
use App\Http\Traits\SenderWhatsApp;
use App\Http\Traits\WhatsAppMedia;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class WhatsAppController extends Controller
{
    use SenderWhatsApp;
    use WhatsAppMedia;

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


        $headers =  [
            'Authorization' => "Bearer "  . env('WHATS_APP_TOKEN'),
            'Content-Type' => 'application/json',
        ];

        //Send Greeting Message
        $data = [
            'messaging_product' => "whatsapp",
            'recipient_type' => 'individual',
            'to' => '972599916672',
            'type' => 'template',
            "template" => [
                "name" => "greeting_message_v4",
                'language' => [
                    'code' => 'en_US'
                ],
            ]
        ];

        $url =  "https://graph.facebook.com/v14.0/$bot->whats_app_business_account_id/messages";
        $response = Http::withHeaders($headers)->post(env('URL_MESSAGING'), $data);

        Storage::disk('local')->put('whatsappdata.txt', print_r($data, true));

        if (isset($this->value)) {

            if (isset($this->value->contacts) && $bot) {
                $sender_whats_app = $this->saveSenderWhatsApp($bot, $this->value->contacts[0]);
                if (!$sender_whats_app) {
                    return error_log('Sender not found');
                }
            }

            if (isset($this->value->messages) && $this->value->messages[0]->type == 'text') {
                $sender_text_message = $this->saveSenderTextMessages($sender_whats_app, $this->value->messages[0]);
            }

            if (isset($this->value->messages) && $this->value->messages[0]->type == 'document') {
                $sender_document_message = $this->saveSenderDocumentMessages($sender_whats_app, $this->value->messages[0]);
                $this->getFileUrl($sender_document_message, 'document');
            }

            if (isset($this->value->messages) && $this->value->messages[0]->type == 'audio') {
                $sender_audio_message = $this->saveSenderAudioMessages($sender_whats_app, $this->value->messages[0]);
                $this->getFileUrl($sender_audio_message, 'audio');
            }

            if (isset($this->value->messages) && $this->value->messages[0]->type == 'video') {
                $sender_video_message = $this->saveSenderVideoMessages($sender_whats_app, $this->value->messages[0]);
                $this->getFileUrl($sender_video_message, 'video');
            }

            if (isset($this->value->messages) && $this->value->messages[0]->type == 'image') {
                $sender_image_message = $this->saveSenderImageMessages($sender_whats_app, $this->value->messages[0]);
                $this->getFileUrl($sender_image_message, 'image');
            }

            if (isset($this->value->messages) && $this->value->messages[0]->type == 'location') {
                $sender_location_message = $this->saveSenderLocationMessages($sender_whats_app, $this->value->messages[0]);
            }

            if (isset($this->value->messages) && $this->value->messages[0]->type == 'contacts') {
                $sender_contact_message = $this->saveSenderContactMessages($sender_whats_app, $this->value->messages[0]);
            }

            if (isset($this->value->messages) && $this->value->messages[0]->type == 'sticker') {
                $sender_sticker_message = $this->saveSenderStickerMessages($sender_whats_app, $this->value->messages[0]);
            }

            if (isset($this->value->messages) && $this->value->messages[0]->type == 'interactive') {
                $sender_interactive_message = $this->saveSenderInteractiveMessages($sender_whats_app, $this->value->messages[0]);
                // return true;
            }
        }
    }

    public function getFileUrl($sender_file, $type)
    {
        if ($type == 'document') {
            $url = 'https://graph.facebook.com/v14.0/' . $sender_file->document_id;
            return $this->saveFile($sender_file, $url, $type);
        }

        if ($type == 'audio') {
            $url = 'https://graph.facebook.com/v14.0/' . $sender_file->audio_id;
            return $this->saveFile($sender_file, $url, $type);
        }

        if ($type == 'video') {
            $url = 'https://graph.facebook.com/v14.0/' . $sender_file->video_id;
            return $this->saveFile($sender_file, $url, $type);
        }

        if ($type == 'image') {
            $url = 'https://graph.facebook.com/v14.0/' . $sender_file->image_id;
            return $this->saveFile($sender_file, $url, $type);
        }
    }
}
