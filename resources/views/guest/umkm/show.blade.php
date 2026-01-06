@extends('layouts.app_template')

@section('content')
<div class="container-fluid page-header mb-5 position-relative overlay-bottom">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
        <h1 class="display-4 text-white text-uppercase">{{ $umkm->nama_usaha }}</h1>
        <div class="d-inline-flex text-white">
            <p class="m-0 text-uppercase"><a class="text-white" href="{{ route('guest.umkm.index') }}">Daftar UMKM</a></p>
            <i class="fa fa-angle-double-right pt-1 px-3"></i>
            <p class="m-0 text-uppercase">Detail Toko</p>
        </div>
    </div>
</div>
<div class="container-fluid py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-5">
                <div class="bg-light p-5 shadow-sm rounded border-top border-primary" style="border-width: 5px !important;">
                    <div class="text-center mb-4">
<<<<<<< HEAD
                        <img src="{{ $umkm->logo ? asset('storage/'.$umkm->logo) : asset('assets/img/about.png') }}" 
=======
                        <img src="{{ $umkm->logo ? asset('storage/'.$umkm->logo) : asset('assets/img/about.png') }}"
>>>>>>> 3acb0d8 (Menghubungkan projek lokal ke github)
                             class="img-fluid rounded-circle shadow-sm border" style="width: 150px; height: 150px; object-fit: cover;">
                    </div>
                    <h3 class="font-weight-bold text-center mb-4">{{ $umkm->nama_usaha }}</h3>
                    <hr>
<<<<<<< HEAD
                    
=======

>>>>>>> 3acb0d8 (Menghubungkan projek lokal ke github)
                    <div class="mb-4">
                        <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 2px;">Informasi Toko</h5>
                        <p><i class="fa fa-tag text-primary mr-3"></i><strong>Kategori:</strong><br><span class="ml-4">{{ $umkm->kategori }}</span></p>
                        <p><i class="fa fa-map-marker-alt text-primary mr-3"></i><strong>Alamat:</strong><br><span class="ml-4">RT {{ $umkm->rt }} / RW {{ $umkm->rw }}, {{ $umkm->alamat }}</span></p>
                        <p><i class="fa fa-info-circle text-primary mr-3"></i><strong>Deskripsi:</strong><br><span class="ml-4">{{ $umkm->deskripsi ?? 'Tidak ada deskripsi.' }}</span></p>
                    </div>

                    <div class="mb-4">
                        <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 2px;">Kontak Langsung</h5>
                        <p><i class="fa fa-phone-alt text-primary mr-3"></i><strong>WhatsApp:</strong><br><span class="ml-4">{{ $umkm->kontak }}</span></p>
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $umkm->kontak) }}" target="_blank" class="btn btn-success btn-block font-weight-bold mt-3 shadow-sm">
                            <i class="fab fa-whatsapp fa-lg mr-2"></i>Chat Penjual Sekarang
                        </a>

                        @if(Auth::check() && Auth::user()->id == $umkm->pemilik_warga_id)
                            <a href="{{ route('guest.shop.umkm.edit') }}" class="btn btn-warning btn-block font-weight-bold mt-3 text-white">
                                <i class="fa fa-edit mr-2"></i>Edit Profil Toko
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="section-title text-left mb-4">
                    <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Katalog</h4>
                    <h1 class="display-5">Produk Tersedia</h1>
                </div>

                <div class="row">
                    @forelse($umkm->produks as $p)
                        <div class="col-md-12 mb-5">
                            <div class="card border-0 shadow-sm overflow-hidden">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
<<<<<<< HEAD
                                        <img src="{{ $p->foto_produk ? asset('storage/'.$p->foto_produk) : asset('assets/img/menu-1.jpg') }}" 
=======
                                        <img src="{{ $p->foto_produk ? asset('storage/'.$p->foto_produk) : asset('assets/img/menu-1.jpg') }}"
>>>>>>> 3acb0d8 (Menghubungkan projek lokal ke github)
                                               class="card-img h-100" alt="{{ $p->nama_produk }}" style="object-fit: cover; min-height: 200px;">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between align-items-start">
                                                <h4 class="font-weight-bold">{{ $p->nama_produk }}</h4>
                                                <h5 class="text-primary font-weight-bold">Rp {{ number_format($p->harga, 0, ',', '.') }}</h5>
                                            </div>
                                            <p class="text-muted small">{{ $p->deskripsi }}</p>
<<<<<<< HEAD
                                            <p class="small mb-3">
=======
                                            <p class="small mb-0">
>>>>>>> 3acb0d8 (Menghubungkan projek lokal ke github)
                                                <span class="badge badge-{{ $p->stok > 0 ? 'success' : 'danger' }} px-3 py-2">
                                                    Stok: {{ $p->stok }}
                                                </span>
                                            </p>
