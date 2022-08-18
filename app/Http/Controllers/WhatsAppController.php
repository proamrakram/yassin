<?php

namespace App\Http\Controllers;

use App\Models\WhatsApp;
use App\Http\Requests\StoreWhatsAppRequest;
use App\Http\Requests\UpdateWhatsAppRequest;

class WhatsAppController extends Controller
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
     * @param  \App\Http\Requests\StoreWhatsAppRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWhatsAppRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WhatsApp  $whatsApp
     * @return \Illuminate\Http\Response
     */
    public function show(WhatsApp $whatsApp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WhatsApp  $whatsApp
     * @return \Illuminate\Http\Response
     */
    public function edit(WhatsApp $whatsApp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWhatsAppRequest  $request
     * @param  \App\Models\WhatsApp  $whatsApp
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWhatsAppRequest $request, WhatsApp $whatsApp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WhatsApp  $whatsApp
     * @return \Illuminate\Http\Response
     */
    public function destroy(WhatsApp $whatsApp)
    {
        //
    }
}
