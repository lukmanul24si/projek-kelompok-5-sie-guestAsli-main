<!DOCTYPE html>

<html lang="id">

<head>
<meta charset="utf-8">
<!-- Judul akan diisi oleh halaman anak -->
<title>@yield('title', 'UMKM Risoles - Resep Nikmat Sejak 2006')</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content="UMKM Risoles, Risoles Mayo, Risoles Ragout, Risoles Frozen" name="keywords">
<meta content="Situs resmi UMKM Risoles. Kami menyajikan risoles premium dengan bahan pilihan dan resep warisan keluarga." name="description">

<!-- Favicon -->
<link href="{{ asset('assets/img/favicon.ico') }}" rel="icon">

<!-- Google Font -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

<!-- Libraries Stylesheet -->
<link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

<!-- Customized Bootstrap Stylesheet -->
<link href="{{ asset('assets/css/style.min.css') }}" rel="stylesheet">

<!-- CSS Khusus untuk Header Halaman (opsional) -->
<style>
    .page-header-risoles {
        background: linear-gradient(rgba(51, 33, 29, .9), rgba(51, 33, 29, .9)), url("{{ asset('assets/img/carousel-1.jpg') }}") center center no-repeat;
        background-size: cover;
        padding: 120px 0 60px 0;
    }

    /* --- INI ADALAH KODE PERBAIKAN WARNA FONT --- */

    /* Mengubah warna teks yang diketik di form reservasi menjadi putih */
    .reservation .form-control.bg-transparent,
    .reservation .custom-select.bg-transparent {
        color: #ffffff !important; /* Tambahkan !important untuk memastikan */
    }

    /* Mengubah warna placeholder (teks 'Nama Anda', 'Email Anda', dll) menjadi putih */
    .reservation .form-control.bg-transparent::placeholder {
        color: #ffffff;
        opacity: 0.7; /* Sedikit redup agar beda dari teks yang diketik */
    }
    .reservation .form-control.bg-transparent::-moz-placeholder {
        color: #ffffff;
        opacity: 0.7;
    }
    .reservation .form-control.bg-transparent:-ms-input-placeholder {
        color: #ffffff;
        opacity: 0.7;
    }
    .reservation .form-control.bg-transparent::-ms-input-placeholder {
        color: #ffffff;
        opacity: 0.7;
    }

    /* Mengubah warna opsi di dalam dropdown (agar tetap hitam di background putih) */
    .reservation .custom-select.bg-transparent option {
        color: #000000;
    }
    /* --- AKHIR DARI KODE PERBAIKAN --- */

</style>


</head>

<body>
<!-- Navbar Start -->
<div class="container-fluid p-0 nav-bar">
<nav class="navbar navbar-expand-lg bg-none navbar-dark py-3">
<a href="{{ url('/') }}" class="navbar-brand px-lg-4 m-0">
<h1 class="m-0 display-4 text-uppercase text-white">UMKM</h1>
</a>
<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
<div class="navbar-nav ml-auto p-4">
<!--
Variabel $activeNav dikirim dari setiap halaman (index, about, dll)
untuk menentukan menu mana yang 'active'
-->
<a href="{{ url('/') }}" class="nav-item nav-link {{ ($activeNav ?? '') == 'beranda' ? 'active' : '' }}">Beranda</a>
<a href="{{ url('/about') }}" class="nav-item nav-link {{ ($activeNav ?? '') == 'tentang' ? 'active' : '' }}">Tentang Kami</a>
<a href="{{ url('/service') }}" class="nav-item nav-link {{ ($activeNav ?? '') == 'layanan' ? 'active' : '' }}">Layanan</a>
<a href="{{ url('/menu') }}" class="nav-item nav-link {{ ($activeNav ?? '') == 'menu' ? 'active' : '' }}">Menu</a>
<div class="nav-item dropdown">
<a href="#" class="nav-link dropdown-toggle {{ ( ($activeNav ?? '') == 'reservasi' || ($activeNav ?? '') == 'testimoni' ) ? 'active' : '' }}" data-toggle="dropdown">Halaman</a>
<div class="dropdown-menu text-capitalize">
<a href="{{ url('/reservation') }}" class="dropdown-item {{ ($activeNav ?? '') == 'reservasi' ? 'active' : '' }}">Reservasi</a>
<a href="{{ url('/testimonial') }}" class="dropdown-item {{ ($activeNav ?? '') == 'testimoni' ? 'active' : '' }}">Testimoni</a>
</div>
</div>
<a href="{{ url('/contact') }}" class="nav-item nav-link {{ ($activeNav ?? '') == 'kontak' ? 'active' : '' }}">Kontak</a>
</div>
</div>
</nav>
</div>
<!-- Navbar End -->

