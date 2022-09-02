<?php

namespace App\Http\Controllers\Whatsapp;

use App\Http\Controllers\Controller;
use App\Models\VideoAttachment;
use App\Http\Requests\StoreVideoAttachmentRequest;

class VideoAttachmentController extends Controller
{
    public function store(StoreVideoAttachmentRequest $request, $sender_video_message, $video)
    {
        $sender_video_attachments = VideoAttachment::where('video_id', $video->id)->first();
        if (!$sender_video_attachments) {
            $sender_video_attachments = VideoAttachment::create([
                'video_url' => $video->url,
                'is_url_expired' => true,
                'mime_type' => $video->mime_type,
                'hash_sha256' => $video->sha256,
                'file_size' => $video->file_size,
                'video_id' => $video->id,
                'messaging_product' => $video->messaging_product,
                'video_message_id' => $sender_video_message->id,
            ]);
            return $sender_video_attachments;
        }
        return $sender_video_attachments;
    }

}
