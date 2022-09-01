<?php

namespace App\Http\Controllers;

use App\Models\Text;
use App\Http\Requests\StoreTextRequest;
use App\Http\Requests\UpdateTextRequest;

class TextController extends Controller
{
    public function store(StoreTextRequest $request, $sender, $message)
    {
        $sender_text_message = Text::where('message_id', $message->id)->first();

        if (!$sender_text_message) {

            return Text::create([
                'body' => $message->text->body,
                'message_id' => $message->id,
                'message_type' => $message->type,
                'from_phone_number' => $message->from,
                'message_timestamp' =>  date('Y/m/d H:i:s', (int)$message->timestamp),
                'sender_id' => $sender->id,
            ]);
        }

        return $sender_text_message;
    }
}
