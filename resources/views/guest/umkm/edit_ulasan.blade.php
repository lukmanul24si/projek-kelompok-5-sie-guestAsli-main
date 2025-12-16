@extends('layouts.app_template')

@section('content')

<style>
    /* 1. Menyembunyikan Navbar & Header */
    header, nav, .header-area, .navbar-area, .main-menu {
        display: none !important;
    }

    /* 2. Menyembunyikan Footer */
    footer, .footer-area, .copyright-area {
        display: none !important;
    }

    /* 3. Layout Bersih & Fokus */
    body {
        background-color: #f4f6f9;
    }
    .clean-layout-container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 15px;
    }
</style>

<div class="clean-layout-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                
                <div class="mb-3">
                    <a href="{{ route('guest.orders.history') }}" class="btn btn-outline-secondary btn-sm">
                        <i class="fa fa-arrow-left mr-1"></i> Kembali ke Riwayat
                    </a>
                </div>

                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header bg-info text-white text-center py-3">
                        <h5 class="mb-0 font-weight-bold" style="color: white;">
                            <i class="fa fa-edit mr-2"></i>Edit Ulasan Produk
                        </h5>
                    </div>

                    <div class="card-body p-4">
                        
                        <div class="d-flex align-items-center mb-4 p-3 bg-light rounded border">
                            <div class="rounded mr-3 bg-secondary d-flex align-items-center justify-content-center text-white" style="width: 50px; height: 50px; font-size: 20px;">
                                <i class="fa fa-box"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block">Produk:</small>
                                <h6 class="font-weight-bold mb-0 text-dark">
                                    {{ $ulasan->produk->nama_produk ?? 'Produk' }}
                                </h6>
                            </div>
                        </div>

                        <form action="{{ route('ulasan.update', $ulasan->ulasan_id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">Beri Bintang (Rating)</label>
                                <select name="rating" class="form-control form-control-lg" required>
                                    <option value="5" {{ $ulasan->rating == 5 ? 'selected' : '' }}>⭐⭐⭐⭐⭐ (Sangat Puas)</option>
                                    <option value="4" {{ $ulasan->rating == 4 ? 'selected' : '' }}>⭐⭐⭐⭐ (Puas)</option>
                                    <option value="3" {{ $ulasan->rating == 3 ? 'selected' : '' }}>⭐⭐⭐ (Cukup)</option>
                                    <option value="2" {{ $ulasan->rating == 2 ? 'selected' : '' }}>⭐⭐ (Kurang)</option>
                                    <option value="1" {{ $ulasan->rating == 1 ? 'selected' : '' }}>⭐ (Sangat Kurang)</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Ulasan Anda</label>
                                <textarea name="komentar" class="form-control bg-light" rows="4" placeholder="Bagaimana pengalaman Anda menggunakan produk ini?" required>{{ old('komentar', $ulasan->komentar) }}</textarea>
                            </div>

                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" class="btn btn-info btn-block btn-lg text-white font-weight-bold shadow-sm">
                                    <i class="fa fa-paper-plane mr-1"></i> Update Ulasan
                                </button>
                                <a href="{{ route('guest.orders.history') }}" class="btn btn-light btn-block mt-2">Batal</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection