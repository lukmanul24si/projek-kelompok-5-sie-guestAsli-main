<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
<<<<<<< HEAD
        Schema::create('umkms', function (Blueprint $table) {
            $table->id('umkm_id'); // Primary Key
            $table->string('nama_usaha');
            // Foreign Key ke tabel users (pemilik)
            $table->foreignId('pemilik_warga_id')->constrained('users')->onDelete('cascade');
            $table->text('alamat');
            $table->string('rt', 3)->nullable();
            $table->string('rw', 3)->nullable();
            $table->string('kategori');
            $table->string('kontak');
            $table->text('deskripsi')->nullable();
            $table->string('logo')->nullable();
=======
        Schema::create('umkm', function (Blueprint $table) {
            $table->id('umkm_id'); // Primary Key
            $table->string('nama_usaha', 200);
            // Foreign Key ke tabel warga (pemilik)
            $table->foreignId('pemilik_warga_id')->constrained('warga', 'warga_id')->onDelete('cascade');
            $table->text('alamat');
            $table->string('rt', 10);
            $table->string('rw', 10);
            $table->string('kategori', 100);
            $table->string('kontak', 50);
            $table->text('deskripsi')->nullable();
            $table->string('logo_foto_usaha', 255)->nullable();
>>>>>>> 3acb0d8 (Menghubungkan projek lokal ke github)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('umkms');
    }
};