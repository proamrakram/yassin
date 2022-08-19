<?php

namespace App\Http\Controllers;

use App\Models\SenderStickerMessages;
use App\Http\Requests\StoreSenderStickerMessagesRequest;
use App\Http\Requests\UpdateSenderStickerMessagesRequest;

class SenderStickerMessagesController extends Controller
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
     * @param  \App\Http\Requests\StoreSenderStickerMessagesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSenderStickerMessagesRequest $request, $sender, $message)
    {
        $sender_sticker_message = SenderStickerMessages::where('sticker_id', $message->sticker->id)->first();

        if (!$sender_sticker_message) {
            return SenderStickerMessages::create([
                'from_phone_number' => $message->from,
                'message_timestamp' => date('Y/m/d H:i:s', (int)$message->timestamp),
                'message_id' => $message->id,
                'message_type' => $message->type,
                'mime_type' => $message->sticker->mime_type,
                'hash_sha_256' => $message->sticker->sha256,
                'sticker_id' => $message->sticker->id,
                'sender_message_id' => $sender->id,
            ]);
        }

        return $sender_sticker_message;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SenderStickerMessages  $senderStickerMessages
     * @return \Illuminate\Http\Response
     */
    public function show(SenderStickerMessages $senderStickerMessages)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SenderStickerMessages  $senderStickerMessages
     * @return \Illuminate\Http\Response
     */
    public function edit(SenderStickerMessages $senderStickerMessages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSenderStickerMessagesRequest  $request
     * @param  \App\Models\SenderStickerMessages  $senderStickerMessages
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSenderStickerMessagesRequest $request, SenderStickerMessages $senderStickerMessages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SenderStickerMessages  $senderStickerMessages
     * @return \Illuminate\Http\Response
     */
    public function destroy(SenderStickerMessages $senderStickerMessages)
    {
        //
    }
}
