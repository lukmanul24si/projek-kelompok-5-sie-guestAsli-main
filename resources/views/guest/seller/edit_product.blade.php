@extends('layouts.app_template')

@section('content')
<div class="container-fluid page-header mb-5 position-relative overlay-bottom">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
        <h1 class="display-4 text-white text-uppercase">Edit Produk</h1>
        <h3 class="text-primary font-weight-medium m-0">{{ $produk->nama_produk }}</h3>
    </div>
</div>

<div class="container-fluid py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="bg-light p-5 shadow-sm rounded">
                    <form action="{{ route('guest.shop.product.update', $produk->produk_id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') {{-- PENTING: Untuk update gunakan PUT --}}
                        
                        <div class="form-group mb-4">
                            <label class="font-weight-bold">Nama Produk</label>
                            <input type="text" name="nama_produk" class="form-control p-4" value="{{ $produk->nama_produk }}" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group mb-4">
                                <label class="font-weight-bold">Harga (Rp)</label>
                                <input type="number" name="harga" class="form-control p-4" value="{{ $produk->harga }}" required>
                            </div>
                            <div class="col-md-6 form-group mb-4">
                                <label class="font-weight-bold">Stok</label>
                                <input type="number" name="stok" class="form-control p-4" value="{{ $produk->stok }}" required>
                            </div>
                        </div>

                        <div class="form-group mb-4">
                            <label class="font-weight-bold">Deskripsi Produk</label>
                            <textarea name="description" class="form-control p-4" rows="4">{{ $produk->deskripsi }}</textarea>
                        </div>

                        <div class="form-group mb-5">
                            <label class="font-weight-bold">Foto Produk (Biarkan kosong jika tidak ingin ganti)</label>
                            @if($produk->foto_produk)
                                <div class="mb-3">
                                    <img src="{{ asset('storage/'.$produk->foto_produk) }}" width="100" class="img-thumbnail">
                                </div>
                            @endif
                            <input type="file" name="foto" class="form-control-file">
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('guest.shop.index') }}" class="btn btn-outline-secondary py-3 px-5">Batal</a>
                            <button type="submit" class="btn btn-primary py-3 px-5 font-weight-bold">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection