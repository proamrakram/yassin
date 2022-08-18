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
        Schema::create('sender_location_messages', function (Blueprint $table) {
            $table->id();

            # The body of the message
            $table->string('from_phone_number')->nullable();
            $table->dateTime('message_timestamp')->nullable();
            $table->string('message_id')->nullable();
            $table->string('message_type')->nullable();

            #Location Data
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('name')->nullable();
            $table->string('url')->nullable();

            # Foreign key to the sender message
            $table->foreignId('sender_message_id')->constrained('whats_app_senders');
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
        Schema::dropIfExists('sender_location_messages');
    }
};
