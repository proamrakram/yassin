<?php

namespace App\Http\Controllers;

use App\Models\SenderTextMessages;
use App\Http\Requests\StoreSenderTextMessagesRequest;
use App\Http\Requests\UpdateSenderTextMessagesRequest;

class SenderTextMessagesController extends Controller
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
     * @param  \App\Http\Requests\StoreSenderTextMessagesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSenderTextMessagesRequest $request, $sender, $message)
    {
        SenderTextMessages::create([
            'body' => $message->text->body,
            'message_id' => $message->id,
            'message_type' => $message->type,
            'from_phone_number' => $message->from,
            'message_timestamp' =>  date('Y/m/d H:i:s', (int)$message->timestamp),
            'sender_message_id' => $sender->id,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SenderTextMessages  $senderTextMessages
     * @return \Illuminate\Http\Response
     */
    public function show(SenderTextMessages $senderTextMessages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SenderTextMessages  $senderTextMessages
     * @return \Illuminate\Http\Response
     */
    public function edit(SenderTextMessages $senderTextMessages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSenderTextMessagesRequest  $request
     * @param  \App\Models\SenderTextMessages  $senderTextMessages
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSenderTextMessagesRequest $request, SenderTextMessages $senderTextMessages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SenderTextMessages  $senderTextMessages
     * @return \Illuminate\Http\Response
     */
    public function destroy(SenderTextMessages $senderTextMessages)
    {
        //
    }
}
