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
        Schema::create('whats_app_logs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('entry_object_id')->nullable();
            $table->json('object_entry_changes_value')->nullable();
            $table->json('object_entry_changes_field')->nullable();
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
        Schema::dropIfExists('whats_app_logs');
    }
};
