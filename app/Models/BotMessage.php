<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BotMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'bot_id',
        'messaging_product',
        'contacts',
        'messages'
    ];

    protected $casts = [
        'contacts' => 'array',
        'messages' => 'array'
    ];

    public  function bot()
    {
        return $this->belongsTo(Bot::class, 'bot_id', 'id');
    }
}
