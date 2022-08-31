<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\UpdateImageRequest;

class ImageController extends Controller
{
    public function store(StoreImageRequest $request, $sender, $message)
    {
        $sender_image_message = Image::where('image_id', $message->image->id)->first();

        if (!$sender_image_message) {
            return Image::create([
                'from_phone_number' => $message->from,
                'message_timestamp' => date('Y/m/d H:i:s', (int)$message->timestamp),
                'message_id' => $message->id,
                'message_type' => $message->type,
                'mime_type' => $message->image->mime_type,
                'hash_sha_256' => $message->image->sha256,
                'image_id' => $message->image->id,
                'sender_message_id' => $sender->id,
            ]);
        }

        return $sender_image_message;
    }
}
