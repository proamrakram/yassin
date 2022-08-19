<?php

namespace App\Http\Controllers;

use App\Models\SenderDocumentMessages;
use App\Http\Requests\StoreSenderDocumentMessagesRequest;
use App\Http\Requests\UpdateSenderDocumentMessagesRequest;

class SenderDocumentMessagesController extends Controller
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
     * @param  \App\Http\Requests\StoreSenderDocumentMessagesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSenderDocumentMessagesRequest $request, $sender, $message)
    {

        $sender_docuement_message = SenderDocumentMessages::where('caption', $message->document->caption)->first();

        if (!$sender_docuement_message) {

            return SenderDocumentMessages::create([
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SenderDocumentMessages  $senderDocumentMessages
     * @return \Illuminate\Http\Response
     */
    public function show(SenderDocumentMessages $senderDocumentMessages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SenderDocumentMessages  $senderDocumentMessages
     * @return \Illuminate\Http\Response
     */
    public function edit(SenderDocumentMessages $senderDocumentMessages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSenderDocumentMessagesRequest  $request
     * @param  \App\Models\SenderDocumentMessages  $senderDocumentMessages
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSenderDocumentMessagesRequest $request, SenderDocumentMessages $senderDocumentMessages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SenderDocumentMessages  $senderDocumentMessages
     * @return \Illuminate\Http\Response
     */
    public function destroy(SenderDocumentMessages $senderDocumentMessages)
    {
        //
    }
}
