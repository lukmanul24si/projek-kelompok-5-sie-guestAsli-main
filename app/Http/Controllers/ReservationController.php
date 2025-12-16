<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class ReservationController extends Controller
{
    /**
     * 1. READ (INDEX) - Menampilkan Form Pencarian & Daftar Pesanan
     * Menerapkan: Search, Filter, Pagination, Repopulate Form (search input)
     */
    public function index(Request $request)
    {
        // Mengambil keyword pencarian (Email)
        $search_email = $request->input('search_email');
        
        // Default: Koleksi kosong (agar tidak menampilkan pesanan orang lain)
        $my_reservations = collect(); 

        // Filter & Search Logic
        if ($search_email) {
            $my_reservations = Reservation::where('email', $search_email)
                ->latest() // Filter: Urutkan dari yang terbaru
                ->paginate(5) // Pagination: 5 data per halaman
                ->withQueryString(); // Agar parameter search tidak hilang saat pindah halaman
        }

        // Kirim data ke view 'index'
        return view('koppee.reservation.index', compact('my_reservations'));
    }

    /**
     * 2. CREATE (FORM) - Menampilkan Form Buat Pesanan
     */
    public function create()
    {
        return view('koppee.reservation.create');
    }

    /**
     * 3. STORE (SIMPAN) - Menyimpan Pesanan Baru
     * Menerapkan: Validation, Redirect, Flash Message, Repopulate Form (via withInput)
     */
    public function store(Request $request)
    {
        // Validation Rules
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'date' => 'required',
            'time' => 'required',
            'quantity' => 'required',
        ], [
            // Custom Error Messages
            'name.required' => 'Nama pemesan wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'date.required' => 'Tanggal pengambilan wajib dipilih.',
        ]);

        try {
            $data = $request->all();
            
            // Manipulasi Data (Format Tanggal & Waktu)
            try { 
                $data['date'] = Carbon::createFromFormat('m/d/Y', $request->date)->format('Y-m-d'); 
            } catch (\Exception $e) {}
            
            try { 
                $data['time'] = Carbon::parse($request->time)->format('H:i:s'); 
            } catch (\Exception $e) {}

            $data['status'] = 'Menunggu Pembayaran'; // Default Status

            // Simpan ke Database
            Reservation::create($data);

            // Redirect dengan Flash Data (Success) & Parameter Search (agar langsung lihat hasil)
            return redirect()->route('reservation.index', ['search_email' => $request->email])
                ->with('success', 'Pesanan berhasil dibuat! Silakan cek daftar di bawah.');

        } catch (\Exception $e) {
            // Redirect dengan Flash Data (Error) & Repopulate Form
            return redirect()->back()
                ->withErrors(['msg' => 'Gagal menyimpan: ' . $e->getMessage()])
                ->withInput();
        }
    }

    /**
     * 4. EDIT (FORM) - Menampilkan Form Edit & Upload
     * Menerapkan: Repopulate Form (data lama ditampilkan)
     */
    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('koppee.reservation.edit', compact('reservation'));
    }

    /**
     * 5. UPDATE (SIMPAN PERUBAHAN) - Update Data & Upload File
     * Menerapkan: Validation, File Upload, Redirect, Flash Message
     */
    public function update(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);

        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
            // Validasi File Upload (Gambar, Max 2MB)
            'bukti_bayar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', 
        ]);

        $data = $request->only(['name', 'quantity']); // Hanya boleh edit nama & jumlah

        // Logika File Upload
        if ($request->hasFile('bukti_bayar')) {
            // Hapus file lama jika ada (agar tidak menumpuk sampah)
            if ($reservation->bukti_bayar && file_exists(public_path($reservation->bukti_bayar))) {
                unlink(public_path($reservation->bukti_bayar));
            }

            // Upload file baru
            $file = $request->file('bukti_bayar');
            $filename = time() . '_' . $file->getClientOriginalName(); // Rename unik
            $file->move(public_path('uploads/bukti_bayar'), $filename); // Simpan ke public/uploads/...
            
            $data['bukti_bayar'] = 'uploads/bukti_bayar/' . $filename;
            $data['status'] = 'Menunggu Konfirmasi Admin';
        }

        // Update Database
        $reservation->update($data);

        return redirect()->route('reservation.index', ['search_email' => $reservation->email])
            ->with('success', 'Pesanan berhasil diperbarui!');
    }

    /**
     * 6. DESTROY (HAPUS) - Membatalkan Pesanan
     * Menerapkan: Delete File, Delete Data, Flash Message
     */
    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $email = $reservation->email; // Simpan email untuk redirect nanti

        // Hapus file bukti bayar jika ada
        if ($reservation->bukti_bayar && file_exists(public_path($reservation->bukti_bayar))) {
            unlink(public_path($reservation->bukti_bayar));
        }

        // Hapus Data
        $reservation->delete();

        return redirect()->route('reservation.index', ['search_email' => $email])
            ->with('success', 'Pesanan berhasil dibatalkan.');
    }
}