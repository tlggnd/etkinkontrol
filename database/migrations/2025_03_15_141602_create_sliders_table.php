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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('image'); // Resim yolu
            $table->string('title')->nullable();
            $table->boolean('title_active')->default(true);
            $table->string('subtitle')->nullable();
            $table->boolean('subtitle_active')->default(true);
            $table->string('button_text')->nullable();
            $table->string('button_color')->nullable(); // Örn: #ff0000 veya primary, secondary, vb.
            $table->string('button_link')->nullable();
            $table->boolean('button_active')->default(true);
            $table->integer('order')->default(0); // Sıralama için
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};