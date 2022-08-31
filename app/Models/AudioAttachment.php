<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AudioAttachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'audio_url',
        'is_url_expired',
        'mime_type',
        'hash_sha256',
        'file_size',
        'audio_id',
        'messaging_product',
        'audio_message_id',
    ];

    protected $casts = [
        'is_url_expired' => 'boolean',
    ];

    public function senderMessage()
    {
        return $this->belongsTo(Audio::class, 'audio_message_id', 'id');
    }
}
