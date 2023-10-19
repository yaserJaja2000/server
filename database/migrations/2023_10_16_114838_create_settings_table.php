<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->string('country');
            $table->string('city');
            $table->string('phone');
            $table->string('facebook');
            $table->string('instagram');
            $table->string('whatsapp');
            $table->string('twitter');
            $table->string('url_email');
            $table->string('googl_play')->nullable();
            $table->string('app_store')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
