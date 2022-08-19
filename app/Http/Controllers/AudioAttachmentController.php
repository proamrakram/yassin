<?php

namespace App\Http\Controllers;

use App\Models\AudioAttachment;
use App\Http\Requests\StoreAudioAttachmentRequest;
use App\Http\Requests\UpdateAudioAttachmentRequest;

class AudioAttachmentController extends Controller
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
     * @param  \App\Http\Requests\StoreAudioAttachmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAudioAttachmentRequest $request, $sender_audio_message, $audio)
    {
        $sender_audio_attachments = AudioAttachment::where('audio_id', $audio->id)->first();

        if (!$sender_audio_attachments) {
            $sender_audio_attachments = AudioAttachment::create([
                'audio_url' => $audio->url,
                'is_url_expired' => true,
                'mime_type' => $audio->mime_type,
                'hash_sha256' => $audio->sha256,
                'file_size' => $audio->file_size,
                'audio_id' => $audio->id,
                'messaging_product' => $audio->messaging_product,
                'sender_audio_message_id' => $sender_audio_message->id,
            ]);
            return $sender_audio_attachments;
        }
        return $sender_audio_attachments;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AudioAttachment  $audioAttachment
     * @return \Illuminate\Http\Response
     */
    public function show(AudioAttachment $audioAttachment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AudioAttachment  $audioAttachment
     * @return \Illuminate\Http\Response
     */
    public function edit(AudioAttachment $audioAttachment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAudioAttachmentRequest  $request
     * @param  \App\Models\AudioAttachment  $audioAttachment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAudioAttachmentRequest $request, AudioAttachment $audioAttachment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AudioAttachment  $audioAttachment
     * @return \Illuminate\Http\Response
     */
    public function destroy(AudioAttachment $audioAttachment)
    {
        //
    }
}
