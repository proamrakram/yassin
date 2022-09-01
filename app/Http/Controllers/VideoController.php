<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Http\Requests\StoreVideoRequest;
use App\Http\Requests\UpdateVideoRequest;

class VideoController extends Controller
{
    public function store(StoreVideoRequest $request, $sender, $message)
    {
        $sender_video_message = Video::where('video_id', $message->id)->first();
        if (!$sender_video_message) {
            return Video::create([
                'from_phone_number' => $message->from,
                'message_timestamp' => date('Y/m/d H:i:s', (int)$message->timestamp),
                'message_id' => $message->id,
                'message_type' => $message->type,
                'mime_type' => $message->video->mime_type,
                'hash_sha_256' => $message->video->sha256,
                'video_id' => $message->video->id,
                'sender_id' => $sender->id,
            ]);
        }

        return $sender_video_message;
    }
}
