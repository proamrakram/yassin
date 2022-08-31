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
        Schema::create('texts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sender_id')->constrained('whats_app_senders');
            $table->string('from_phone_number')->nullable();
            $table->longText('body')->nullable();

            $table->longText('message_id')->nullable();
            $table->string('message_type')->nullable();

            $table->timestamp('message_timestamp')->nullable();
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
        Schema::dropIfExists('texts');
    }
};
