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
<<<<<<< HEAD
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
=======
    {
        Schema::create('ulasan_produk', function (Blueprint $table) {
            $table->id('ulasan_id');
            $table->foreignId('produk_id')->constrained('produk', 'produk_id')->onDelete('cascade');
            $table->foreignId('warga_id')->constrained('warga', 'warga_id')->onDelete('cascade');
            $table->unsignedTinyInteger('rating'); // 1-5
            $table->text('komentar')->nullable();
            $table->timestamps();
        });
    }
>>>>>>> 3acb0d8 (Menghubungkan projek lokal ke github)

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
<<<<<<< HEAD
        Schema::dropIfExists('ulasan_produks');
=======
        Schema::dropIfExists('ulasan_produk');
>>>>>>> 3acb0d8 (Menghubungkan projek lokal ke github)
    }
};
