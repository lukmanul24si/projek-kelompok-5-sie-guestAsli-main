<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UlasanProduk extends Model
{
    use HasFactory;

    // Nama tabel disesuaikan dengan migrasi (biasanya menggunakan akhiran 's')
    protected $table = 'ulasan_produks';

    protected $primaryKey = 'ulasan_id';

    protected $fillable = [
        'produk_id', 
        'user_id', 
        'rating', 
        'komentar'
    ];

    /**
     * RELASI: Ulasan dimiliki oleh satu Produk
     */
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id', 'produk_id');
    }

    /**
     * RELASI: Ulasan dimiliki oleh satu User (Pembeli)
     */
    public function user() 
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}