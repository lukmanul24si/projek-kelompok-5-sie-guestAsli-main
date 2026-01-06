<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    // Nama tabel di database (Gunakan 'pesanans' sesuai migrasi terakhir kamu)
    protected $table = 'pesanans';

    // Nama Primary Key
    protected $primaryKey = 'pesanan_id';

    // Kolom yang boleh diisi manual
    protected $fillable = [
        'user_id',
        'total_harga',
        'status', // pending, dikirim, selesai, dll
        'alamat_kirim',
        'metode_bayar',
        'bukti_bayar'
    ];

    /**
     * Relasi: Satu Pesanan dimiliki oleh satu User (Pembeli).
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * Relasi: Satu Pesanan memiliki banyak Rincian/Detail Barang.
     */
    public function details()
    {
        return $this->hasMany(DetailPesanan::class, 'pesanan_id', 'pesanan_id');
    }
}