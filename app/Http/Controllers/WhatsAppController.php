<?php

namespace App\Http\Controllers;

use App\Models\WhatsApp;
use App\Http\Requests\StoreWhatsAppRequest;
use App\Http\Requests\UpdateWhatsAppRequest;

class WhatsAppController extends Controller
{
    public function handleMessage($data)
    {
        // $whatsapp_message = WhatsApp::create([
        //     'object_type' => $data->object,
        //     'entry_object_id' => $data->entry[0]->id,
        //     'entry_changes_value_object' => $data->entry[0]->changes[0]->value,
        //     'entry_changes_field_object' => $data->entry[0]->changes[0]->field
        // ]);

        $whatsapp_message = WhatsApp::create([
            'object_type' => 'nano',
            'entry_object_id' => 23456789,
            'entry_changes_value_object' => $data->entry,
            'entry_changes_field_object' => []
        ]);

    }

    public function tester()
    {
        $message = WhatsApp::find(1)->entry_changes_value_object;
        $message = json_decode($message);
        dd($message);
        dd(WhatsApp::find(7)->entry_changes_value_object);

    }
}
