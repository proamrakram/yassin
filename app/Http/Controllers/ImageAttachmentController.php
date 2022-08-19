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
    public function store(StoreImageAttachmentRequest $request, $sender_image_message, $image)
    {
        $sender_images_attachments = ImageAttachment::where('image_id', $image->id)->first();

        if (!$sender_images_attachments) {

            $sender_images_attachments = ImageAttachment::create([
                'image_url' => $image->url,
                'is_url_expired' => true,
                'mime_type' => $image->mime_type,
                'hash_sha256' => $image->sha256,
                'file_size' => $image->file_size,
                'image_id' => $image->id,
                'messaging_product' => $image->messaging_product,
                'sender_image_message_id' => $sender_image_message->id,
            ]);

            return $sender_images_attachments;
        }

        return  $sender_images_attachments;
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
