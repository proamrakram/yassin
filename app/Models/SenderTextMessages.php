<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SenderTextMessages extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'from_phone_number',
        'message_timestamp',
        'message_id',
        'message_type',
        'sender_message_id',
    ];

    public function senderMessage()
    {
        return $this->belongsTo(WhatsAppSender::class, 'sender_message_id', 'id');
    }
}
