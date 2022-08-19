<?php

namespace App\Http\Controllers;

use App\Models\SenderAudioMessages;
use App\Http\Requests\StoreSenderAudioMessagesRequest;
use App\Http\Requests\UpdateSenderAudioMessagesRequest;

class SenderAudioMessagesController extends Controller
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
     * @param  \App\Http\Requests\StoreSenderAudioMessagesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSenderAudioMessagesRequest $request,  $sender, $message)
    {
        $sender_audio_message = SenderAudioMessages::where('audio_id', $message->audio->id)->first();

        if (!$sender_audio_message) {
            return SenderAudioMessages::create([
                'from_phone_number' => $message->from,
                'message_timestamp' => date('Y/m/d H:i:s', (int)$message->timestamp),
                'message_id' => $message->id,
                'message_type' => $message->type,
                'mime_type' => $message->audio->mime_type,
                'hash_sha_256' => $message->audio->sha256,
                'audio_id' => $message->audio->id,
                'is_voice' => $message->audio->is_voice,
                'sender_message_id' => $sender->id,
            ]);
        }

        return $sender_audio_message;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SenderAudioMessages  $senderAudioMessages
     * @return \Illuminate\Http\Response
     */
    public function show(SenderAudioMessages $senderAudioMessages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SenderAudioMessages  $senderAudioMessages
     * @return \Illuminate\Http\Response
     */
    public function edit(SenderAudioMessages $senderAudioMessages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSenderAudioMessagesRequest  $request
     * @param  \App\Models\SenderAudioMessages  $senderAudioMessages
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSenderAudioMessagesRequest $request, SenderAudioMessages $senderAudioMessages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SenderAudioMessages  $senderAudioMessages
     * @return \Illuminate\Http\Response
     */
    public function destroy(SenderAudioMessages $senderAudioMessages)
    {
        //
    }
}
