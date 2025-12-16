@extends('layouts.app_template')

@section('content')

<style>
    /* 1. Menyembunyikan Navbar/Header Utama Template */
    header, nav, .header-area, .navbar-area, .main-menu {
        display: none !important;
    }

    /* 2. Menyembunyikan Footer (Opsional, agar benar-benar bersih) */
    footer, .footer-area, .copyright-area {
        display: none !important;
    }

    /* 3. Memberikan background yang bersih dan jarak */
    body {
        background-color: #f4f6f9; /* Warna abu muda lembut */
    }
    .clean-layout-container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
</style>

<div class="clean-layout-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                
                <div class="mb-3">
                    <a href="{{ route('guest.shop.index') }}" class="btn btn-outline-secondary btn-sm">
                        <i class="fa fa-arrow-left mr-1"></i> Kembali ke Dashboard
                    </a>
                </div>

                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-header bg-warning text-white text-center py-3">
                        <h4 class="mb-0 font-weight-bold" style="color: #fff;">
                            <i class="fa fa-store mr-2"></i>Edit Profil Toko
                        </h4>
                    </div>

                    <div class="card-body p-5">
                        <form action="{{ route('guest.shop.umkm.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="text-center mb-5">
                                <label class="d-block font-weight-bold text-muted mb-3">Logo Toko</label>
                                <div class="position-relative d-inline-block">
                                    @if($umkm->logo)
                                        <img src="{{ asset('storage/'.$umkm->logo) }}" class="img-thumbnail rounded-circle shadow-sm" style="width: 130px; height: 130px; object-fit: cover;">
                                    @else
                                        <img src="{{ asset('assets/img/about.png') }}" class="img-thumbnail rounded-circle shadow-sm" style="width: 130px; height: 130px; object-fit: cover;">
                                    @endif
                                    
                                    <div class="mt-3">
                                        <input type="file" name="logo" class="form-control-file text-center mx-auto" style="font-size: 0.8rem;">
                                    </div>
                                </div>
                            </div>

                            <hr class="my-4">

                            <div class="form-group">
                                <label class="font-weight-bold">Nama Usaha <span class="text-danger">*</span></label>
                                <input type="text" name="nama_usaha" class="form-control form-control-lg bg-light" value="{{ old('nama_usaha', $umkm->nama_usaha) }}" required placeholder="Contoh: Keripik Pedas Mantap">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Kategori Usaha <span class="text-danger">*</span></label>
                                <select name="kategori" class="form-control form-control-lg bg-light" required>
                                    <option value="Makanan" {{ $umkm->kategori == 'Makanan' ? 'selected' : '' }}>Makanan</option>
                                    <option value="Minuman" {{ $umkm->kategori == 'Minuman' ? 'selected' : '' }}>Minuman</option>
                                    <option value="Kerajinan" {{ $umkm->kategori == 'Kerajinan' ? 'selected' : '' }}>Kerajinan</option>
                                    <option value="Jasa" {{ $umkm->kategori == 'Jasa' ? 'selected' : '' }}>Jasa</option>
                                    <option value="Lainnya" {{ $umkm->kategori == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Nomor WhatsApp <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white"><i class="fa fa-whatsapp"></i></span>
                                    </div>
                                    <input type="text" name="kontak" class="form-control form-control-lg bg-light" value="{{ old('kontak', $umkm->kontak) }}" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Alamat Lengkap <span class="text-danger">*</span></label>
                                <textarea name="alamat" class="form-control bg-light" rows="3" required>{{ old('alamat', $umkm->alamat) }}</textarea>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label class="font-weight-bold">RT</label>
                                    <input type="text" name="rt" class="form-control bg-light" value="{{ old('rt', $umkm->rt) }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="font-weight-bold">RW</label>
                                    <input type="text" name="rw" class="form-control bg-light" value="{{ old('rw', $umkm->rw) }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Deskripsi Singkat</label>
                                <textarea name="deskripsi" class="form-control bg-light" rows="4">{{ old('deskripsi', $umkm->deskripsi) }}</textarea>
                            </div>

                            <div class="d-grid gap-2 mt-5">
                                <button type="submit" class="btn btn-warning btn-block btn-lg text-white font-weight-bold shadow-sm">
                                    <i class="fa fa-save mr-2"></i> Simpan Perubahan
                                </button>
                                <a href="{{ route('guest.shop.index') }}" class="btn btn-light btn-block mt-3 text-muted">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection