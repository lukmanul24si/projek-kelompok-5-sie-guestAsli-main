<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Umkm;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SellerController extends Controller
{
    public function index()
    {
        $umkm = Auth::user()->umkm;
        if (!$umkm) {
            return redirect()->route('guest.umkm.create')->with('error', 'Silakan daftarkan UMKM Anda terlebih dahulu.');
        }
        $produks = $umkm->produks; 
        return view('guest.seller.index', compact('umkm', 'produks'));
    }

    public function createProduct()
    {
        return view('guest.seller.create_product');
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $umkm = Auth::user()->umkm;

        $produk = new Produk();
        $produk->umkm_id = $umkm->umkm_id;
        $produk->nama_produk = $request->nama_produk;
        $produk->deskripsi = $request->deskripsi;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;

        if ($request->hasFile('foto')) {
            $produk->foto_produk = $request->file('foto')->store('produk', 'public');
        }

        $produk->save();
        return redirect()->route('guest.shop.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    // --- FITUR BARU: EDIT ---
    public function editProduct($id)
    {
        // Pastikan produk yang diedit adalah milik UMKM si user yang login
        $produk = Produk::where('produk_id', $id)
                        ->where('umkm_id', Auth::user()->umkm->umkm_id)
                        ->firstOrFail();

        return view('guest.seller.edit_product', compact('produk'));
    }

    // --- FITUR BARU: UPDATE ---
    public function updateProduct(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'foto' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $produk->nama_produk = $request->nama_produk;
        $produk->deskripsi = $request->deskripsi;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($produk->foto_produk) {
                Storage::disk('public')->delete($produk->foto_produk);
            }
            $produk->foto_produk = $request->file('foto')->store('produk', 'public');
        }

        $produk->save();
        return redirect()->route('guest.shop.index')->with('success', 'Produk berhasil diperbarui!');
    }

    // --- FITUR BARU: DELETE ---
    public function destroyProduct($id)
    {
        $produk = Produk::findOrFail($id);
        
        // Hapus file foto dari storage
        if ($produk->foto_produk) {
            Storage::disk('public')->delete($produk->foto_produk);
        }

        $produk->delete();
        return redirect()->route('guest.shop.index')->with('success', 'Produk berhasil dihapus!');
    }
}