<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;

class DocumentController extends Controller
{
    public function store(StoreDocumentRequest $request, $sender, $message)
    {

        $sender_docuement_message = Document::where('caption', $message->document->caption)->first();

        if (!$sender_docuement_message) {

            return Document::create([
                'from_phone_number' => $message->from,
                'message_timestamp' => date('Y/m/d H:i:s', (int)$message->timestamp),
                'message_id' => $message->id,
                'message_type' => $message->type,
                'caption' => $message->document->caption,
                'file_name' => $message->document->filename,
                'mime_type' => $message->document->mime_type,
                'hash_sha_256' => $message->document->sha256,
                'document_id' => $message->document->id,
                'sender_message_id' => $sender->id,
            ]);
        }

        return $sender_docuement_message;
    }
}
