<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Ke mana pengguna diarahkan setelah pendaftaran (Default).
     * Namun, fungsi 'registered' di bawah akan mengambil alih ini.
     */
    protected $redirectTo = '/login';

    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Validasi data yang masuk. 
     * Pastikan 'first_name' sesuai dengan atribut 'name' di form HTML Anda.
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'], // Diubah dari 'name'
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Membuat user baru di database.
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'], // Diubah dari 'name'
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Logika setelah user berhasil terdaftar.
     */
    protected function registered(Request $request, $user)
    {
        // Logout otomatis agar user tidak langsung masuk ke dashboard
        auth()->logout(); 

        // Redirect ke login dengan pesan sukses (flash session)
        return redirect()->route('login')->with('success', 'Akun warga telah terdaftar! Silakan masuk menggunakan email dan kata sandi Anda.');
    }
}