<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Http;

trait SendMessages
{
    public function send($headers, $data)
    {
        return Http::withHeaders($headers)->post(env('URL_MESSAGING'), $data);
    }

    public function reply($headers, $data)
    {
        return Http::withHeaders($headers)->post(env('URL_MESSAGING'), $data);
    }
}
