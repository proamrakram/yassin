<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Http;

trait SendMessages
{
    public function sendMessage($message)
    {
    }

    public function reply($headers, $data)
    {
        $url = 'https://graph.facebook.com/v14.0/' . env('PHONE_NUMBER_ID') . '/messages';

        $response = Http::withHeaders($headers)->post($url, $data);
    }
}
