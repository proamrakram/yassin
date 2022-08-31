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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();

            # The body of the message
            $table->string('from_phone_number')->nullable();
            $table->dateTime('message_timestamp')->nullable();
            $table->string('message_id')->nullable();
            $table->string('message_type')->nullable();

            #Contact Data
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('full_name')->nullable();
            $table->string('phone_number')->nullable();
            $table->unsignedBigInteger('wa_contact_id')->nullable();
            $table->string('contact_type')->nullable();

            # Foreign key to the sender message
            $table->foreignId('sender_id')->constrained('whats_app_senders');
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
        Schema::dropIfExists('contacts');
    }
};
