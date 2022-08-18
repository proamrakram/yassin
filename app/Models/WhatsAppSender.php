<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhatsAppSender extends Model
{
    use HasFactory;

    protected $fillable = [
        'bot_id',
        'name',
        'phone_number',
    ];

    public function bot()
    {
        return $this->belongsTo(Bot::class, 'bot_id', 'id');
    }

    public function senderTextMessages()
    {
        return $this->hasMany(SenderTextMessages::class, 'sender_message_id', 'id');
    }

    public function senderAudioMessages()
    {
        return $this->hasMany(SenderAudioMessages::class, 'sender_message_id', 'id');
    }

    public function senderImageMessages()
    {
        return $this->hasMany(SenderImageMessages::class, 'sender_message_id', 'id');
    }

    public function senderVideoMessages()
    {
        return $this->hasMany(SenderVideoMessages::class, 'sender_message_id', 'id');
    }

    public function senderDocumentMessages()
    {
        return $this->hasMany(SenderDocumentMessages::class, 'sender_message_id', 'id');
    }

    public function senderLocationMessages()
    {
        return $this->hasMany(SenderLocationMessages::class, 'sender_message_id', 'id');
    }

    public function senderContactMessages()
    {
        return $this->hasMany(SenderContactMessages::class, 'sender_message_id', 'id');
    }

    public function senderStickerMessages()
    {
        return $this->hasMany(SenderStickerMessages::class, 'sender_message_id', 'id');
    }

}
