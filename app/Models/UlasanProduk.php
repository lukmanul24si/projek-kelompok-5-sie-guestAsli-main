<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UlasanProduk extends Model
{
    protected $table = 'ulasan_produks';
    protected $primaryKey = 'ulasan_id';
    protected $fillable = ['produk_id', 'user_id', 'rating', 'komentar'];

    public function produk()
    {
        // Parameter ke-2: foreign key di tabel ulasan_produks
        // Parameter ke-3: primary key di tabel produks
        return $this->belongsTo(Produk::class, 'produk_id', 'produk_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}