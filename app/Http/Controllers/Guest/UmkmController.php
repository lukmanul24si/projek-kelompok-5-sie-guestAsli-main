<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Umkm;
use App\Models\Produk;
use App\Models\UlasanProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UmkmController extends Controller
{
    /**
     * Menampilkan daftar semua UMKM (Lapak)
     */
    public function index()
    {
        $umkms = Umkm::all();
        return view('guest.umkm.index', compact('umkms'));
    }

    /**
     * Menampilkan detail satu UMKM beserta Produk dan Ulasannya
     */
    public function show($id)
    {
        // Eager Loading: Mengambil UMKM -> Produk -> Ulasan -> User (pemberi ulasan)
        $umkm = Umkm::with('produks.ulasans.user')->findOrFail($id);
        
        return view('guest.umkm.show', compact('umkm'));
    }

    /**
     * Menampilkan halaman galeri semua produk dari semua UMKM
     */
    public function allProducts()
    {
        // Mengambil produk yang statusnya tersedia saja
        $produks = Produk::with('umkm')->where('status', 'tersedia')->get();
        
        return view('guest.produk.all', compact('produks'));
    }

    /**
     * Menampilkan form pendaftaran UMKM baru
     */
    public function create()
    {
        return view('guest.umkm.create');
    }

    /**
     * Menyimpan data pendaftaran UMKM
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_usaha' => 'required|string|max:255',
            'kategori'   => 'required',
            'alamat'     => 'required',
            'kontak'     => 'required',
            'logo'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $umkm = new Umkm();
        $umkm->nama_usaha = $request->nama_usaha;
        $umkm->pemilik_warga_id = Auth::id(); // Menggunakan Facade Auth lebih aman
        $umkm->kategori = $request->kategori;
        $umkm->alamat = $request->alamat;
        $umkm->rt = $request->rt;
        $umkm->rw = $request->rw;
        $umkm->deskripsi = $request->deskripsi;
        $umkm->kontak = $request->kontak;
        
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('logos', 'public');
            $umkm->logo = $path;
        }

        $umkm->save();

        return redirect()->route('guest.umkm.index')->with('success', 'Selamat! UMKM Anda berhasil didaftarkan.');
    }

    /**
     * Menyimpan ulasan (rating dan komentar) untuk sebuah produk
     */
    public function storeUlasan(Request $request, $id)
    {
        $request->validate([
            'rating'   => 'required|integer|min:1|max:5',
            'komentar' => 'required|string|min:5|max:1000',
        ]);

        UlasanProduk::create([
            'produk_id' => $id,
            'user_id'   => Auth::id(),
            'rating'    => $request->rating,
            'komentar'  => $request->komentar,
        ]);

        return redirect()->back()->with('success', 'Terima kasih atas ulasan Anda!');
    }
}