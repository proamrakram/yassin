<?php

namespace App\Http\Controllers;

use App\Http\Traits\SenderWhatsApp;
use App\Models\ImageAttachment;
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
            $this->getMediaUrl($sender_image_message);
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

    public function getMediaUrl($sender_image_message)
    {
        $url = 'https://graph.facebook.com/v14.0/' . $sender_image_message->image_id;

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('WHATS_APP_TOKEN'),
        ])->get($url);

        // {
        //     "url": "https:\/\/lookaside.fbsbx.com\/whatsapp_business\/attachments\/?mid=735292130900654&ext=1660879838&hash=ATs2dy19-dJB_4_so6uf_J9Jqbn8OkW_Ney_iszTsUHWEg",
        //     "mime_type": "image\/jpeg",
        //     "sha256": "bcb7a2022e3985b816f90739f950ad8ee5891bd433e713bb1b4cad324f182677",
        //     "file_size": 210577,
        //     "id": "735292130900654",
        //     "messaging_product": "whatsapp"
        // }

        $json = json_decode($response->body());

        Storage::disk('public')->put('images/' . $sender_image_message->id . '.jpg', file_get_contents($json->url));
        Storage::disk('local')->put('json.txt', print_r($json, true));


        $sender_images_attachments = ImageAttachment::create([
            'image_url' => $json->url,
            'mime_type' => $json->mime_type,
            'hash_sha256' => $json->sha256,
            'file_size' => $json->file_size,
            'image_id' => $json->id,
            'messaging_product' => $json->messaging_product,
            'sender_image_message_id' => $sender_image_message->id,
        ]);
    }
}
