<?php

namespace App\Http\Controllers\Whatsapp;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Http\Requests\StoreLocationRequest;

class LocationController extends Controller
{
    public function store(StoreLocationRequest $request, $sender, $message)
    {
        $sender_location_message = Location::where('message_id', $message->id)->first();

        if (!$sender_location_message) {
            return Location::create([
                'message_id' => $message->id,
                'message_type' => $message->type,
                'from_phone_number' => $message->from,
                'message_timestamp' => date('Y/m/d H:i:s', (int)$message->timestamp),
                'latitude' => $message->location->latitude,
                'longitude' => $message->location->longitude,
                'name' =>  property_exists($message->location, 'name') ? $message->location->name : null,
                'url' => property_exists($message->location, 'url') ? $message->location->url : null,
                'sender_id' => $sender->id,
            ]);
        }

        return $sender_location_message;
    }
}
