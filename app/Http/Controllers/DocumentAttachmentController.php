<?php

namespace App\Http\Controllers;

use App\Models\DocumentAttachment;
use App\Http\Requests\StoreDocumentAttachmentRequest;
use App\Http\Requests\UpdateDocumentAttachmentRequest;

class DocumentAttachmentController extends Controller
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
     * @param  \App\Http\Requests\StoreDocumentAttachmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocumentAttachmentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DocumentAttachment  $documentAttachment
     * @return \Illuminate\Http\Response
     */
    public function show(DocumentAttachment $documentAttachment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DocumentAttachment  $documentAttachment
     * @return \Illuminate\Http\Response
     */
    public function edit(DocumentAttachment $documentAttachment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDocumentAttachmentRequest  $request
     * @param  \App\Models\DocumentAttachment  $documentAttachment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDocumentAttachmentRequest $request, DocumentAttachment $documentAttachment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DocumentAttachment  $documentAttachment
     * @return \Illuminate\Http\Response
     */
    public function destroy(DocumentAttachment $documentAttachment)
    {
        //
    }
}
