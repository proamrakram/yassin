<?php

namespace App\Http\Controllers;

use App\Models\SenderContactMessages;
use App\Http\Requests\StoreSenderContactMessagesRequest;
use App\Http\Requests\UpdateSenderContactMessagesRequest;

class SenderContactMessagesController extends Controller
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
     * @param  \App\Http\Requests\StoreSenderContactMessagesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSenderContactMessagesRequest $request,  $sender, $message)
    {
        $sender_contact_message = SenderContactMessages::where('message_id', $message->id)->first();

        if (!$sender_contact_message) {
            return SenderContactMessages::create([
                'from_phone_number' => $message->from,
                'message_timestamp' => date('Y/m/d H:i:s', (int)$message->timestamp),
                'message_id' => $message->id,
                'message_type' => $message->type,
                'first_name' => property_exists($message->contacts[0]->name, 'first_name') ?  $message->contacts[0]->name->first_name : null,
                'last_name' =>  property_exists($message->contacts[0]->name, 'last_name') ? $message->contacts[0]->name->last_name : null,
                'full_name' =>  property_exists($message->contacts[0]->name, 'formatted_name') ? $message->contacts[0]->name->formatted_name : null,
                'phone_number' => $message->contacts[0]->phones[0]->phone,
                'wa_contact_id' => $message->contacts[0]->phones[0]->wa_id,
                'contact_type' => $message->contacts[0]->phones[0]->type,
                'sender_message_id' => $sender->id,
            ]);
        }

        return $sender_contact_message;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SenderContactMessages  $senderContactMessages
     * @return \Illuminate\Http\Response
     */
    public function show(SenderContactMessages $senderContactMessages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SenderContactMessages  $senderContactMessages
     * @return \Illuminate\Http\Response
     */
    public function edit(SenderContactMessages $senderContactMessages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSenderContactMessagesRequest  $request
     * @param  \App\Models\SenderContactMessages  $senderContactMessages
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSenderContactMessagesRequest $request, SenderContactMessages $senderContactMessages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SenderContactMessages  $senderContactMessages
     * @return \Illuminate\Http\Response
     */
    public function destroy(SenderContactMessages $senderContactMessages)
    {
        //
    }
}
