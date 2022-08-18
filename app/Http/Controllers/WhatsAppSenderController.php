<?php

namespace App\Http\Controllers;

use App\Models\WhatsAppSender;
use App\Http\Requests\StoreWhatsAppSenderRequest;
use App\Http\Requests\UpdateWhatsAppSenderRequest;

class WhatsAppSenderController extends Controller
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
     * @param  \App\Http\Requests\StoreWhatsAppSenderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWhatsAppSenderRequest $request, $bot_id, $contact)
    {
        $whats_app_sender = WhatsAppSender::create([
            'bot_id' => $bot_id,
            'name' => $contact->profile->name,
            'phone_number' => $contact->wa_id,
        ]);

        return $whats_app_sender;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WhatsAppSender  $whatsAppSender
     * @return \Illuminate\Http\Response
     */
    public function show(WhatsAppSender $whatsAppSender)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WhatsAppSender  $whatsAppSender
     * @return \Illuminate\Http\Response
     */
    public function edit(WhatsAppSender $whatsAppSender)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWhatsAppSenderRequest  $request
     * @param  \App\Models\WhatsAppSender  $whatsAppSender
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWhatsAppSenderRequest $request, WhatsAppSender $whatsAppSender)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WhatsAppSender  $whatsAppSender
     * @return \Illuminate\Http\Response
     */
    public function destroy(WhatsAppSender $whatsAppSender)
    {
        //
    }
}
