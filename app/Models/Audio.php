<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_phone_number',
        'message_timestamp',
        'message_id',
        'message_type',
        'mime_type',
        'hash_sha_256',
        'audio_id',
        'is_voice',
        'sender_id',
    ];

    public function senderMessage()
    {
        return $this->belongsTo(WhatsAppSender::class, 'sender_id', 'id');
    }

    public function audio()
    {
        return $this->hasOne(AudioAttachment::class, 'audio_message_id', 'id');
    }
}
