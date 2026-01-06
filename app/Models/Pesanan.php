<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    // Nama tabel di database
<<<<<<< HEAD
    protected $table = 'pesanans';

    // Nama Primary Key (karena kita tidak pakai 'id')
=======
    protected $table = 'pesanan';

    // Nama Primary Key
>>>>>>> 3acb0d8 (Menghubungkan projek lokal ke github)
    protected $primaryKey = 'pesanan_id';

    // Kolom yang boleh diisi manual
    protected $fillable = [
<<<<<<< HEAD
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
=======
        'nomor_pesanan',
        'warga_id',
        'total',
        'status',
        'alamat_kirim',
        'rt',
        'rw',
        'metode_bayar',
        'bukti_bayar'
    ];

    /**
     * Relasi: Satu Pesanan dimiliki oleh satu Warga.
     */
    public function warga()
    {
        return $this->belongsTo(Warga::class, 'warga_id', 'warga_id');
>>>>>>> 3acb0d8 (Menghubungkan projek lokal ke github)
    }

    /**
     * Relasi: Satu Pesanan memiliki banyak Rincian/Detail Barang.
     */
<<<<<<< HEAD
    public function details()
    {
        return $this->hasMany(DetailPesanan::class, 'pesanan_id', 'pesanan_id');
    }
}
=======
    public function detailPesanan()
    {
        return $this->hasMany(DetailPesanan::class, 'pesanan_id', 'pesanan_id');
    }
}
>>>>>>> 3acb0d8 (Menghubungkan projek lokal ke github)
