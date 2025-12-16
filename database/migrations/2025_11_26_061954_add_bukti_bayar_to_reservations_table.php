<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('reservations', function (Blueprint $table) {
            // Menambahkan kolom bukti bayar (bisa multiple, kita simpan sebagai JSON atau path folder)
            $table->string('bukti_bayar')->nullable()->after('quantity');
            // Status pesanan untuk filter
            $table->string('status')->default('pending')->after('quantity'); 
        });
    }

    public function down(): void
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropColumn(['bukti_bayar', 'status']);
        });
    }
};