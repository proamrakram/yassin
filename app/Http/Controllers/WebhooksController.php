<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WebhooksController extends Controller
{
    protected $hub_challenge;
    protected $hub_verify_token;
    protected $hub_mode;
    protected $verify_token;
    protected $request;

    public function __construct(Request $request)
    {
        $this->$request = $request;
        $this->hub_verify_token = $request->input('hub_verify_token');
        $this->hub_mode = $request->input('hub_mode');
        $this->verify_token = 'amrakram';
    }

    public function handle()
    {
        if ($this->request->isMethod('get') && $this->request->get('hub_challenge')) {

            if ($this->hub_mode == 'subscribe' && $this->hub_verify_token == $this->verify_token) {

                Storage::disk('local')->put('whatsapp.txt', $this->request);
                Storage::disk('local')->append('whatsapp.txt', $this->hub_challenge);
                Storage::disk('local')->append('whatsapp.txt', $this->hub_mode);
                Storage::disk('local')->append('whatsapp.txt', $this->hub_verify_token);

                echo $this->hub_challenge;
                exit;
            }
        }
    }
}
