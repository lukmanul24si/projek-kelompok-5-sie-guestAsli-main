@extends('koppee.layout')

{{-- Judul Halaman --}}
@section('title', 'Tentang Kami - UMKM Risoles')

{{-- Beri tahu layout master bahwa kita di halaman 'tentang' --}}
@php $activeNav = 'tentang'; @endphp

{{-- Header Halaman --}}
@section('page-header')
<div class="container-fluid page-header-risoles mb-5">
<div class="container">
<h1 class="display-3 text-white mb-3 animated slideInDown">Tentang Kami</h1>
<nav aria-label="breadcrumb animated slideInDown">
<ol class="breadcrumb text-uppercase mb-0">
<li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white">Beranda</a></li>
<li class="breadcrumb-item text-primary active" aria-current="page">Tentang Kami</li>
</ol>
</nav>
</div>
</div>
@endsection

{{-- Konten Utama Halaman --}}
@section('content')

<!-- About Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="section-title">
            <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Tentang Kami</h4>
            <h1 class="display-4">Resep Nikmat Sejak 2006</h1>
        </div>
        <div class="row">
            <div class="col-lg-4 py-0 py-lg-5">
                <h2 class="mb-3">Cerita Kami</h2>
                <h5 class="mb-3">Berawal dari dapur rumahan, kami hadir untuk menyajikan camilan berkualitas.</h5>
                <p>Sebagai bagian dari UMKM lokal, kami bangga dapat menghadirkan Risoles premium yang dibuat dengan bahan-bahan pilihan. Setiap gigitan adalah perpaduan sempurna antara kulit yang renyah dan isian yang melimpah, diolah dengan bumbu resep warisan keluarga.</p>
                <a href="{{ url('/reservation') }}" class="btn btn-primary font-weight-bold py-2 px-4 mt-2">Pesan Sekarang</a>
            </div>
            <div class="col-lg-4 py-5 py-lg-0" style="min-height: 500px;">
                <div class="position-relative h-100">
                    <!-- Ganti 'about.png' dengan foto risoles Anda -->
                    <img class="position-absolute w-100 h-100" src="{{ asset('assets/img/about.png') }}" style="object-fit: cover;" alt="Tentang Risoles Kami">
                </div>
            </div>
            <div class="col-lg-4 py-0 py-lg-5">
                <h2 class="mb-3">Visi Kami</h2>
                <p>Menjadi UMKM terdepan yang mempopulerkan Risoles sebagai camilan favorit berkualitas tinggi, higienis, dan inovatif.</p>
                <h5 class="mb-3"><i class="fa fa-check text-primary mr-3"></i>Kualitas Bahan Terbaik & Halal</h5>
                <h5 class="mb-3"><i class="fa fa-check text-primary mr-3"></i>Higienis dan Tanpa Pengawet</h5>
                <h5 class="mb-3"><i class="fa fa-check text-primary mr-3"></i>Inovasi Varian Rasa (Mayo, Ragout, Smoked Beef)</h5>
                <a href="{{ url('/menu') }}" class="btn btn-primary font-weight-bold py-2 px-4 mt-2">Lihat Menu</a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


@endsection