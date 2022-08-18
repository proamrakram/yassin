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
        Schema::create('bots', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // bot name
            $table->string('whats_app_business_account_id')->nullable(); // The ID of the WhatsApp Business Account
            $table->string('phone_number')->nullable(); // The phone number
            $table->string('phone_number_id')->nullable(); // The ID of the phone number
            $table->string('messaging_product')->nullable(); // The messaging product
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
        Schema::dropIfExists('bots');
    }
};
