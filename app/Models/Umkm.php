<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Umkm extends Model
{
    use HasFactory;

    // Nama tabel disesuaikan dengan migrasi terakhir (gunakan 'umkms')
    protected $table = 'umkms'; 
    
    // Primary Key sesuai migrasi
    protected $primaryKey = 'umkm_id';

    protected $fillable = [
        'nama_usaha', 
        'pemilik_warga_id', 
        'alamat', 
        'rt', 
        'rw', 
        'kategori', 
        'kontak', 
        'deskripsi', 
        'logo'
    ];

    /**
     * RELASI: Satu UMKM memiliki banyak Produk
     */
    public function produks()
    {
        return $this->hasMany(Produk::class, 'umkm_id', 'umkm_id');
    }
}