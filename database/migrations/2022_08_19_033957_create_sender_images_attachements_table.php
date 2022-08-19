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
        Schema::create('sender_images_attachements', function (Blueprint $table) {
            $table->id();
            $table->string('image_url');
            $table->string('mime_type');
            $table->longText('hash_sha256');
            $table->string('file_size');
            $table->string('image_id');
            $table->string('messaging_product');

            $table->foreignId('sender_message_id')->constrained('whats_app_senders');
            $table->foreignId('sender_image_message_id')->constrained('sender_image_messages');
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
        Schema::dropIfExists('sender_images_attachements');
    }
};
