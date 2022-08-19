<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SenderImageMessages extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_phone_number',
        'message_timestamp',
        'message_id',
        'message_type',
        'mime_type',
        'hash_sha_256',
        'image_id',
        'sender_message_id',
    ];

    public function senderMessage()
    {
        return $this->belongsTo(WhatsAppSender::class, 'sender_message_id', 'id');
    }

    public function images()
    {
        return $this->hasMany(SenderImageAttachment::class, 'sender_image_message_id', 'id');
    }
}
