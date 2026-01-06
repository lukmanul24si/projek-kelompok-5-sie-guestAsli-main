<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Etalase UMKM - Berdayakan Produk Lokal</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="UMKM Lokal, Produk Unggulan, Ekonomi Kreatif" name="keywords">
    <meta content="Platform resmi Etalase UMKM. Temukan dan dukung berbagai produk unggulan dari pelaku usaha lokal terbaik di wilayah kami." name="description">

    <link href="{{ asset('assets/img/favicon.ico') }}" rel="icon">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('assets/css/style.min.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-fluid p-0 nav-bar">
        <nav class="navbar navbar-expand-lg bg-none navbar-dark py-3">
            <a href="{{ url('/') }}" class="navbar-brand px-lg-4 m-0">
                <h1 class="m-0 display-4 text-uppercase text-white">ETALASE UMKM</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav ml-auto p-4">
                    <a href="{{ url('/') }}" class="nav-item nav-link active">Beranda</a>
                    <a href="{{ url('/umkm-list') }}" class="nav-item nav-link">Daftar UMKM</a>
                    <a href="{{ url('/menu') }}" class="nav-item nav-link">Produk</a>

                    
                    <a href="{{ url('/cart') }}" class="nav-item nav-link">
                        <i class="fa fa-shopping-cart text-primary"></i> 
                        <span class="badge badge-primary">{{ count((array) session('cart')) }}</span>
                    </a>



                    @auth
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Akun Saya</a>
                            <div class="dropdown-menu text-capitalize">
                                @if(Auth::user()->isSeller())
                                    <a href="{{ url('/my-shop') }}" class="dropdown-item">Kelola Toko (CRUD Produk)</a>

                                @else
                                    <a href="{{ url('/daftar-umkm') }}" class="dropdown-item">Daftarkan UMKM Anda</a>
                                @endif
                                <a href="{{ url('/riwayat-pesanan') }}" class="dropdown-item">Pesanan Saya</a>

                                @endif

                                <div class="dropdown-divider"></div>
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Keluar</button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="nav-item nav-link">Login</a>
                    @endauth
            </div>
        </nav>
    </div>
    <div class="container-fluid p-0 mb-5">
        <div id="blog-carousel" class="carousel slide overlay-bottom" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ asset('assets/img/carousel-1.jpg') }}" alt="UMKM Lokal">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <h2 class="text-primary font-weight-medium m-0">Dukung Produk Lokal</h2>
                        <h1 class="display-1 text-white m-0">UMKM Maju</h1>
                        <h2 class="text-white m-0">* KUALITAS TERBAIK *</h2>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('assets/img/carousel-2.jpg') }}" alt="Kreativitas UMKM">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <h2 class="text-primary font-weight-medium m-0">Inovasi Kreatif</h2>
                        <h1 class="display-1 text-white m-0">Mandiri</h1>
                        <h2 class="text-white m-0">* EKONOMI KUAT *</h2>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#blog-carousel" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#blog-carousel" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </div>
    <div class="container-fluid py-5">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Tentang Platform</h4>
                <h1 class="display-4">Pusat Produk Unggulan Lokal</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 py-0 py-lg-5">
                    <h2 class="mb-3">Misi Kami</h2>
                    <h5 class="mb-3">Membantu pelaku UMKM untuk menjangkau pasar yang lebih luas melalui digitalisasi.</h5>
                    <p>Kami hadir sebagai jembatan antara produsen lokal berbakat dengan konsumen yang menghargai kualitas. Setiap produk yang ada di platform ini telah melalui kurasi untuk memastikan kepuasan Anda.</p>
                    <a href="{{ url('/umkm-list') }}" class="btn btn-secondary font-weight-bold py-2 px-4 mt-2">Cari UMKM</a>
                </div>
                <div class="col-lg-4 py-5 py-lg-0" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="{{ asset('assets/img/about.png') }}" style="object-fit: cover;" alt="Produk UMKM">
                    </div>
                </div>
                <div class="col-lg-4 py-0 py-lg-5">
                    <h2 class="mb-3">Keunggulan</h2>
                    <p>Membeli dari UMKM berarti Anda membantu pertumbuhan ekonomi masyarakat secara langsung.</p>
                    <h5 class="mb-3"><i class="fa fa-check text-primary mr-3"></i>Produk Otentik & Berkualitas</h5>
                    <h5 class="mb-3"><i class="fa fa-check text-primary mr-3"></i>Harga Kompetitif Langsung dari Produsen</h5>
                    <h5 class="mb-3"><i class="fa fa-check text-primary mr-3"></i>Mendukung Keberlanjutan Ekonomi Lokal</h5>
                    <a href="{{ url('/menu') }}" class="btn btn-primary font-weight-bold py-2 px-4 mt-2">Jelajahi Produk</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Layanan</h4>
                <h1 class="display-4">Mengapa Berbelanja di Sini?</h1>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-5">
                    <div class="row align-items-center">
                        <div class="col-sm-5">
                            <img class="img-fluid mb-3 mb-sm-0" src="{{ asset('assets/img/service-1.jpg') }}" alt="Transaksi Aman">
                        </div>
                        <div class="col-sm-7">
                            <h4><i class="fa fa-shield-alt service-icon"></i>Transaksi Aman</h4>
                            <p class="m-0">Sistem pembayaran yang terintegrasi dan aman bagi pembeli maupun penjual.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-5">
                    <div class="row align-items-center">
                        <div class="col-sm-5">
                            <img class="img-fluid mb-3 mb-sm-0" src="{{ asset('assets/img/service-2.jpg') }}" alt="Dukungan Logistik">
                        </div>
                        <div class="col-sm-7">
                            <h4><i class="fa fa-truck service-icon"></i>Pengiriman Terintegrasi</h4>
                            <p class="m-0">Bekerja sama dengan kurir lokal untuk pengantaran produk yang lebih cepat.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <div class="container-fluid footer text-white mt-5 pt-5 px-0 position-relative overlay-top">
    <div class="row mx-0 pt-5 px-3 px-lg-5 mt-4 justify-content-between">
        <div class="col-lg-4 col-md-6 mb-5">
            <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Kontak Kami</h4>
            <p><i class="fa fa-map-marker-alt mr-2"></i>Jl. Harapan gg harapan 1, Rumbai</p>
            <p><i class="fa fa-phone-alt mr-2"></i>+62 895 1574 2694</p>
            <p class="m-0"><i class="fa fa-envelope mr-2"></i>kontak@Hakimwertu.com</p>
        </div>

        <div class="col-lg-4 col-md-6 mb-5">
            <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Ikuti Kami</h4>
            <p>Untuk mendapatkan info terbaru dari kami.</p>
            <div class="d-flex justify-content-start">
                <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-lg btn-outline-light btn-lg-square" href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 mb-5">
            <h4 class="text-white text-uppercase mb-4" style="letter-spacing: 3px;">Jam Buka</h4>
            <div class="w-100">
                <div class="d-flex justify-content-between mb-2">
                    <h6 class="text-white text-uppercase m-0">Senin - Jumat</h6>
                    <p class="m-0">08.00 - 15.00 WIB</p>
                </div>
                <div class="d-flex justify-content-between">
                    <h6 class="text-white text-uppercase m-0">Sabtu - Minggu</h6>
                    <p class="m-0">10.00 - 20.00 WIB</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid text-center text-white border-top mt-4 py-4 px-sm-3 px-md-5" style="border-color: rgba(256, 256, 256, .1) !important;">
        <p class="mb-2 text-white">Copyright &copy; <a class="font-weight-bold" href="{{ url('/') }}">BogengStore</a>. All Rights Reserved.</p>
        <p class="m-0 text-white">Designed by <a class="font-weight-bold" href="https://htmlcodex.com">HTML Codex</a> Distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a></p>
    </div>
</div>
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>


</html>

</html>

