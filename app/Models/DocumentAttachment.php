<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentAttachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'document_url',
        'expired_url',
        'mime_type',
        'hash_sha256',
        'file_size',
        'document_id',
        'messaging_product',
        'sender_document_message_id',
    ];

    public function senderMessage()
    {
        return $this->belongsTo(SenderDocumentMessages::class, 'sender_document_message_id', 'id');
    }
}
