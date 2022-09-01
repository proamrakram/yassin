<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Bot;
use App\Models\WhatsAppSender;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home()
    {
        return view('whatsapp.dashboard.home');
    }

    public function bots()
    {
        $bots = Bot::all();
        return view('whatsapp.dashboard.bots', compact(['bots']));
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
