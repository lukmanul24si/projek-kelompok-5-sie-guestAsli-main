<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UlasanProduk;
use Illuminate\Support\Facades\Auth;

class UlasanProdukController extends Controller
{
    public function index()
    {
        if (!Auth::check() || Auth::user()->role !== 'Super Admin') {
            abort(403);
        }

        $ulasans = UlasanProduk::with('produk', 'warga')->orderByDesc('created_at')->get();

        return view('admin.ulasan.index', compact('ulasans'));
    }
}
