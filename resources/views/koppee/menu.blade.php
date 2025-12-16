@extends('koppee.layout')

{{-- Judul Halaman --}}
@section('title', 'Menu Kami - UMKM Risoles')

{{-- Beri tahu layout master bahwa kita di halaman 'menu' --}}
@php $activeNav = 'menu'; @endphp

{{-- Header Halaman --}}
@section('page-header')
<div class="container-fluid page-header-risoles mb-5">
<div class="container">
<h1 class="display-3 text-white mb-3 animated slideInDown">Menu</h1>
<nav aria-label="breadcrumb animated slideInDown">
<ol class="breadcrumb text-uppercase mb-0">
<li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white">Beranda</a></li>
<li class="breadcrumb-item text-primary active" aria-current="page">Menu</li>
</ol>
</nav>
</div>
</div>
@endsection

{{-- Konten Utama Halaman --}}
@section('content')

<!-- Menu Start -->
<div class="container-fluid pt-5">
    <div class="container">
        <div class="section-title">
            <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Menu & Harga</h4>
            <h1 class="display-4">Pilihan Varian Risoles Kami</h1>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <h1 class="mb-5">Varian Gurih (Asin)</h1>
                <div class="row align-items-center mb-5">
                    <div class="col-4 col-sm-3">
                        <!-- Ganti 'menu-1.jpg' dengan foto Risol Mayo Anda -->
                        <img class="w-100 rounded-circle mb-3 mb-sm-0" src="{{ asset('assets/img/menu-1.jpg') }}" alt="Risol Mayo">
                        <h5 class="menu-price">7k</h5>
                    </div>
                    <div class="col-8 col-sm-9">
                        <h4>Risol Mayo</h4>
                        <p class="m-0">Perpaduan premium smoked beef (daging asap), telur rebus, dan saus mayones spesial kami yang lumer di mulut.</p>
                    </div>
                </div>
                <div class="row align-items-center mb-5">
                    <div class="col-4 col-sm-3">
                        <!-- Ganti 'menu-2.jpg' dengan foto Risol Ayam Anda -->
                        <img class="w-100 rounded-circle mb-3 mb-sm-0" src="{{ asset('assets/img/menu-2.jpg') }}" alt="Risol Ayam">
                        <h5 class="menu-price">6k</h5>
                    </div>
                    <div class="col-8 col-sm-9">
                        <h4>Risol Ayam</h4>
                        <p class="m-0">Isian suwiran ayam yang dimasak dengan bumbu gurih dan rempah-rempah pilihan. Enak dan mengenyangkan.</p>
                    </div>
                </div>
                <div class="row align-items-center mb-5">
                    <div class="col-4 col-sm-3">
                        <!-- Ganti 'menu-3.jpg' dengan foto Risol Ragout Anda -->
                        <img class="w-100 rounded-circle mb-3 mb-sm-0" src="{{ asset('assets/img/menu-3.jpg') }}" alt="Risol Ragout">
                        <h5 class="menu-price">5k</h5>
                    </div>
                    <div class="col-8 col-sm-9">
                        <h4>Risol Ragout</h4>
                        <p class="m-0">Resep warisan klasik. Isian ragout ayam dan sayuran (wortel, buncis) yang creamy dan gurih.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <h1 class="mb-5">Varian Frozen</h1>
                <div class="row align-items-center mb-5">
                    <div class="col-4 col-sm-3">
                        <!-- Ganti 'menu-1.jpg' dengan foto Risol Mayo Beku -->
                        <img class="w-100 rounded-circle mb-3 mb-sm-0" src="{{ asset('assets/img/menu-1.jpg') }}" alt="Risol Mayo Frozen">
                        <h5 class="menu-price">30k</h5>
                    </div>
                    <div class="col-8 col-sm-9">
                        <h4>Risol Mayo (isi 5)</h4>
                        <p class="m-0">Stok camilan lumer favorit Anda (isi 5 pcs). Siap digoreng kapan saja!</p>
                    </div>
                </div>
                <div class="row align-items-center mb-5">
                    <div class="col-4 col-sm-3">
                        <!-- Ganti 'menu-2.jpg' dengan foto Risol Ayam Beku -->
                        <img class="w-100 rounded-circle mb-3 mb-sm-0" src="{{ asset('assets/img/menu-2.jpg') }}" alt="Risol Ayam Frozen">
                        <h5 class="menu-price">25k</h5>
                    </div>
                    <div class="col-8 col-sm-9">
                        <h4>Risol Ayam (isi 5)</h4>
                        <p class="m-0">Camilan gurih dengan isian ayam (isi 5 pcs). Praktis untuk dinikmati bersama keluarga.</p>
                    </div>
                </div>
                <div class="row align-items-center mb-5">
                    <div class="col-4 col-sm-3">
                        <!-- Ganti 'menu-3.jpg' dengan foto Risol Ragout Beku -->
                        <img class="w-100 rounded-circle mb-3 mb-sm-0" src="{{ asset('assets/img/menu-3.jpg') }}" alt="Risol Ragout Frozen">
                        <h5 class="menu-price">20k</h5>
                    </div>
                    <div class="col-8 col-sm-9">
                        <h4>Risol Ragout (isi 5)</h4>
                        <p class="m-0">Resep ragout klasik kami (isi 5 pcs), kini dalam kemasan beku. Siap sedia di freezer Anda.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Menu End -->


@endsection
