<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

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

     public function umkm()
    {
        
        return $this->hasOne(Umkm::class, 'pemilik_warga_id', 'id');
    }

    public function isSeller()
    {
   
        return $this->umkm()->exists();
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
