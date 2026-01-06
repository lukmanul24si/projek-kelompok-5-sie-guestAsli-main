<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('umkms', function (Blueprint $table) {
            $table->id('umkm_id'); // Primary Key
            $table->string('nama_usaha', 200);
            
            // Menggunakan relasi ke tabel users (sesuaikan jika kamu punya tabel warga)
            $table->foreignId('pemilik_warga_id')->constrained('users')->onDelete('cascade');
            
            $table->text('alamat');
            $table->string('rt', 10);
            $table->string('rw', 10);
            $table->string('kategori', 100);
            $table->string('kontak', 50);
            $table->text('deskripsi')->nullable();
            $table->string('logo', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('umkms');
    }
};