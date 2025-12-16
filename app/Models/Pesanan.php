<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'pesanans';

    // Nama Primary Key (karena kita tidak pakai 'id')
    protected $primaryKey = 'pesanan_id';

    // Kolom yang boleh diisi manual
    protected $fillable = [
        'user_id',
        'total_harga',
        'status_pembayaran'
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