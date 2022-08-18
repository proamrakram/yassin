<?php

namespace App\Http\Controllers;

use App\Models\SenderDocumentMessages;
use App\Http\Requests\StoreSenderDocumentMessagesRequest;
use App\Http\Requests\UpdateSenderDocumentMessagesRequest;

class SenderDocumentMessagesController extends Controller
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
     * @param  \App\Http\Requests\StoreSenderDocumentMessagesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSenderDocumentMessagesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SenderDocumentMessages  $senderDocumentMessages
     * @return \Illuminate\Http\Response
     */
    public function show(SenderDocumentMessages $senderDocumentMessages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SenderDocumentMessages  $senderDocumentMessages
     * @return \Illuminate\Http\Response
     */
    public function edit(SenderDocumentMessages $senderDocumentMessages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSenderDocumentMessagesRequest  $request
     * @param  \App\Models\SenderDocumentMessages  $senderDocumentMessages
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSenderDocumentMessagesRequest $request, SenderDocumentMessages $senderDocumentMessages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SenderDocumentMessages  $senderDocumentMessages
     * @return \Illuminate\Http\Response
     */
    public function destroy(SenderDocumentMessages $senderDocumentMessages)
    {
        //
    }
}
