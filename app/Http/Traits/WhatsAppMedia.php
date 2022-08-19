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
        #After request this call you will get a url file to download it in the second section
        $url = 'https://graph.facebook.com/v14.0/' . $sender_image_message->image_id;

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('WHATS_APP_TOKEN'),
        ])->get($url);

        $image_content = json_decode($response->body());
        Storage::disk('local')->put('image.txt', print_r($image_content, true));

        #In this section you will download the file

        $file = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('WHATS_APP_TOKEN'),
        ])->get($image_content->url);

        $file_name = $image_content->id . '.' . $image_content->file_extension;

        Storage::disk('public')->put($file_name, $file->body());

        $image_attachment_controller = new ImageAttachmentController();

        $request = new StoreImageAttachmentRequest();

        return $image_attachment_controller->store($request, $sender_image_message, $image_content);
    }
}
