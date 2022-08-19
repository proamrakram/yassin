<?php

namespace App\Http\Controllers;

use App\Models\SenderImageAttachment;
use App\Http\Requests\StoreSenderImageAttachmentRequest;
use App\Http\Requests\UpdateSenderImageAttachmentRequest;

class SenderImageAttachmentController extends Controller
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
     * @param  \App\Http\Requests\StoreSenderImagesAttachementsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSenderImageAttachmentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SenderImagesAttachements  $senderImagesAttachements
     * @return \Illuminate\Http\Response
     */
    public function show(SenderImageAttachment $senderImagesAttachements)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SenderImagesAttachements  $senderImagesAttachements
     * @return \Illuminate\Http\Response
     */
    public function edit(SenderImageAttachment $senderImagesAttachements)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSenderImagesAttachementsRequest  $request
     * @param  \App\Models\SenderImagesAttachements  $senderImagesAttachements
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSenderImageAttachmentRequest $request, SenderImageAttachment $senderImagesAttachements)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SenderImagesAttachements  $senderImagesAttachements
     * @return \Illuminate\Http\Response
     */
    public function destroy(SenderImageAttachment $senderImagesAttachements)
    {
        //
    }
}
