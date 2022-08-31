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
        return view('whatsapp.dashboard.users', compact(['wa_users']));
    }
}
