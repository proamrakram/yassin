<?php

namespace App\Http\Controllers;

use App\Models\BotMessage;
use App\Http\Requests\StoreBotMessageRequest;
use App\Http\Requests\UpdateBotMessageRequest;

class BotMessageController extends Controller
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
     * @param  \App\Http\Requests\StoreBotMessageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBotMessageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BotMessage  $botMessage
     * @return \Illuminate\Http\Response
     */
    public function show(BotMessage $botMessage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BotMessage  $botMessage
     * @return \Illuminate\Http\Response
     */
    public function edit(BotMessage $botMessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBotMessageRequest  $request
     * @param  \App\Models\BotMessage  $botMessage
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBotMessageRequest $request, BotMessage $botMessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BotMessage  $botMessage
     * @return \Illuminate\Http\Response
     */
    public function destroy(BotMessage $botMessage)
    {
        //
    }
}
