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
    Schema::create('ulasan_produks', function (Blueprint $table) {
        $table->id('ulasan_id');
        // Foreign Key ke Produk
        $table->foreignId('produk_id')->constrained('produks', 'produk_id')->onDelete('cascade');
        // Foreign Key ke User (Warga)
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        $table->integer('rating'); // 1-5
        $table->text('komentar');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ulasan_produks');
    }
};
