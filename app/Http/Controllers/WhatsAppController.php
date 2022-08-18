<?php

namespace App\Http\Controllers;

use App\Models\WhatsApp;
use App\Http\Requests\StoreWhatsAppRequest;
use App\Http\Requests\UpdateWhatsAppRequest;

class WhatsAppController extends Controller
{
    public function handleMessage($data)
    {
        $whatsapp_message = WhatsApp::where('entry_object_id', (int)$data->entry[0]->id)->first();
        if (!$whatsapp_message) {
            $whatsapp_message = WhatsApp::create([
                'entry_object_id' => (int)$data->entry[0]->id,
                'object_entry_changes_value' => $data->entry[0]->changes[0]->value,
                'object_entry_changes_field' => $data->entry[0]->changes[0]->field,
            ]);
        }
    }

    public function tester()
    {
        $message = WhatsApp::find(1);
        dd($message->entry_object_id, $message->object_entry_changes_value, $message->object_entry_changes_field);
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
