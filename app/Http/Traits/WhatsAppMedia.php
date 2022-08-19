<?php


namespace App\Http\Traits;

use App\Http\Controllers\DocumentAttachmentController;
use App\Http\Controllers\ImageAttachmentController;
use App\Http\Requests\StoreDocumentAttachmentRequest;
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

    public function getDocumentExtension($mime_type)
    {
        foreach (config('supportedmediatypes.document') as $key => $value) {
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

    public function downloadDocumentFile($url)
    {
        #check if folder exist and created it
        $folder = 'documents';

        if (!Storage::disk('public')->exists($folder)) {
            Storage::disk('public')->makeDirectory($folder);
        }

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('WHATS_APP_TOKEN'),
        ])->get($url);

        $document_content = json_decode($response->body());

        $file_extension = $this->getDocumentExtension($document_content->mime_type);

        $file_name = $document_content->id . '.' . $file_extension;
        $file_path = $folder . '/' . $file_name;

        $file = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('WHATS_APP_TOKEN'),
        ])->get($document_content->url);

        if (!Storage::disk('public')->exists($file_path)) {
            Storage::disk('public')->put($file_path, $file->body());
        }

        return $document_content;
    }


    public function saveImage($sender_image_message)
    {
        $url = 'https://graph.facebook.com/v14.0/' . $sender_image_message->image_id;

        $image_content = $this->downloadImageFile($url);

        $image_attachment_controller = new ImageAttachmentController();

        $request = new StoreImageAttachmentRequest();

        return $image_attachment_controller->store($request, $sender_image_message, $image_content);
    }

    public function saveDocument($sender_document_message)
    {
        $url = 'https://graph.facebook.com/v14.0/' . $sender_document_message->document_id;

        $document_content = $this->downloadDocumentFile($url);

        Storage::disk('local')->put('document_content.txt', print_r($document_content, true));

        $document_attachment_controller = new DocumentAttachmentController();

        $request = new StoreDocumentAttachmentRequest();

        return $document_attachment_controller->store($request, $sender_document_message, $document_content);
    }























    public function saveAudio($sender_audio_message)
    {
        $url = 'https://graph.facebook.com/v14.0/' . $sender_audio_message->audio_id;
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('WHATS_APP_TOKEN'),
        ])->get($url);

        $audio_content = json_decode($response->body());

        $file_extension = $this->getFileExtension($audio_content->mime_type);

        $file_name = $audio_content->id . '.' . $file_extension;

        $file_path = 'audios/' . $file_name;

        $file = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('WHATS_APP_TOKEN'),
        ])->get($audio_content->url);

        if (!Storage::disk('public')->exists($file_path)) {
            Storage::disk('public')->put($file_path, $file->body());
        }

        return $audio_content;
    }
}
