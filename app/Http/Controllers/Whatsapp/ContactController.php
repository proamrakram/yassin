<?php

namespace App\Http\Controllers\Whatsapp;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;

class ContactController extends Controller
{
    public function store(StoreContactRequest $request,  $sender, $message)
    {
        $sender_contact_message = Contact::where('message_id', $message->id)->first();

        if (!$sender_contact_message) {
            return Contact::create([
                'from_phone_number' => $message->from,
                'message_timestamp' => date('Y/m/d H:i:s', (int)$message->timestamp),
                'message_id' => $message->id,
                'message_type' => $message->type,
                'first_name' => property_exists($message->contacts[0]->name, 'first_name') ?  $message->contacts[0]->name->first_name : null,
                'last_name' =>  property_exists($message->contacts[0]->name, 'last_name') ? $message->contacts[0]->name->last_name : null,
                'full_name' =>  property_exists($message->contacts[0]->name, 'formatted_name') ? $message->contacts[0]->name->formatted_name : null,
                'phone_number' => property_exists($message->contacts[0], "phones") ? $message->contacts[0]->phones[0]->phone : null,
                'wa_contact_id' => property_exists($message->contacts[0], 'phones') ? $message->contacts[0]->phones[0]->wa_id : null,
                'contact_type' => property_exists($message->contacts[0], 'phones') ? $message->contacts[0]->phones[0]->type : null,
                'sender_message_id' => $sender->id,
            ]);
        }

        return $sender_contact_message;
    }
}
