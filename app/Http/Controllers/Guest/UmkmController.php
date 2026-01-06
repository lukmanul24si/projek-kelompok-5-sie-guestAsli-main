<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Umkm;
use App\Models\Produk;
use App\Models\UlasanProduk;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UmkmController extends Controller
{
    // --- FITUR PUBLIK ---

    public function index()
    {
        $umkms = Umkm::all();
        return view('guest.umkm.index', compact('umkms'));
    }

    public function show($id)
    {
        // Menggunakan relasi yang konsisten (sesuaikan dengan model Umkm Anda)
        $umkm = Umkm::with('produks.ulasans.user')->findOrFail($id);
        return view('guest.umkm.show', compact('umkm'));
    }

    public function allProducts()
    {
        // Mengambil produk dengan status 'tersedia' atau 'aktif'
        $produks = Produk::with('umkm')
            ->whereIn('status', ['tersedia', 'aktif'])
            ->get();
        return view('guest.produk.all', compact('produks'));
    }

    // --- FITUR PENDAFTARAN UMKM ---

    public function create()
    {
        if(Umkm::where('pemilik_warga_id', Auth::id())->exists()){
            return redirect()->route('guest.shop.index')->with('warning', 'Anda sudah memiliki toko.');
        }
        return view('guest.umkm.create');
    }

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
        $umkm->pemilik_warga_id = Auth::id();
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

    // --- FITUR EDIT PROFIL UMKM ---

    public function edit()
    {
        $umkm = Umkm::where('pemilik_warga_id', Auth::id())->firstOrFail();
        return view('guest.umkm.edit', compact('umkm'));
    }

    public function update(Request $request)
    {
        $umkm = Umkm::where('pemilik_warga_id', Auth::id())->firstOrFail();

        $request->validate([
            'nama_usaha' => 'required|string|max:255',
            'kategori'   => 'required',
            'alamat'     => 'required',
            'kontak'     => 'required',
            'logo'       => 'nullable|image|max:2048',
        ]);

        $umkm->nama_usaha = $request->nama_usaha;
        $umkm->kategori   = $request->kategori;
        $umkm->alamat     = $request->alamat;
        $umkm->rt         = $request->rt;
        $umkm->rw         = $request->rw;
        $umkm->deskripsi  = $request->deskripsi;
        $umkm->kontak     = $request->kontak;

        if ($request->hasFile('logo')) {
            if ($umkm->logo && Storage::disk('public')->exists($umkm->logo)) {
                Storage::disk('public')->delete($umkm->logo);
            }
            $path = $request->file('logo')->store('logos', 'public');
            $umkm->logo = $path;
        }

        $umkm->save();

        return redirect()->route('guest.umkm.show', $umkm->umkm_id)->with('success', 'Profil UMKM berhasil diperbarui!');
    }

    // --- FITUR CRUD ULASAN ---

    public function storeUlasan(Request $request, $id)
    {
        $request->validate([
            'rating'   => 'required|integer|min:1|max:5',
            'komentar' => 'required|string|min:5|max:1000',
        ]);

        UlasanProduk::create([
            'produk_id' => $id,
            'user_id'   => Auth::id(), // Menggunakan user_id agar lebih sederhana
            'rating'    => $request->rating,
            'komentar'  => $request->komentar,
        ]);

        return redirect()->back()->with('success', 'Terima kasih atas ulasan Anda!');
    }

    public function editUlasan($id)
    {
        $ulasan = UlasanProduk::with('produk')->findOrFail($id);

        if ($ulasan->user_id != Auth::id()) {
            return redirect()->back()->with('error', 'Akses ditolak.');
        }

        return view('guest.umkm.edit_ulasan', compact('ulasan'));
    }

    public function updateUlasan(Request $request, $id)
    {
        $request->validate([
            'rating'   => 'required|integer|min:1|max:5',
            'komentar' => 'required|string|max:1000',
        ]);

        $ulasan = UlasanProduk::findOrFail($id);

        if ($ulasan->user_id != Auth::id()) {
            abort(403);
        }

        $ulasan->update([
            'rating'   => $request->rating,
            'komentar' => $request->komentar,
        ]);

        return redirect()->route('guest.umkm.show', $ulasan->produk->umkm_id)
                         ->with('success', 'Ulasan berhasil diperbarui!');
    }

    public function destroyUlasan($id)
    {
        $ulasan = UlasanProduk::findOrFail($id);

        if ($ulasan->user_id != Auth::id()) {
            abort(403);
        }

        $ulasan->delete();

        return redirect()->back()->with('success', 'Ulasan berhasil dihapus.');
    }
}