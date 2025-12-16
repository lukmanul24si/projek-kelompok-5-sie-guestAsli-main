@extends('koppee.layout')

{{-- Judul Halaman --}}
@section('title', 'Testimoni - UMKM Risoles')

{{-- Menandai menu 'testimoni' sebagai aktif --}}
@php $activeNav = 'testimoni'; @endphp

{{-- Header Halaman --}}
@section('page-header')
    <div class="container-fluid page-header-risoles mb-5">
        <div class="container">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Testimoni</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase mb-0">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}" class="text-white">Beranda</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Testimoni</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection

{{-- Konten Utama Halaman --}}
@section('content')

    <!-- Testimonial Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Testimoni</h4>
                <h1 class="display-4">Kata Pelanggan Kami</h1>
            </div>
            <div class="owl-carousel testimonial-carousel">
                
                <!-- Item 1 -->
                <div class="testimonial-item">
                    <div class="d-flex align-items-center mb-3">
                        <!-- Pastikan path asset ini benar -->
                        <img class="img-fluid" src="{{ asset('assets/img/testimonial-1.jpg') }}" alt="Andi Hartono">
                        <div class="ml-3">
                            <h4>Andi Hartono</h4>
                            <i>Karyawan Swasta</i>
                        </div>
                    </div>
                    <p class="m-0">Risol mayo-nya juara! Kulitnya renyah, isinya lumer banget di mulut. Selalu jadi andalan buat camilan sore.</p>
                </div>

                <!-- Item 2 -->
                <div class="testimonial-item">
                    <div class="d-flex align-items-center mb-3">
                        <img class="img-fluid" src="{{ asset('assets/img/testimonial-2.jpg') }}" alt="Siti Aminah">
                        <div class="ml-3">
                            <h4>Siti Aminah</h4>
                            <i>Ibu Rumah Tangga</i>
                        </div>
                    </div>
                    <p class="m-0">Stok risol frozen-nya sangat praktis. Tinggal goreng, anak-anak di rumah langsung rebutan. Risoles ragout-nya gurih, isiannya pas.</p>
                </div>

                <!-- Item 3 -->
                <div class="testimonial-item">
                    <div class="d-flex align-items-center mb-3">
                        <img class="img-fluid" src="{{ asset('assets/img/testimonial-3.jpg') }}" alt="Budi Santoso">
                        <div class="ml-3">
                            <h4>Budi Santoso</h4>
                            <i>Manajer Acara</i>
                        </div>
                    </div>
                    <p class="m-0">Pesan 5 box untuk acara rapat kantor. Layanannya cepat dan tepat waktu. Semua suka, rasanya premium dan ukurannya pas. Terima kasih!</p>
                </div>

                <!-- Item 4 -->
                <div class="testimonial-item">
                    <div class="d-flex align-items-center mb-3">
                        <img class="img-fluid" src="{{ asset('assets/img/testimonial-4.jpg') }}" alt="Maria Devina">
                        <div class="ml-3">
                            <h4>Maria Devina</h4>
                            <i>Mahasiswi</i>
                        </div>
                    </div>
                    <p class="m-0">Enak banget! Harganya pas di kantong mahasiswa tapi rasanya gak murahan. Risol ayamnya favorit!</p>
                </div>

            </div>
        </div>
    </div>
    <!-- Testimonial End -->

@endsection