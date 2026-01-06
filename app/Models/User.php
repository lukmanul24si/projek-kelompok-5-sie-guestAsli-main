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

    // Relationship ini mungkin perlu dihapus karena UMKM sekarang dimiliki oleh Warga, bukan User
    // public function umkm()
    // {
    //     return $this->hasOne(Umkm::class, 'pemilik_warga_id', 'id');
    // }

    public function isSeller()
    {
        // Method ini mungkin perlu diimplementasikan ulang
        // karena struktur hubungan telah berubah
        return false;

    }

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
