<?php

namespace App\Http\Controllers\Whatsapp;

use App\Http\Controllers\Controller;
use App\Models\AudioAttachment;
use App\Http\Requests\StoreAudioAttachmentRequest;
use App\Http\Requests\UpdateAudioAttachmentRequest;

class AudioAttachmentController extends Controller
{
    public function store(StoreAudioAttachmentRequest $request, $sender_audio_message, $audio)
    {
        $sender_audio_attachments = AudioAttachment::where('audio_id', $audio->id)->first();

        if (!$sender_audio_attachments) {
            $sender_audio_attachments = AudioAttachment::create([
                'audio_url' => $audio->url,
                'is_url_expired' => true,
                'mime_type' => $audio->mime_type,
                'hash_sha256' => $audio->sha256,
                'file_size' => $audio->file_size,
                'audio_id' => $audio->id,
                'messaging_product' => $audio->messaging_product,
                'audio_message_id' => $sender_audio_message->id,
            ]);
            return $sender_audio_attachments;
        }
        return $sender_audio_attachments;
    }
}
