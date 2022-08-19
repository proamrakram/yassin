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
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

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

        if ($this->value->messages && $this->value->messages[0]->type == 'text') {
            $sender_text_message = $this->saveSenderTextMessages($sender_whats_app, $this->value->messages[0]);
        }

        if ($this->value->messages && $this->value->messages[0]->type == 'document') {
            $sender_document_message = $this->saveSenderDocumentMessages($sender_whats_app, $this->value->messages[0]);
        }

        if ($this->value->messages && $this->value->messages[0]->type == 'audio') {
            $sender_audio_message = $this->saveSenderAudioMessages($sender_whats_app, $this->value->messages[0]);
        }

        if ($this->value->messages && $this->value->messages[0]->type == 'video') {
            $sender_video_message = $this->saveSenderVideoMessages($sender_whats_app, $this->value->messages[0]);
        }

        if ($this->value->messages && $this->value->messages[0]->type == 'image') {
            $sender_image_message = $this->saveSenderImageMessages($sender_whats_app, $this->value->messages[0]);
            $this->getMediaUrl($sender_image_message->image_id);
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

    public function getMediaUrl($media_id)
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://graph.facebook.com/v14.0/838940654181324',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . env('WHATS_APP_TOKEN'),
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;

        Storage::disk('local')->put('media/' . $media_id, $response);
    }
}