<<<<<<< HEAD
                                            
                                            @if($p->stok > 0)
                                                <form action="{{ route('cart.add', $p->produk_id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary font-weight-bold px-4">
                                                        <i class="fa fa-shopping-cart mr-2"></i>Tambah ke Keranjang
                                                    </button>
                                                </form>
                                            @endif
=======
>>>>>>> 3acb0d8 (Menghubungkan projek lokal ke github)
                                        </div>
                                    </div>
                                </div>

                                <div class="card-footer bg-white border-top-0 p-4">
                                    <button class="btn btn-link text-primary p-0 mb-3" type="button" data-toggle="collapse" data-target="#review-{{ $p->produk_id }}">
                                        <i class="fa fa-comments mr-2"></i> Lihat Ulasan ({{ $p->ulasans->count() }})
                                    </button>

                                    <div class="collapse" id="review-{{ $p->produk_id }}">
                                        @foreach($p->ulasans as $ulasan)
                                            <div class="media mb-3 p-3 bg-light rounded">
                                                <img src="{{ asset('assets/img/user.png') }}" class="mr-3 rounded-circle" style="width: 40px; height: 40px;">
                                                <div class="media-body">
                                                    <div class="d-flex justify-content-between align-items-center">
<<<<<<< HEAD
                                                        <h6 class="mt-0 mb-1 font-weight-bold">{{ $ulasan->user->first_name }}</h6>
                                                        
                                                        @if(Auth::check() && Auth::id() == $ulasan->user_id)
=======
                                                        <h6 class="mt-0 mb-1 font-weight-bold">{{ optional($ulasan->warga)->nama }}</h6>

                                                        @php
                                                            $currentWarga = null;
                                                            if(Auth::check()) {
                                                                $currentWarga = \App\Models\Warga::where('email', Auth::user()->email)->first();
                                                            }
                                                        @endphp
                                                        @if($currentWarga && $currentWarga->warga_id === $ulasan->warga_id)
>>>>>>> 3acb0d8 (Menghubungkan projek lokal ke github)
                                                            <div class="dropdown">
                                                                <button class="btn btn-sm btn-link text-muted p-0" type="button" data-toggle="dropdown">
                                                                    <i class="fa fa-ellipsis-v"></i>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="{{ route('ulasan.edit', $ulasan->ulasan_id) }}">
                                                                        <i class="fa fa-edit text-warning mr-2"></i> Edit
                                                                    </a>
                                                                    <form action="{{ route('ulasan.destroy', $ulasan->ulasan_id) }}" method="POST" onsubmit="return confirm('Hapus ulasan ini?')">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="dropdown-item">
                                                                            <i class="fa fa-trash text-danger mr-2"></i> Hapus
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    </div>

                                                    <div class="text-primary small mb-1">
                                                        @for($i = 1; $i <= 5; $i++)
                                                            <i class="{{ $i <= $ulasan->rating ? 'fas' : 'far' }} fa-star"></i>
                                                        @endfor
                                                        <span class="text-muted ml-2">{{ $ulasan->created_at->diffForHumans() }}</span>
                                                    </div>
                                                    <p class="m-0 small">{{ $ulasan->komentar }}</p>
                                                </div>
                                            </div>
                                        @endforeach

                                        @auth
                                            <div class="border-top pt-3 mt-3">
                                                <h6 class="font-weight-bold mb-3">Tulis Ulasan Anda</h6>
<<<<<<< HEAD
=======
                                                @if(session('success'))
                                                    <div class="alert alert-success py-2 px-3 mb-3">
                                                        {{ session('success') }}
                                                    </div>
                                                @endif
>>>>>>> 3acb0d8 (Menghubungkan projek lokal ke github)
                                                <form action="{{ route('ulasan.store', $p->produk_id) }}" method="POST">
                                                    @csrf
                                                    <div class="form-row">
                                                        <div class="col-md-4 form-group">
                                                            <select name="rating" class="custom-select" required>
                                                                <option value="">Pilih Rating</option>
                                                                <option value="5">⭐⭐⭐⭐⭐ (Sangat Puas)</option>
                                                                <option value="4">⭐⭐⭐⭐ (Puas)</option>
                                                                <option value="3">⭐⭐⭐ (Biasa)</option>
                                                                <option value="2">⭐⭐ (Kurang)</option>
                                                                <option value="1">⭐ (Kecewa)</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-8 form-group">
                                                            <input type="text" name="komentar" class="form-control" placeholder="Tulis komentar anda..." required>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="btn btn-sm btn-outline-primary font-weight-bold">Kirim Ulasan</button>
                                                </form>
                                            </div>
                                        @else
                                            <p class="small text-muted mt-2">Silakan <a href="{{ route('login') }}">Login</a> untuk memberikan ulasan.</p>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5">
                            <i class="fa fa-box-open fa-4x text-muted mb-3"></i>
                            <p class="lead">Toko ini belum memiliki produk.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
<<<<<<< HEAD
@endsection
=======
@endsection
>>>>>>> 3acb0d8 (Menghubungkan projek lokal ke github)
