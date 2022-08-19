<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SenderImageAttachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_url',
        'mime_type',
        'hash_sha256',
        'file_size',
        'image_id',
        'messaging_product',
        'sender_message_id',
        'sender_image_message_id',
    ];

    public function senderImageMessage()
    {
        return $this->belongsTo(SenderImageMessages::class, 'sender_image_message_id', 'id');
    }

}
