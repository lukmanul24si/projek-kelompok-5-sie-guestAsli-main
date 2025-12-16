@extends('layouts.app_template')

@section('content')
<div class="container-fluid page-header mb-5 position-relative overlay-bottom">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
        <h1 class="display-4 text-white text-uppercase">Kelola Toko Saya</h1>
        <h3 class="text-primary font-weight-medium m-0">{{ $umkm->nama_usaha }}</h3>
    </div>
</div>
<div class="container-fluid py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="display-4">Daftar Produk</h1>
            <a href="{{ route('guest.shop.product.create') }}" class="btn btn-primary font-weight-bold py-3 px-5 shadow">
                <i class="fa fa-plus mr-2"></i>Tambah Produk Baru
            </a>
        </div>

        <div class="row">
            {{-- Mulai Loop Produk --}}
            @forelse($produks as $p)
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card border-0 shadow-sm text-center h-100">
                        <img src="{{ $p->foto_produk ? asset('storage/'.$p->foto_produk) : asset('assets/img/menu-1.jpg') }}" 
                             class="card-img-top" alt="..." style="height: 180px; object-fit: cover;">
                        
                        <div class="card-body d-flex flex-column">
                            <h5 class="font-weight-bold">{{ $p->nama_produk }}</h5>
                            <p class="text-primary font-weight-bold mb-1">Rp {{ number_format($p->harga, 0, ',', '.') }}</p>
                            <p class="small text-muted mb-3">Stok: {{ $p->stok }}</p>
                            
                            <hr class="mt-auto">
                            
                            <div class="d-flex justify-content-around">
                                {{-- Tombol Edit (Di dalam loop, jadi $p aman) --}}
                                <a href="{{ route('guest.shop.product.edit', $p->produk_id) }}" class="text-warning font-weight-bold">
                                    <i class="fa fa-edit"></i> Edit
                                </a>

                                {{-- Tombol Hapus --}}
                                <form action="{{ route('guest.shop.product.destroy', $p->produk_id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="border-0 bg-transparent text-danger font-weight-bold" style="cursor: pointer;">
                                        <i class="fa fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                {{-- Jika Produk Kosong --}}
                <div class="col-12 text-center py-5">
                    <i class="fa fa-box-open fa-4x text-muted mb-3"></i>
                    <p class="lead text-muted">Anda belum memiliki produk. Mari tambahkan produk pertama Anda!</p>
                </div>
            @endforelse
            {{-- Selesai Loop Produk --}}
        </div>
    </div>
</div>
@endsection