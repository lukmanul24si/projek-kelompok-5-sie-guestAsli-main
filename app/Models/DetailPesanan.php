<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPesanan extends Model
{
    use HasFactory;

    // Nama tabel di database
<<<<<<< HEAD
    protected $table = 'detail_pesanans';
=======
    protected $table = 'detail_pesanan';
>>>>>>> 3acb0d8 (Menghubungkan projek lokal ke github)

    // Nama Primary Key
    protected $primaryKey = 'detail_id';

    // Kolom yang boleh diisi manual
    protected $fillable = [
        'pesanan_id',
        'produk_id',
<<<<<<< HEAD
        'jumlah',
=======
        'qty',
        'harga_satuan',
>>>>>>> 3acb0d8 (Menghubungkan projek lokal ke github)
        'subtotal'
    ];

    /**
     * Relasi: Detail ini merujuk ke satu Pesanan utama.
     */
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'pesanan_id', 'pesanan_id');
    }

    /**
     * Relasi: Detail ini merujuk ke satu Produk yang dibeli.
     */
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id', 'produk_id');
    }
}