<!-- Ini adalah tempat untuk header halaman (jika ada) -->
@yield('page-header')

<!-- Ini adalah tempat untuk konten utama halaman -->
@yield('content')


<!-- Footer Start -->
    <div class="container-fluid footer text-white mt-5 pt-5 px-0 position-relative overlay-top">

        <!-- Baris Utama Footer -->
        <!-- Perubahan: Menggunakan 'justify-content-between' dan padding horizontal yang lebih kecil jika perlu -->
        <div class="row mx-0 pt-5 px-3 px-lg-5 mt-4 justify-content-between">

            <!-- Kolom 1: Kontak Kami -->
            <div class="col-lg-4 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Kontak Kami</h4>
                <p><i class="fa fa-map-marker-alt mr-2"></i>Jl. Harapan gg harapan 1, Pekanbaru</p>
                <p><i class="fa fa-phone-alt mr-2"></i>+62 895 1574 2694</p>
                <p class="m-0"><i class="fa fa-envelope mr-2"></i>kontak@BogengStore.com</p>
            </div>

            <!-- Kolom 2: Ikuti Kami -->
            <div class="col-lg-4 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Ikuti Kami</h4>
                <p>Dapatkan info promo terbaru dan varian rasa baru lewat sosial media kami.</p>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-lg btn-outline-light btn-lg-square" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>

            <!-- Kolom 3: Jam Buka -->
            <div class="col-lg-4 col-md-6 mb-5">
                <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Jam Buka</h4>
                <div class="w-100"> <!-- Tambahan w-100 agar div ini mengambil lebar penuh kolom -->
                    <div class="d-flex justify-content-between mb-2">
                        <h6 class="text-white text-uppercase m-0">Senin - Jumat</h6>
                        <p class="m-0">08.00 - 20.00 WIB</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <h6 class="text-white text-uppercase m-0">Sabtu - Minggu</h6>
                        <p class="m-0">10.00 - 22.00 WIB</p>
                    </div>
                </div>
            </div>

            <!-- Kolom 4 (Tentang Kami) SUDAH DIHAPUS sesuai permintaan -->

        </div>

        <!-- Copyright -->
        <div class="container-fluid text-center text-white border-top mt-4 py-4 px-sm-3 px-md-5" style="border-color: rgba(256, 256, 256, .1) !important;">
            <p class="mb-2 text-white">Copyright &copy; <a class="font-weight-bold" href="{{ url('/') }}">BogengStore</a>. All Rights Reserved.</p>
            <p class="m-0 text-white">Designed by <a class="font-weight-bold" href="https://htmlcodex.com">HTML Codex</a> Distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a></a></p>
        </div>
    </div>
    <!-- Footer End -->

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/lib/tempusdominus/js/moment.min.js') }}"></script>
<script src="{{ asset('assets/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
<script src="{{ asset('assetsData/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

<!-- Contact Javascript File -->
<script src="{{ asset('assets/mail/jqBootstrapValidation.min.js') }}"></script>
<script src="{{ asset('assets/mail/contact.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ asset('assets/js/main.js') }}"></script>


</body>

</html>
