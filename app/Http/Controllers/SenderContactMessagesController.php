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
    public function store(StoreSenderContactMessagesRequest $request)
    {
        //
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
