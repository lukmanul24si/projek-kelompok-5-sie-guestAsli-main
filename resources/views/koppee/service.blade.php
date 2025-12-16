@extends('koppee.layout')

{{-- Judul Halaman --}}
@section('title', 'Layanan Kami - UMKM Risoles')

{{-- Beri tahu layout master bahwa kita di halaman 'layanan' --}}
@php $activeNav = 'layanan'; @endphp

{{-- Header Halaman --}}
@section('page-header')
<div class="container-fluid page-header-risoles mb-5">
<div class="container">
<h1 class="display-3 text-white mb-3 animated slideInDown">Layanan</h1>
<nav aria-label="breadcrumb animated slideInDown">
<ol class="breadcrumb text-uppercase mb-0">
<li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white">Beranda</a></li>
<li class="breadcrumb-item text-primary active" aria-current="page">Layanan</li>
</ol>
</nav>
</div>
</div>
@endsection

{{-- Konten Utama Halaman --}}
@section('content')

<!-- Service Start -->
<div class="container-fluid pt-5">
    <div class="container">
        <div class="section-title">
            <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Layanan Kami</h4>
            <h1 class="display-4">Kualitas & Pelayanan</h1>
        </div>
        <div class="row">
            <div class="col-lg-6 mb-5">
                <div class="row align-items-center">
                    <div class="col-sm-5">
                        <img class="img-fluid mb-3 mb-sm-0" src="{{ asset('assets/img/service-1.jpg') }}" alt="Pengantaran Cepat Risoles">
                    </div>
                    <div class="col-sm-7">
                        <h4><i class="fa fa-truck service-icon"></i>Pengantaran Cepat</h4>
                        <p class="m-0">Pesanan Anda kami antar cepat dan aman, langsung ke depan pintu Anda.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-5">
                <div class="row align-items-center">
                    <div class="col-sm-5">
                        <img class="img-fluid mb-3 mb-sm-0" src="{{ asset('assets/img/service-2.jpg') }}" alt="Bahan Pilihan Segar Risoles">
                    </div>
                    <div class="col-sm-7">
                        <h4><i class="fa fa-check service-icon"></i>Bahan Pilihan Segar</h4>
                        <p class="m-0">Kami hanya menggunakan bahan baku premium, sayuran segar, dan daging pilihan yang 100% halal.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-5">
                <div class="row align-items-center">
                    <div class="col-sm-5">
                        <img class="img-fluid mb-3 mb-sm-0" src="{{ asset('assets/img/service-3.jpg') }}" alt="Kualitas Rasa Terbaik Risoles">
                    </div>
                    <div class="col-sm-7">
                        <h4><i class="fa fa-award service-icon"></i>Kualitas Rasa Terbaik</h4>
                        <p class="m-0">Diolah dengan resep warisan, menjamin cita rasa risoles yang gurih dan tak terlupakan.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-5">
                <div class="row align-items-center">
                    <div class="col-sm-5">
                        <img class="img-fluid mb-3 mb-sm-0" src="{{ asset('assets/img/service-4.jpg') }}" alt="Pesan Online Mudah Risoles">
                    </div>
                    <div class="col-sm-7">
                        <h4><i class="fa fa-calendar-check service-icon"></i>Pesan Online Mudah</h4>
                        <p class="m-0">Pesan kapan saja untuk acara, kumpul keluarga, atau camilan harian Anda.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Service End -->


@endsection