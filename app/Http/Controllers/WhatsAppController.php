<?php

namespace App\Http\Controllers;

use App\Models\WhatsApp;
use App\Http\Requests\StoreWhatsAppRequest;
use App\Http\Requests\UpdateWhatsAppRequest;

class WhatsAppController extends Controller
{
    public function handleMessage($data)
    {
        $whatsapp_message = WhatsApp::create([
            'entry_object_id' => $data->entry[0]['id'],
            'object' => $data,
        ]);
    }

    public function tester()
    {
        $message = WhatsApp::find(1);
        dd($message->object);
        $object_type = $message->object_type;
        $entry_object_id = $message->entry_object_id;
        $entry_changes_value_object = $message->entry_changes_value_object;
        $entry_changes_field_object = $message->entry_changes_field_object;
        dd(
            $object_type,
            $entry_object_id,
            $entry_changes_value_object,
            $entry_changes_field_object,
        );
    }
}
