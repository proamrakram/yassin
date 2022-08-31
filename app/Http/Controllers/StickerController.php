<?php

namespace App\Http\Controllers;

use App\Models\Sticker;
use App\Http\Requests\StoreStickerRequest;
use App\Http\Requests\UpdateStickerRequest;

class StickerController extends Controller
{
    public function store(StoreStickerRequest $request, $sender, $message)
    {
        $sender_sticker_message = Sticker::where('sticker_id', $message->sticker->id)->first();

        if (!$sender_sticker_message) {
            return Sticker::create([
                'from_phone_number' => $message->from,
                'message_timestamp' => date('Y/m/d H:i:s', (int)$message->timestamp),
                'message_id' => $message->id,
                'message_type' => $message->type,
                'mime_type' => $message->sticker->mime_type,
                'hash_sha_256' => $message->sticker->sha256,
                'sticker_id' => $message->sticker->id,
                'sender_message_id' => $sender->id,
            ]);
        }

        return $sender_sticker_message;
    }
}
