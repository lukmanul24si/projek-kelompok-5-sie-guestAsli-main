<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produks';
    protected $primaryKey = 'produk_id';

    protected $fillable = [
        'umkm_id', 'nama_produk', 'deskripsi', 'harga', 'stok', 'status', 'foto_produk'
    ];

    //  RELASI 
    public function umkm()
    {
        return $this->belongsTo(Umkm::class, 'umkm_id', 'umkm_id');
    }
    public function ulasans() {
    return $this->hasMany(UlasanProduk::class, 'produk_id', 'produk_id');
}
}