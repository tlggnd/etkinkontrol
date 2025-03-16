<?php
// database/migrations/xxxx_xx_xx_xxxxxx_create_menus_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique()->nullable(); // For URLs
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true); // For enabling/disabling
            $table->string('url')->nullable(); //added url column
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('menus')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('menus');
    }
}