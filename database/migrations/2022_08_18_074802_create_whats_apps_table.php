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
        Schema::create('whats_apps', function (Blueprint $table) {
            $table->id();
            $table->string('object_type')->nullable();
            $table->integer('entry_object_id')->nullable();
            $table->json('entry_changes_value_object')->nullable();
            $table->json('entry_changes_field_object')->nullable();
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
        Schema::dropIfExists('whats_apps');
    }
};
