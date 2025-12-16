<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\DetailPesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    // Menampilkan isi keranjang
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('guest.cart.index', compact('cart'));
    }

    // Menambah produk ke keranjang
    public function add($id)
    {
        $produk = Produk::findOrFail($id);
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "produk_id" => $produk->produk_id,
                "name" => $produk->nama_produk,
                "quantity" => 1,
                "price" => $produk->harga,
                "image" => $produk->foto_produk
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Produk berhasil masuk keranjang!');
    }

    // Menghapus item dari keranjang
    public function remove($id)
    {
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Produk dihapus dari keranjang.');
    }

    // Proses Checkout (Pindah dari Session ke Database)
    public function checkout(Request $request)
    {
        $cart = session()->get('cart');

        if (!$cart) {
            return redirect()->route('guest.umkm.index')->with('error', 'Keranjang Anda kosong!');
        }

        // Gunakan Transaction agar data aman (jika satu gagal, semua batal)
        DB::transaction(function () use ($cart) {
            $total = 0;
            foreach ($cart as $item) {
                $total += $item['price'] * $item['quantity'];
            }

            // 1. Simpan ke tabel pesanans
            $pesanan = Pesanan::create([
                'user_id' => Auth::id(),
                'total_harga' => $total,
                'status_pembayaran' => 'pending'
            ]);

            // 2. Simpan setiap item ke detail_pesanans
            foreach ($cart as $id => $details) {
                DetailPesanan::create([
                    'pesanan_id' => $pesanan->pesanan_id,
                    'produk_id'  => $id,
                    'jumlah'     => $details['quantity'],
                    'subtotal'   => $details['price'] * $details['quantity']
                ]);
            }
        });

        // 3. Kosongkan keranjang
        session()->forget('cart');

        return redirect()->route('guest.orders.history')->with('success', 'Checkout berhasil! Pesanan Anda sedang diproses.');
    }

    // Menampilkan riwayat pesanan user
    public function history()
{
    // Mengambil pesanan milik user yang login
    // details.produk artinya: ambil rincian pesanan DAN data produknya sekaligus
    $pesanans = Pesanan::where('user_id', Auth::id())
                ->with('details.produk') 
                ->orderBy('created_at', 'desc')
                ->get();

    return view('guest.cart.history', compact('pesanans'));
}
}