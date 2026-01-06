<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pelanggan extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'pelanggan';

    // Nama Primary Key
    protected $primaryKey = 'pelanggan_id';

    // Kolom yang boleh diisi manual
    protected $fillable = [
        'first_name',
        'last_name',
        'birthday',
        'gender',
        'email',
        'phone',
        'files'
    ];

    /**
     * Cast attribute files ke array
     */
    protected $casts = [
        'files' => 'array',
    ];
}