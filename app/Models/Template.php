<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'components',
        'language',
        'status',
        'category',
        'template_id',
        'bot_id',
    ];

    protected $casts = [
        'components' => 'array'
    ];

    public function bot()
    {
        return $this->belongsTo(Bot::class, 'bot_id', 'id');
    }
}
