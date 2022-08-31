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

    public function textMessages()
    {
        return $this->hasMany(Text::class, 'sender_id', 'id');
    }

    public function audioMessages()
    {
        return $this->hasMany(Audio::class, 'sender_id', 'id');
    }

    public function imageMessages()
    {
        return $this->hasMany(Image::class, 'sender_id', 'id');
    }

    public function videoMessages()
    {
        return $this->hasMany(Video::class, 'sender_id', 'id');
    }

    public function documentMessages()
    {
        return $this->hasMany(Document::class, 'sender_id', 'id');
    }

    public function locationMessages()
    {
        return $this->hasMany(Location::class, 'sender_id', 'id');
    }

    public function contactMessages()
    {
        return $this->hasMany(Contact::class, 'sender_id', 'id');
    }

    public function stickerMessages()
    {
        return $this->hasMany(Sticker::class, 'sender_id', 'id');
    }
}
