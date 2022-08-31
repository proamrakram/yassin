<?php

namespace App\Http\Controllers;

use App\Models\WhatsAppSender;
use App\Http\Requests\StoreWhatsAppSenderRequest;
use App\Http\Requests\UpdateWhatsAppSenderRequest;

class WhatsAppSenderController extends Controller
{
    public function store(StoreWhatsAppSenderRequest $request, $bot_id, $contact)
    {
        $whats_app_sender = WhatsAppSender::create([
            'bot_id' => $bot_id,
            'name' => $contact->profile->name,
            'phone_number' => $contact->wa_id,
        ]);

        return $whats_app_sender;
    }
}
