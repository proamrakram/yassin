<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhatsApp extends Model
{
    use HasFactory;

    protected $fillable = [
        'object_type',
        'entry_object_id',
        'entry_changes_value_object',
        'entry_changes_field_object'
    ];
}
