<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SenderVideoMessages extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_phone_number',
        'message_timestamp',
        'message_id',
        'message_type',
        'mime_type',
        'hash_sha_256',
        'video_id',
        'sender_message_id',
    ];

    public function senderMessage()
    {
        return $this->belongsTo(WhatsAppSender::class, 'sender_message_id', 'id');
    }

    public function video()
    {
        return $this->hasOne(VideoAttachment::class, 'sender_video_message_id', 'id');
    }

}
