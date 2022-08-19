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

    public function getFileExtension($mime_type, $type)
    {
        foreach (config('supportedmediatypes.' . $type) as $key => $value) {
            if ($key == $mime_type) {
                return $value['extension'];
            }
        }
    }

    public function downloadFileToStorage($url, $type)
    {
        $folder = $type . 's';

        if (!Storage::disk('public')->exists($folder)) {
            Storage::disk('public')->makeDirectory($folder);
        }

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('WHATS_APP_TOKEN'),
        ])->get($url);

        $file_content = json_decode($response->body());

        $file_extension = $this->getFileExtension($file_content->mime_type, $type);

        $file_name = $file_content->id . '.' . $file_extension;

        $file_path = $folder . '/' . $file_name;

        $file = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('WHATS_APP_TOKEN'),
        ])->get($file_content->url);

        if (!Storage::disk('public')->exists($file_path)) {
            Storage::disk('public')->put($file_path, $file->body());
        }

        return $file_content;
    }


    public function saveFile($sender_file, $url, $type)
    {
        $file_content = $this->downloadFileToStorage($url, $type);

        if ($type == 'document') {
            $document_attachment_controller = new DocumentAttachmentController();

            $request = new StoreDocumentAttachmentRequest();

            return $document_attachment_controller->store($request, $sender_file, $file_content);
        }

        if ($type == 'image') {

            $image_attachment_controller = new ImageAttachmentController();

            $request = new StoreImageAttachmentRequest();

            return $image_attachment_controller->store($request, $sender_file, $file_content);
        }
    }
}
