<?php

namespace App\Http\Controllers;

use App\Models\DocumentAttachment;
use App\Http\Requests\StoreDocumentAttachmentRequest;
use App\Http\Requests\UpdateDocumentAttachmentRequest;

class DocumentAttachmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDocumentAttachmentRequest  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DocumentAttachment  $documentAttachment
     * @return \Illuminate\Http\Response
     */
    public function show(DocumentAttachment $documentAttachment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DocumentAttachment  $documentAttachment
     * @return \Illuminate\Http\Response
     */
    public function edit(DocumentAttachment $documentAttachment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDocumentAttachmentRequest  $request
     * @param  \App\Models\DocumentAttachment  $documentAttachment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocumentAttachmentRequest $request, DocumentAttachment $documentAttachment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DocumentAttachment  $documentAttachment
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocumentAttachment $documentAttachment)
    {
        //
    }
}
