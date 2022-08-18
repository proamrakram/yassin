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
    public function store(StoreSenderLocationMessagesRequest $request)
    {
        //
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
