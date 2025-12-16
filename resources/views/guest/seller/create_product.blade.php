@extends('layouts.app_template')

@section('content')
<div class="container-fluid page-header mb-5 position-relative overlay-bottom">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
        <h1 class="display-4 text-white text-uppercase">Tambah Produk Baru</h1>
        <div class="d-inline-flex text-white">
            <p class="m-0 text-uppercase"><a class="text-white" href="{{ route('guest.shop.index') }}">Toko Saya</a></p>
            <i class="fa fa-angle-double-right pt-1 px-3"></i>
            <p class="m-0 text-uppercase">Tambah Produk</p>
        </div>
    </div>
</div>
<div class="container-fluid py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="bg-light p-5 shadow-sm rounded">
                    <form action="{{ route('guest.shop.product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group mb-4">
                            <label class="font-weight-bold">Nama Produk</label>
                            <input type="text" name="nama_produk" class="form-control p-4" placeholder="Contoh: Risoles Mayo Spesial" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group mb-4">
                                <label class="font-weight-bold">Harga (Rp)</label>
                                <input type="number" name="harga" class="form-control p-4" placeholder="Contoh: 15000" required>
                            </div>
                            <div class="col-md-6 form-group mb-4">
                                <label class="font-weight-bold">Stok Awal</label>
                                <input type="number" name="stok" class="form-control p-4" placeholder="Contoh: 50" required>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label class="font-weight-bold">Deskripsi Produk</label>
                            <textarea name="deskripsi" class="form-control p-4" rows="4" placeholder="Jelaskan keunggulan produk Anda..."></textarea>
                        </div>

                        <div class="form-group mb-5">
                            <label class="font-weight-bold">Foto Produk</label>
                            <div class="custom-file">
                                <input type="file" name="foto" class="custom-file-input" id="inputGroupFile01">
                                <label class="custom-file-label" for="inputGroupFile01">Pilih Gambar</label>
                            </div>
                            <small class="text-muted">Format: JPG, PNG, JPEG. Maks: 2MB</small>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('guest.shop.index') }}" class="btn btn-outline-secondary py-3 px-5">Batal</a>
                            <button type="submit" class="btn btn-primary py-3 px-5 font-weight-bold">Simpan Produk</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection