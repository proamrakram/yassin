<?php

namespace App\Http\Controllers\Whatsapp;

use App\Http\Controllers\Controller;
use App\Models\DocumentAttachment;
use App\Http\Requests\StoreDocumentAttachmentRequest;

class DocumentAttachmentController extends Controller
{
    public function store(StoreDocumentAttachmentRequest $request, $sender_document_message, $document)
    {
        $sender_document_attachments = DocumentAttachment::where('document_id', $document->id)->first();

        if (!$sender_document_attachments) {

            $sender_document_attachments = DocumentAttachment::create([
                'document_url' => $document->url,
                'is_url_expired' => true,
                'mime_type' => $document->mime_type,
                'hash_sha256' => $document->sha256,
                'file_size' => $document->file_size,
                'document_id' => $document->id,
                'messaging_product' => $document->messaging_product,
                'sender_document_message_id' => $sender_document_message->id,
            ]);
            return $sender_document_attachments;
        }
        return $sender_document_attachments;
    }
}
