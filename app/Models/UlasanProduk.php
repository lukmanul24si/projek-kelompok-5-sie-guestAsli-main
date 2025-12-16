<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UlasanProduk extends Model
{
    protected $table = 'ulasan_produks';
    protected $primaryKey = 'ulasan_id';
    protected $fillable = ['produk_id', 'user_id', 'rating', 'komentar'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}