@extends('layouts.app_template')

@section('content')
<div class="container-fluid page-header mb-5 position-relative overlay-bottom">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
        <h1 class="display-4 text-white text-uppercase">Menu Produk UMKM</h1>
        <div class="d-inline-flex text-white">
            <p class="m-0 text-uppercase"><a class="text-white" href="{{ url('/') }}">Beranda</a></p>
            <i class="fa fa-angle-double-right pt-1 px-3"></i>
            <p class="m-0 text-uppercase">Semua Produk</p>
        </div>
    </div>
</div>
<div class="container-fluid pt-5">
    <div class="container">
        <div class="section-title">
            <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Produk Unggulan</h4>
            <h1 class="display-4">Jelajahi Produk Lokal Terbaik</h1>
        </div>
        
        <div class="row">
            @forelse($produks as $p)
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card border-0 shadow-sm">
                    <div class="position-relative">
                        <img class="card-img-top" src="{{ $p->foto_produk ? asset('storage/'.$p->foto_produk) : asset('assets/img/menu-1.jpg') }}" alt="" style="height: 200px; object-fit: cover;">
                        <div class="position-absolute bg-primary text-white py-1 px-3" style="top: 0; right: 0;">
                            Rp {{ number_format($p->harga, 0, ',', '.') }}
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="font-weight-bold mb-1">{{ $p->nama_produk }}</h5>
                        <p class="text-muted small mb-2">Dijual oleh: <strong>{{ $p->umkm->nama_usaha }}</strong></p>
                        
                        <form action="{{ route('cart.add', $p->produk_id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-block font-weight-bold">
                                <i class="fa fa-shopping-cart mr-2"></i>Tambah ke Keranjang
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center py-5">
                <i class="fa fa-box-open fa-4x text-muted mb-3"></i>
                <p class="lead">Belum ada produk tersedia saat ini.</p>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection