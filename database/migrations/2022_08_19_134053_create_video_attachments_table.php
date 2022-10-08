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
        Schema::create('video_attachments', function (Blueprint $table) {
            $table->id();
            $table->text('video_url');
            $table->boolean('is_url_expired')->default(true);
            $table->string('mime_type');
            $table->string('hash_sha_256');
            $table->string('file_size');
            $table->string('video_id');
            $table->string('messaging_product');
            $table
                ->foreignId('video_message_id')
                ->unique()
                ->constrained('videos');
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
        Schema::dropIfExists('video_attachments');
    }
};
