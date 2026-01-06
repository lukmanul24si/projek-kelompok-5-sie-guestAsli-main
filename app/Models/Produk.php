<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    // Nama tabel harus konsisten dengan migrasi (gunakan 'produks')
    protected $table = 'produks';

    protected $primaryKey = 'produk_id';

    protected $fillable = [
        'umkm_id', 
        'nama_produk', 
        'deskripsi', 
        'harga', 
        'stok', 
        'status', 
        'foto_produk'
    ];

    /**
     * RELASI: Produk dimiliki oleh satu UMKM
     */
    public function umkm()
    {
        return $this->belongsTo(Umkm::class, 'umkm_id', 'umkm_id');
    }

    /**
     * RELASI: Produk memiliki banyak Ulasan
     */
    public function ulasans() 
    {
        return $this->hasMany(UlasanProduk::class, 'produk_id', 'produk_id');
    }
}