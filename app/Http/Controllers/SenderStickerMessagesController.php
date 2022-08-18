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
    public function store(StoreSenderStickerMessagesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SenderStickerMessages  $senderStickerMessages
     * @return \Illuminate\Http\Response
     */
    public function show(SenderStickerMessages $senderStickerMessages)
    {
        //
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
