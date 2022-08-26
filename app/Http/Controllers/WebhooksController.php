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
    protected $whatsAppController;

    public function __construct(Request $request, WhatsAppController $whatsAppController)
    {
        $this->whatsAppController = $whatsAppController;
        $this->request = $request;
        $this->hub_mode = $request->hub_mode;
        $this->hub_challenge = $request->hub_challenge;
        $this->hub_verify_token = $request->hub_verify_token;
        $this->verify_token = 'amrakram';
    }

    public function handle()
    {
        if ($this->request->isMethod('get') && $this->request->hub_challenge) {

            if ($this->hub_mode == 'subscribe' && $this->hub_verify_token == $this->verify_token) {
                echo $this->hub_challenge;
                exit;
            }
        }

        if ($this->request->isMethod('post')) {
            $input = json_decode(file_get_contents('php://input',  TRUE));
            #Write the message to file.
            $this->handleMessage($input);
            #Go to whatsapp controller to handle message
            $this->whatsAppController->handleMessage($input);
        }
    }

    public function handleMessage($data = null)
    {
        Storage::disk('local')->put('data.txt', print_r($data, true));
    }
}
