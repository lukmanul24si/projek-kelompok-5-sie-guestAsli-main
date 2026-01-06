<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Warga extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'warga';

    // Nama Primary Key
    protected $primaryKey = 'warga_id';

    public $timestamps = false;

    // Kolom yang boleh diisi manual
    protected $fillable = [
        'no_ktp',
        'nama',
        'jenis_kelamin',
        'agama',
        'pekerjaan',
        'telp',
        'email'
    ];

    /**
     * Relasi: Satu Warga dapat memiliki banyak UMKM.
     */
    public function umkm()
    {
        return $this->hasMany(Umkm::class, 'pemilik_warga_id', 'warga_id');
    }

    /**
     * Relasi: Satu Warga dapat memiliki banyak Pesanan.
     */
    public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'warga_id', 'warga_id');
    }

}
