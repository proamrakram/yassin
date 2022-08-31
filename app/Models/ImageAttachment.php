<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageAttachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_url',
        'is_url_expired',
        'mime_type',
        'hash_sha256',
        'file_size',
        'image_id',
        'messaging_product',
        'image_message_id',
    ];

    public function senderMessage()
    {
        return $this->belongsTo(Image::class, 'image_message_id', 'id');
    }

}
