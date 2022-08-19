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

        Storage::disk('local')->put('image.txt', print_r($json, true));

        $image_attachment_controller = new ImageAttachmentController();

        $request = new StoreImageAttachmentRequest();

        #Save image in disk

        $image_stream = fopen($json->url, 'r');

        $image_name = $json->id . '.' .'jpg';

        Storage::disk('local')->put($image_name, $image_stream);

        return $image_attachment_controller->store($request, $sender_image_message, $json);
    }
}
