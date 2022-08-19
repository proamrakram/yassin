<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoAttachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'video_url',
        'is_url_expired',
        'mime_type',
        'hash_sha256',
        'file_size',
        'video_id',
        'messaging_product',
        'sender_video_message_id',
    ];

    protected $casts = [
        'is_url_expired' => 'boolean',
    ];

    public function senderVideoMessage()
    {
        return $this->belongsTo(SenderVideoMessages::class, 'sender_video_message_id', 'id');
    }

}
