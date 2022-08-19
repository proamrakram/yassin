<?php

namespace App\Http\Controllers;

use App\Models\SenderLocationMessages;
use App\Http\Requests\StoreSenderLocationMessagesRequest;
use App\Http\Requests\UpdateSenderLocationMessagesRequest;

class SenderLocationMessagesController extends Controller
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
     * @param  \App\Http\Requests\StoreSenderLocationMessagesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSenderLocationMessagesRequest $request, $sender, $message)
    {
        $sender_location_message = SenderLocationMessages::where('message_id', $message->id)->first();

        if (!$sender_location_message) {
            return SenderLocationMessages::create([
                'message_id' => $message->id,
                'message_type' => $message->type,
                'from_phone_number' => $message->from,
                'message_timestamp' => date('Y/m/d H:i:s', (int)$message->timestamp),
                'latitude' => $message->location->latitude,
                'longitude' => $message->location->longitude,
                'name' =>  property_exists($message->location, 'name') ? $message->location->name : null,
                'url' => property_exists($message->location, 'url') ? $message->location->url : null,
                'sender_message_id' => $sender->id,
            ]);
        }

        return $sender_location_message;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SenderLocationMessages  $senderLocationMessages
     * @return \Illuminate\Http\Response
     */
    public function show(SenderLocationMessages $senderLocationMessages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SenderLocationMessages  $senderLocationMessages
     * @return \Illuminate\Http\Response
     */
    public function edit(SenderLocationMessages $senderLocationMessages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSenderLocationMessagesRequest  $request
     * @param  \App\Models\SenderLocationMessages  $senderLocationMessages
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSenderLocationMessagesRequest $request, SenderLocationMessages $senderLocationMessages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SenderLocationMessages  $senderLocationMessages
     * @return \Illuminate\Http\Response
     */
    public function destroy(SenderLocationMessages $senderLocationMessages)
    {
        //
    }
}
