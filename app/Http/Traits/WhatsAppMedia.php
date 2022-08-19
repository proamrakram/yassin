<?php


namespace App\Http\Traits;

use App\Http\Controllers\ImageAttachmentController;
use App\Http\Requests\StoreImageAttachmentRequest;
use App\Models\ImageAttachment;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

trait  WhatsAppMedia
{

    public function getFileExtension($mime_type)
    {
        foreach (config('supportedmediatypes.image') as $key => $value) {
            if ($key == $mime_type) {
                return $value['extension'];
            }
        }
    }

    public function downloadImageFile($url)
    {
        #check if folder exist and created it
        $folder = 'images';

        if (!Storage::disk('public')->exists($folder)) {
            Storage::disk('public')->makeDirectory($folder);
        }

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('WHATS_APP_TOKEN'),
        ])->get($url);

        $image_content = json_decode($response->body());
        $file_extension = $this->getFileExtension($image_content->mime_type);
        $file_name = $image_content->id . '.' . $file_extension;
        $file_path = $folder . '/' . $file_name;

        $file = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('WHATS_APP_TOKEN'),
        ])->get($image_content->url);

        if (!Storage::disk('public')->exists($file_path)) {
            Storage::disk('public')->put($file_path, $file->body());
        }

        return $image_content;
    }

    public function saveImage($sender_image_message)
    {
        $url = 'https://graph.facebook.com/v14.0/' . $sender_image_message->image_id;

        $image_content = $this->downloadImageFile($url);

        $image_attachment_controller = new ImageAttachmentController();

        $request = new StoreImageAttachmentRequest();

        return $image_attachment_controller->store($request, $sender_image_message, $image_content);
    }
}
