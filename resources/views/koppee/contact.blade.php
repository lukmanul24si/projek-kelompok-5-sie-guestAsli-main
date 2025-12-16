@extends('koppee.layout')

{{-- Judul Halaman --}}
@section('title', 'Kontak Kami - UMKM Risoles')

{{-- Menandai menu 'kontak' sebagai aktif --}}
@php $activeNav = 'kontak'; @endphp

{{-- Header Halaman --}}
@section('page-header')
    <div class="container-fluid page-header-risoles mb-5">
        <div class="container">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Kontak</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white">Beranda</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Kontak</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection

{{-- Konten Utama Halaman --}}
@section('content')

    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Hubungi Kami</h4>
                <h1 class="display-4">Informasi Kontak</h1>
            </div>
            
            <!-- Baris Informasi Kontak -->
            <div class="row px-3 pb-4">
                <div class="col-sm-4 text-center mb-3">
                    <i class="fa fa-2x fa-map-marker-alt mb-3 text-primary"></i>
                    <h4 class="font-weight-bold">Alamat</h4>
                    <p>Jl. Garuda Sakti, Pekanbaru, Riau</p>
                </div>
                <div class="col-sm-4 text-center mb-3">
                    <i class="fa fa-2x fa-phone-alt mb-3 text-primary"></i>
                    <h4 class="font-weight-bold">Telepon / WhatsApp</h4>
                    <p>+62 812 3456 7890</p>
                </div>
                <div class="col-sm-4 text-center mb-3">
                    <i class="fa fa-2x fa-envelope mb-3 text-primary"></i>
                    <h4 class="font-weight-bold">Email</h4>
                    <p>kontak@risolesumkm.com</p>
                </div>
            </div>

            <!-- Peta Google Maps (Full Width) -->
            <div class="row">
                <div class="col-12 pb-5">
                    <iframe style="width: 100%; height: 445px;"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6587178788!2d101.378903!3d0.496814!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5a9d0e20f0c6b%3A0x6d1e3d671e0e8e6b!2sUniversitas%20Islam%20Negeri%20Sultan%20Syarif%20Kasim%20Riau!5e0!3m2!1sid!2sid!4v1674000000000!5m2!1sid!2sid"
                        frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
            
            <!-- FORMULIR INPUT SUDAH DIHAPUS -->
            
        </div>
    </div>
    <!-- Contact End -->

@endsection