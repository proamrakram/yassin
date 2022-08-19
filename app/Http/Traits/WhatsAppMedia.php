<?php


namespace App\Http\Traits;

use App\Http\Controllers\ImageAttachmentController;
use App\Http\Requests\StoreImageAttachmentRequest;
use App\Models\ImageAttachment;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

trait  WhatsAppMedia
{


    public function saveImage($sender_image_message)
    {
        $url = 'https://graph.facebook.com/v14.0/' . $sender_image_message->image_id;

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('WHATS_APP_TOKEN'),
        ])->get($url);

        $json = json_decode($response->body());

        $image_attachment_controller = new ImageAttachmentController();

        $request = new StoreImageAttachmentRequest();

        $image_url_handle = fopen($json->url, 'r');

        return $image_attachment_controller->store($request, $sender_image_message, $json);
    }
}


