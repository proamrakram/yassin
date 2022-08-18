<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SenderTextMessages extends Model
{
    use HasFactory;

    protected $fillable = [

        #Relation with Sender Message Table
        'sender_message_id',
        'body',
        'from_phone_number',
        'message_timestamp',
        'message_id',
        'message_type',
    ];

    public function senderMessage()
    {
        return $this->belongsTo(WhatsAppSender::class, 'sender_message_id', 'id');
    }
}
