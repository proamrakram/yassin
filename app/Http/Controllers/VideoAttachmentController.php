<?php

namespace App\Http\Controllers;

use App\Models\VideoAttachment;
use App\Http\Requests\StoreVideoAttachmentRequest;
use App\Http\Requests\UpdateVideoAttachmentRequest;

class VideoAttachmentController extends Controller
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
     * @param  \App\Http\Requests\StoreVideoAttachmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVideoAttachmentRequest $request, $sender_video_message, $video)
    {
        $sender_video_attachments = VideoAttachment::where('video_id', $video->id)->first();
        if (!$sender_video_attachments) {
            $sender_video_attachments = VideoAttachment::create([
                'video_url' => $video->url,
                'is_url_expired' => true,
                'mime_type' => $video->mime_type,
                'hash_sha256' => $video->sha256,
                'file_size' => $video->file_size,
                'video_id' => $video->id,
                'messaging_product' => $video->messaging_product,
                'sender_video_message_id' => $sender_video_message->id,
            ]);
            return $sender_video_attachments;
        }
        return $sender_video_attachments;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VideoAttachment  $videoAttachment
     * @return \Illuminate\Http\Response
     */
    public function show(VideoAttachment $videoAttachment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VideoAttachment  $videoAttachment
     * @return \Illuminate\Http\Response
     */
    public function edit(VideoAttachment $videoAttachment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVideoAttachmentRequest  $request
     * @param  \App\Models\VideoAttachment  $videoAttachment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVideoAttachmentRequest $request, VideoAttachment $videoAttachment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VideoAttachment  $videoAttachment
     * @return \Illuminate\Http\Response
     */
    public function destroy(VideoAttachment $videoAttachment)
    {
        //
    }
}
