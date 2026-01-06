<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id('produk_id'); // Primary Key
            // Pastikan merujuk ke 'umkms' (sesuai migrasi sebelumnya)
            $table->foreignId('umkm_id')->constrained('umkms', 'umkm_id')->onDelete('cascade');
            $table->string('nama_produk', 200);
            $table->text('deskripsi')->nullable();
            $table->decimal('harga', 15, 2);
            $table->integer('stok')->default(0);
            $table->string('status', 255)->default('aktif');
            $table->string('foto_produk', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};