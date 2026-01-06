<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPesanan extends Model
{
    use HasFactory;

    // Nama tabel disesuaikan dengan migrasi yang baru saja sukses
    protected $table = 'detail_pesanans';

    // Nama Primary Key
    protected $primaryKey = 'detail_id';

    // Kolom yang boleh diisi manual (menggunakan 'jumlah' sesuai migrasi terakhir)
    protected $fillable = [
        'pesanan_id',
        'produk_id',
        'jumlah',
        'harga_satuan',
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