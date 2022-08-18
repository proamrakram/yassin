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
    public function store(StoreSenderVideoMessagesRequest $request)
    {
        //
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
