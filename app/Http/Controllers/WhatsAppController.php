<?php

namespace App\Http\Controllers;

use App\Http\Traits\SenderWhatsApp;
use App\Http\Traits\WhatsAppMedia;
use App\Models\ImageAttachment;
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

        if ($this->value->contacts && $bot) {
            $sender_whats_app = $this->saveSenderWhatsApp($bot, $this->value->contacts[0]);
            if (!$sender_whats_app) {
                return error_log('Sender not found');
            }
        }

        if ($this->value->messages && $this->value->messages[0]->type == 'text') {
            $sender_text_message = $this->saveSenderTextMessages($sender_whats_app, $this->value->messages[0]);
        }

        if ($this->value->messages && $this->value->messages[0]->type == 'document') {
            $sender_document_message = $this->saveSenderDocumentMessages($sender_whats_app, $this->value->messages[0]);
            $this->getDocumentUrl($sender_document_message);
        }

        if ($this->value->messages && $this->value->messages[0]->type == 'audio') {
            $sender_audio_message = $this->saveSenderAudioMessages($sender_whats_app, $this->value->messages[0]);
            $this->getAudioUrl($sender_audio_message);
        }

        if ($this->value->messages && $this->value->messages[0]->type == 'video') {
            $sender_video_message = $this->saveSenderVideoMessages($sender_whats_app, $this->value->messages[0]);
            $this->getVideoUrl($sender_video_message);
        }

        if ($this->value->messages && $this->value->messages[0]->type == 'image') {
            $sender_image_message = $this->saveSenderImageMessages($sender_whats_app, $this->value->messages[0]);
            $this->getImageUrl($sender_image_message);
        }

        if ($this->value->messages && $this->value->messages[0]->type == 'location') {
            $sender_location_message = $this->saveSenderLocationMessages($sender_whats_app, $this->value->messages[0]);
        }

        if ($this->value->messages && $this->value->messages[0]->type == 'contacts') {
            $sender_contact_message = $this->saveSenderContactMessages($sender_whats_app, $this->value->messages[0]);
        }

        if ($this->value->messages && $this->value->messages[0]->type == 'sticker') {
            $sender_sticker_message = $this->saveSenderStickerMessages($sender_whats_app, $this->value->messages[0]);
        }
    }

    public function getDocumentUrl($sender_document_message)
    {
        $this->saveDocument($sender_document_message);
    }

    public function getAudioUrl($sender_audio_message)
    {
        $this->saveAudio($sender_audio_message);
    }

    public function getVideoUrl($sender_video_message)
    {
        $this->saveVideo($sender_video_message);
    }

    public function getImageUrl($sender_image_message)
    {
        $this->saveImage($sender_image_message);
    }
}
