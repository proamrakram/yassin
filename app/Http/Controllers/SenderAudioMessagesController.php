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
    public function store(StoreSenderAudioMessagesRequest $request)
    {
        //
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
