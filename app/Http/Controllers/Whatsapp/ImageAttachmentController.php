<?php

namespace App\Http\Controllers\Whatsapp;

use App\Http\Controllers\Controller;
use App\Models\ImageAttachment;
use App\Http\Requests\StoreImageAttachmentRequest;
use App\Http\Requests\UpdateImageAttachmentRequest;

class ImageAttachmentController extends Controller
{
    public function store(StoreImageAttachmentRequest $request, $sender_image_message, $image)
    {
        $sender_images_attachments = ImageAttachment::where('image_id', $image->id)->first();

        if (!$sender_images_attachments) {

            $sender_images_attachments = ImageAttachment::create([
                'wa_image_url' => $image->url,
                'image_url' => $image->path,
                'is_url_expired' => true,
                'mime_type' => $image->mime_type,
                'hash_sha256' => $image->sha256,
                'file_size' => $image->file_size,
                'image_id' => $image->id,
                'messaging_product' => $image->messaging_product,
                'image_message_id' => $sender_image_message->id,
            ]);

            return $sender_images_attachments;
        }

        return  $sender_images_attachments;
    }
}
