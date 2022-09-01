<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bot extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'whats_app_business_account_id',
        'phone_number',
        'phone_number_id',
        'messaging_product',
    ];

    protected $casts = [
        'whats_app_business_account_id' => 'integer',
    ];

    public function whatsAppSenders()
    {
        return $this->hasMany(WhatsAppSender::class, 'bot_id', 'id');
    }

    public function botMessages()
    {
        return $this->hasMany(BotMessage::class, 'bot_id', 'id');
    }
}
