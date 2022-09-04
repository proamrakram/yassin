<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Traits\TemplateMessages;
use App\Models\Bot;
use App\Models\WhatsAppSender;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    use TemplateMessages;


    private $headers;

    public function __construct()
    {
        $this->headers = [
            'Authorization' => "Bearer "  . env('WHATS_APP_TOKEN'),
            'Content-Type' => 'application/json',
        ];
    }

    public function home()
    {
        return view('whatsapp.dashboard.home');
    }

    public function bots()
    {
        $bots = Bot::all();
        return view('whatsapp.dashboard.bots.bots', compact(['bots']));
    }

    public function templates(Bot $bot)
    {
        $templates = $this->getTemplates($this->headers, $bot->whats_app_business_account_id);
        $templates_obj = json_decode(json_encode($templates));
        dd($templates_obj[0]);

        $this->saveTemplates($bot, $templates_obj);
        $templates = $bot->templates;
        return view('whatsapp.dashboard.bots.templates', compact(['templates']));
    }


    public function users()
    {
        $wa_users = WhatsAppSender::all();
        return view('whatsapp.dashboard.users.users', compact(['wa_users']));
    }

    public function imagesUser($user_id)
    {
        $wa_user = WhatsAppSender::firstWhere('id', $user_id);
        return view('whatsapp.dashboard.users.images', compact(['wa_user']));
    }

    public function textsUser($user_id)
    {
        $wa_user = WhatsAppSender::firstWhere('id', $user_id);
        return view('whatsapp.dashboard.users.texts', compact(['wa_user']));
    }
}
