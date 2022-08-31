<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_phone_number',
        'message_timestamp',
        'message_id',
        'message_type',
        'first_name',
        'last_name',
        'full_name',
        'phone_number',
        'wa_contact_id',
        'contact_type',
        'sender_id',
    ];

    public function senderMessage()
    {
        return $this->belongsTo(WhatsAppSender::class, 'sender_id', 'id');
    }
}
