<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function newSubscribtion(Request $request)
    {
        dd($request->all());
    }
}
