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
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); // Hangi kullanıcının yaptığını kaydetmek için
            $table->string('model_type')->nullable();  // Hangi model üzerinde işlem yapıldığını (örn., 'App\Models\User')
            $table->unsignedBigInteger('model_id')->nullable(); // Hangi model ID'si üzerinde işlem yapıldığını
            $table->string('action'); // Yapılan işlem (örn., 'create', 'update', 'delete')
            $table->text('description')->nullable(); // İşlemle ilgili açıklama (örn., "Kullanıcı güncellendi")
            $table->json('old_values')->nullable(); // Eski değerler (update işlemlerinde)
            $table->json('new_values')->nullable(); // Yeni değerler (create ve update işlemlerinde)
            $table->ipAddress('ip_address')->nullable(); // İşlemi yapan kullanıcının IP adresi
            $table->string('user_agent')->nullable();   // User agent bilgisi
            $table->timestamps(); // created_at ve updated_at

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null'); // User silinirse log silinmesin
            // Gerekirse model_type ve model_id üzerine index ekleyebilirsiniz:
            // $table->index(['model_type', 'model_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
    }
};