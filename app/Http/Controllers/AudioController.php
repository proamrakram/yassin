<?php

namespace App\Http\Controllers;

use App\Models\Audio;
use App\Http\Requests\StoreAudioRequest;
use App\Http\Requests\UpdateAudioRequest;

class AudioController extends Controller
{
    public function store(StoreAudioRequest $request,  $sender, $message)
    {
        $sender_audio_message = Audio::where('audio_id', $message->audio->id)->first();

        if (!$sender_audio_message) {
            return Audio::create([
                'from_phone_number' => $message->from,
                'message_timestamp' => date('Y/m/d H:i:s', (int)$message->timestamp),
                'message_id' => $message->id,
                'message_type' => $message->type,
                'mime_type' => $message->audio->mime_type,
                'hash_sha_256' => $message->audio->sha256,
                'audio_id' => $message->audio->id,
                'is_voice' => $message->audio->voice,
                'sender_message_id' => $sender->id,
            ]);
        }

        return $sender_audio_message;
    }
}
