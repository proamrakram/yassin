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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();

            # The body of the message
            $table->string('from_phone_number')->nullable();
            $table->dateTime('message_timestamp')->nullable();
            $table->string('message_id')->nullable();
            $table->string('message_type')->nullable();

            #Video Data
            $table->string('mime_type')->nullable();
            $table->longText('hash_sha_256')->nullable();
            $table->unsignedBigInteger('video_id')->nullable();

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
        Schema::dropIfExists('videos');
    }
};