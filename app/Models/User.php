<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $fillable = [
        'first_name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Relasi ke model UMKM
     */
    public function umkm()
    {
        return $this->hasOne(Umkm::class, 'pemilik_warga_id', 'id');
    }

    /**
     * Cek apakah user adalah seller (punya UMKM)
     */
    public function isSeller()
    {
        return $this->umkm()->exists();
    }
}