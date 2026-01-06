<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Umkm;
use App\Models\Produk;
use App\Models\UlasanProduk;
<<<<<<< HEAD
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; // Tambahkan ini untuk hapus foto
=======
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; // Tambahkan ini untuk hapus foto
use Illuminate\Support\Str;
>>>>>>> 3acb0d8 (Menghubungkan projek lokal ke github)

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
<<<<<<< HEAD
        $umkm = Umkm::with('produks.ulasans.user')->findOrFail($id);
=======
        $umkm = Umkm::with('produks.ulasans.warga')->findOrFail($id);
>>>>>>> 3acb0d8 (Menghubungkan projek lokal ke github)
        return view('guest.umkm.show', compact('umkm'));
    }

    public function allProducts()
    {
<<<<<<< HEAD
        $produks = Produk::with('umkm')->where('status', 'tersedia')->get();
=======
        $produks = Produk::with('umkm')->where('status', 'aktif')->get();
>>>>>>> 3acb0d8 (Menghubungkan projek lokal ke github)
        return view('guest.produk.all', compact('produks'));
    }

    // --- FITUR PENDAFTARAN UMKM (CREATE & STORE) ---

    public function create()
    {
        // Cek jika user sudah punya UMKM, langsung arahkan ke dashboard toko
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
<<<<<<< HEAD
        
=======

>>>>>>> 3acb0d8 (Menghubungkan projek lokal ke github)
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('logos', 'public');
            $umkm->logo = $path;
        }

        $umkm->save();

        return redirect()->route('guest.umkm.index')->with('success', 'Selamat! UMKM Anda berhasil didaftarkan.');
    }

    // --- FITUR EDIT PROFIL UMKM (BARU) ---

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

        // Cek update logo
        if ($request->hasFile('logo')) {
            // Hapus logo lama jika ada
            if ($umkm->logo && Storage::disk('public')->exists($umkm->logo)) {
                Storage::disk('public')->delete($umkm->logo);
            }
            $path = $request->file('logo')->store('logos', 'public');
            $umkm->logo = $path;
        }

        $umkm->save();

        return redirect()->route('guest.umkm.show', $umkm->umkm_id)->with('success', 'Profil UMKM berhasil diperbarui!');
    }

    // --- FITUR CRUD ULASAN (BARU) ---

    public function storeUlasan(Request $request, $id)
    {
        $request->validate([
            'rating'   => 'required|integer|min:1|max:5',
            'komentar' => 'required|string|min:5|max:1000',
        ]);

<<<<<<< HEAD
        UlasanProduk::create([
            'produk_id' => $id,
            'user_id'   => Auth::id(),
=======
        $warga = Warga::firstOrCreate(
            ['email' => Auth::user()->email],
            [
                'no_ktp'        => Str::padLeft((string) Auth::id(), 16, '0'),
                'nama'          => Auth::user()->first_name,
                'jenis_kelamin' => 'Laki-laki',
                'agama'         => 'Islam',
            ]
        );

        UlasanProduk::create([
            'produk_id' => $id,
            'warga_id'  => $warga->warga_id,
>>>>>>> 3acb0d8 (Menghubungkan projek lokal ke github)
            'rating'    => $request->rating,
            'komentar'  => $request->komentar,
        ]);

        return redirect()->back()->with('success', 'Terima kasih atas ulasan Anda!');
    }

    public function editUlasan($id)
    {
        $ulasan = UlasanProduk::with('produk')->findOrFail($id);

<<<<<<< HEAD
        if ($ulasan->user_id != Auth::id()) {
=======
        $warga = Warga::firstOrCreate(
            ['email' => Auth::user()->email],
            [
                'no_ktp'        => Str::padLeft((string) Auth::id(), 16, '0'),
                'nama'          => Auth::user()->first_name,
                'jenis_kelamin' => 'Laki-laki',
                'agama'         => 'Islam',
            ]
        );

        if ($ulasan->warga_id != $warga->warga_id) {
>>>>>>> 3acb0d8 (Menghubungkan projek lokal ke github)
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

<<<<<<< HEAD
        if ($ulasan->user_id != Auth::id()) {
=======
        $warga = Warga::firstOrCreate(
            ['email' => Auth::user()->email],
            [
                'no_ktp'        => Str::padLeft((string) Auth::id(), 16, '0'),
                'nama'          => Auth::user()->first_name,
                'jenis_kelamin' => 'Laki-laki',
                'agama'         => 'Islam',
            ]
        );

        if ($ulasan->warga_id != $warga->warga_id) {
>>>>>>> 3acb0d8 (Menghubungkan projek lokal ke github)
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

<<<<<<< HEAD
        if ($ulasan->user_id != Auth::id()) {
=======
        $warga = Warga::firstOrCreate(
            ['email' => Auth::user()->email],
            [
                'no_ktp'        => Str::padLeft((string) Auth::id(), 16, '0'),
                'nama'          => Auth::user()->first_name,
                'jenis_kelamin' => 'Laki-laki',
                'agama'         => 'Islam',
            ]
        );

        if ($ulasan->warga_id != $warga->warga_id) {
>>>>>>> 3acb0d8 (Menghubungkan projek lokal ke github)
            abort(403);
        }

        $ulasan->delete();

        return redirect()->back()->with('success', 'Ulasan berhasil dihapus.');
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> 3acb0d8 (Menghubungkan projek lokal ke github)
