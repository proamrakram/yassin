<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhatsAppLogs extends Model
{
    use HasFactory;

    protected $fillable = [
        'entry_object_id',
        'object_entry_changes_value',
        'object_entry_changes_field',
    ];

    protected $casts = [
        'object_entry_changes_value' => 'array',
        'object_entry_changes_field' => 'array',
    ];
}
