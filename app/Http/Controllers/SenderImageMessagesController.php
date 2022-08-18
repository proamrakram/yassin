<?php

namespace App\Http\Controllers;

use App\Models\SenderImageMessages;
use App\Http\Requests\StoreSenderImageMessagesRequest;
use App\Http\Requests\UpdateSenderImageMessagesRequest;

class SenderImageMessagesController extends Controller
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
     * @param  \App\Http\Requests\StoreSenderImageMessagesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSenderImageMessagesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SenderImageMessages  $senderImageMessages
     * @return \Illuminate\Http\Response
     */
    public function show(SenderImageMessages $senderImageMessages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SenderImageMessages  $senderImageMessages
     * @return \Illuminate\Http\Response
     */
    public function edit(SenderImageMessages $senderImageMessages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSenderImageMessagesRequest  $request
     * @param  \App\Models\SenderImageMessages  $senderImageMessages
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSenderImageMessagesRequest $request, SenderImageMessages $senderImageMessages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SenderImageMessages  $senderImageMessages
     * @return \Illuminate\Http\Response
     */
    public function destroy(SenderImageMessages $senderImageMessages)
    {
        //
    }
}
