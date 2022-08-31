<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('whats_app_senders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bot_id')->constrained('bots');
            $table->string('name'); // the name of sender
            $table->string('phone_number')->nullable(); // The phone number
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('whats_app_senders');
    }
};
