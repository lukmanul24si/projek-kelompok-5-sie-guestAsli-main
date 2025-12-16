<?php

namespace App\Models; // <--- Harus tepat seperti ini

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Umkm extends Model
{
    use HasFactory;

    // Tambahkan ini jika nama tabel Anda bukan 'umkms'
    protected $table = 'umkms'; 
    
    // Tambahkan ini jika Primary Key Anda bukan 'id' (tadi kita pakai umkm_id)
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
    public function produks()
    {
        // 'umkm_id' pertama adalah foreign key di tabel produks
        // 'umkm_id' kedua adalah local key di tabel umkms
        return $this->hasMany(Produk::class, 'umkm_id', 'umkm_id');
    }
}