<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhatsApp extends Model
{
    use HasFactory;

    protected $fillable = [
        'object'
    ];

    protected $casts = [
        'object' => 'array'
    ];
}
