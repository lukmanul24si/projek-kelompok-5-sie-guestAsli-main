<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Membuat Tabel Utama Pesanan
<<<<<<< HEAD
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id('pesanan_id');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->decimal('total_harga', 12, 2);
            $table->enum('status_pembayaran', ['pending', 'dibayar', 'dibatalkan'])->default('pending');
=======
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id('pesanan_id');
            $table->string('nomor_pesanan', 50)->unique();
            $table->foreignId('warga_id')->constrained('warga', 'warga_id')->onDelete('cascade');
            $table->decimal('total', 15, 2)->default(0.00);
            $table->string('status', 50)->default('baru');
            $table->text('alamat_kirim')->nullable();
            $table->string('rt', 10)->nullable();
            $table->string('rw', 10)->nullable();
            $table->string('metode_bayar', 50)->nullable();
            $table->string('bukti_bayar', 255)->nullable();
>>>>>>> 3acb0d8 (Menghubungkan projek lokal ke github)
            $table->timestamps();
        });

        // 2. Membuat Tabel Rincian/Detail Pesanan
<<<<<<< HEAD
        Schema::create('detail_pesanans', function (Blueprint $table) {
            $table->id('detail_id');
            $table->foreignId('pesanan_id')->constrained('pesanans', 'pesanan_id')->onDelete('cascade');
            $table->foreignId('produk_id')->constrained('produks', 'produk_id')->onDelete('cascade');
            $table->integer('jumlah');
            $table->decimal('subtotal', 12, 2);
=======
        Schema::create('detail_pesanan', function (Blueprint $table) {
            $table->id('detail_id');
            $table->foreignId('pesanan_id')->constrained('pesanan', 'pesanan_id')->onDelete('cascade');
            $table->foreignId('produk_id')->constrained('produk', 'produk_id')->onDelete('cascade');
            $table->integer('qty');
            $table->decimal('harga_satuan', 15, 2);
            $table->decimal('subtotal', 15, 2);
>>>>>>> 3acb0d8 (Menghubungkan projek lokal ke github)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_pesanans');
        Schema::dropIfExists('pesanans');
    }
<<<<<<< HEAD
};
=======
};
>>>>>>> 3acb0d8 (Menghubungkan projek lokal ke github)
