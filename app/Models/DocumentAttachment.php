<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentAttachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'document_url',
        'is_url_expired',
        'mime_type',
        'hash_sha256',
        'file_size',
        'document_id',
        'messaging_product',
        'document_message_id',
    ];

    protected $casts = [
        'expired_url' => 'boolean',
    ];


    public function senderMessage()
    {
        return $this->belongsTo(Document::class, 'document_message_id', 'id');
    }
}
