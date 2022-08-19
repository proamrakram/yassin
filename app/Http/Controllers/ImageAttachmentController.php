<?php

namespace App\Http\Controllers;

use App\Models\ImageAttachment;
use App\Http\Requests\StoreImageAttachmentRequest;
use App\Http\Requests\UpdateImageAttachmentRequest;

class ImageAttachmentController extends Controller
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
     * @param  \App\Http\Requests\StoreImageAttachmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreImageAttachmentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ImageAttachment  $imageAttachment
     * @return \Illuminate\Http\Response
     */
    public function show(ImageAttachment $imageAttachment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ImageAttachment  $imageAttachment
     * @return \Illuminate\Http\Response
     */
    public function edit(ImageAttachment $imageAttachment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateImageAttachmentRequest  $request
     * @param  \App\Models\ImageAttachment  $imageAttachment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateImageAttachmentRequest $request, ImageAttachment $imageAttachment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ImageAttachment  $imageAttachment
     * @return \Illuminate\Http\Response
     */
    public function destroy(ImageAttachment $imageAttachment)
    {
        //
    }
}
