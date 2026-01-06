<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Membuat Tabel Utama Pesanan
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id('pesanan_id');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('nomor_pesanan', 50)->unique()->nullable();
            $table->decimal('total_harga', 15, 2)->default(0.00);
            $table->string('status', 50)->default('pending');
            $table->text('alamat_kirim')->nullable();
            $table->string('rt', 10)->nullable();
            $table->string('rw', 10)->nullable();
            $table->string('metode_bayar', 50)->nullable();
            $table->string('bukti_bayar', 255)->nullable();
            $table->timestamps();
        });

        // 2. Membuat Tabel Rincian/Detail Pesanan
        Schema::create('detail_pesanans', function (Blueprint $table) {
            $table->id('detail_id');
            // Pastikan foreignId merujuk ke 'pesanans' (dengan s) dan 'produks' (dengan s)
            $table->foreignId('pesanan_id')->constrained('pesanans', 'pesanan_id')->onDelete('cascade');
            $table->foreignId('produk_id')->constrained('produks', 'produk_id')->onDelete('cascade');
            $table->integer('jumlah');
            $table->decimal('harga_satuan', 15, 2);
            $table->decimal('subtotal', 15, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_pesanans');
        Schema::dropIfExists('pesanans');
    }
};