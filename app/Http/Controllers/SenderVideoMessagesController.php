<?php

namespace App\Http\Controllers;

use App\Models\SenderVideoMessages;
use App\Http\Requests\StoreSenderVideoMessagesRequest;
use App\Http\Requests\UpdateSenderVideoMessagesRequest;

class SenderVideoMessagesController extends Controller
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
     * @param  \App\Http\Requests\StoreSenderVideoMessagesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSenderVideoMessagesRequest $request,$sender, $message)
    {
        $sender_video_message = SenderVideoMessages::where('video_id', $message->id)->first();
        if (!$sender_video_message) {
            return SenderVideoMessages::create([
                'from_phone_number' => $message->from,
                'message_timestamp' => date('Y/m/d H:i:s', (int)$message->timestamp),
                'message_id' => $message->id,
                'message_type' => $message->type,
                'mime_type' => $message->video->mime_type,
                'hash_sha_256' => $message->video->sha256,
                'video_id' => $message->video->id,
                'sender_message_id' => $sender->id,
            ]);
        }

        return $sender_video_message;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SenderVideoMessages  $senderVideoMessages
     * @return \Illuminate\Http\Response
     */
    public function show(SenderVideoMessages $senderVideoMessages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SenderVideoMessages  $senderVideoMessages
     * @return \Illuminate\Http\Response
     */
    public function edit(SenderVideoMessages $senderVideoMessages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSenderVideoMessagesRequest  $request
     * @param  \App\Models\SenderVideoMessages  $senderVideoMessages
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSenderVideoMessagesRequest $request, SenderVideoMessages $senderVideoMessages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SenderVideoMessages  $senderVideoMessages
     * @return \Illuminate\Http\Response
     */
    public function destroy(SenderVideoMessages $senderVideoMessages)
    {
        //
    }
}
