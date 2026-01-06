@extends('layouts.app_template')

@section('content')
<div class="container-fluid page-header mb-5 position-relative overlay-bottom">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
        <h1 class="display-4 text-white text-uppercase">Daftar Mitra UMKM</h1>
        <div class="d-inline-flex text-white">
            <p class="m-0 text-uppercase"><a class="text-white" href="{{ url('/') }}">Beranda</a></p>
            <i class="fa fa-angle-double-right pt-1 px-3"></i>
            <p class="m-0 text-uppercase">List UMKM</p>
        </div>
    </div>
</div>
<div class="container-fluid pt-5">
    <div class="container">
        <div class="section-title text-center">
            <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Mitra UMKM</h4>
            <h1 class="display-4">Unit Usaha Wilayah Kami</h1>
<<<<<<< HEAD
            
            <div class="mt-4">
                @auth
                    @if(!Auth::user()->isSeller())
                        <div class="alert alert-info d-inline-block p-4 shadow-sm">
                            <h5 class="mb-3">Punya Usaha Sendiri?</h5>
                            <a href="{{ url('/daftar-umkm') }}" class="btn btn-secondary py-2 px-4 font-weight-bold">
                                <i class="fa fa-plus-circle mr-2"></i>Daftarkan UMKM Anda Sekarang
                            </a>
                        </div>
                    @else
                        <a href="{{ url('/my-shop') }}" class="btn btn-outline-primary py-2 px-4 font-weight-bold">
                            <i class="fa fa-store mr-2"></i>Kelola Toko Saya
                        </a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary py-2 px-4 font-weight-bold">
                        Login untuk Daftar UMKM
                    </a>
                @endauth
            </div>
=======
>>>>>>> 3acb0d8 (Menghubungkan projek lokal ke github)
        </div>

        <div class="row mt-5">
            @forelse($umkms as $u)
                <div class="col-lg-4 col-md-6 mb-5">
                    <div class="card bg-light border-0 shadow-sm">
                        <img class="card-img-top" src="{{ $u->logo ? asset('storage/'.$u->logo) : asset('assets/img/about.png') }}" alt="" style="height: 200px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h4 class="font-weight-bold mb-3">{{ $u->nama_usaha }}</h4>
                            <p class="text-muted small"><i class="fa fa-tag text-primary mr-1"></i> {{ $u->kategori }}</p>
                            <p class="mb-4">{{ Str::limit($u->deskripsi, 60) }}</p>
                            <a href="{{ url('/umkm/'.$u->umkm_id) }}" class="btn btn-primary font-weight-bold py-2 px-4">Lihat Produk</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="fa fa-store-slash fa-4x text-muted mb-3"></i>
                    <p class="lead text-muted">Belum ada UMKM yang terdaftar saat ini.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
<<<<<<< HEAD
@endsection
=======
@endsection
>>>>>>> 3acb0d8 (Menghubungkan projek lokal ke github)
