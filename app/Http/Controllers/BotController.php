<?php

namespace App\Http\Controllers;

use App\Models\Bot;
use App\Http\Requests\StoreBotRequest;
use App\Http\Requests\UpdateBotRequest;

class BotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBotsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBotRequest $request, $name = "whatsapp_business_account", $whats_app_business_account_id = null,  $phone_number = null, $phone_number_id = null, $messaging_product = "whatsapp")
    {
        $bot = Bot::create([
            'name' => $name,
            'whats_app_business_account_id' => $whats_app_business_account_id,
            'phone_number' => $phone_number,
            'phone_number_id' => $phone_number_id,
            'messaging_product' => $messaging_product,
        ]);

        return $bot;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bots  $bots
     * @return \Illuminate\Http\Response
     */
    public function show(Bot $bots)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bots  $bots
     * @return \Illuminate\Http\Response
     */
    public function edit(Bot $bots)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBotsRequest  $request
     * @param  \App\Models\Bots  $bots
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBotRequest $request, Bot $bots)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bots  $bots
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bot $bots)
    {
        //
    }
}
