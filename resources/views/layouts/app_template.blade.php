<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Etalase UMKM - Berdayakan Produk Lokal</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
<<<<<<< HEAD
    
=======

>>>>>>> 3acb0d8 (Menghubungkan projek lokal ke github)
    <link href="{{ asset('assets/img/favicon.ico') }}" rel="icon">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/style.min.css') }}" rel="stylesheet">

    <style>
        .nav-bar { position: absolute; width: 100%; top: 0; left: 0; z-index: 999; background: transparent !important; }
        .page-header { padding-top: 150px !important; margin-top: 0 !important; }
        .login-section, .register-section { padding-top: 150px !important; margin-top: 0 !important; }
    </style>
</head>

<body>
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
                    <a href="{{ url('/') }}" class="nav-item nav-link">Beranda</a>
                    <a href="{{ route('guest.umkm.index') }}" class="nav-item nav-link">Daftar UMKM</a>
                    <a href="{{ route('menu') }}" class="nav-item nav-link">Produk</a>
<<<<<<< HEAD
                    
                    <a href="{{ route('cart.index') }}" class="nav-item nav-link">
                        <i class="fa fa-shopping-cart text-primary"></i> 
                        <span class="badge badge-primary">{{ count((array) session('cart')) }}</span>
                    </a>
=======
>>>>>>> 3acb0d8 (Menghubungkan projek lokal ke github)

                    @auth
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Akun Saya</a>
                            <div class="dropdown-menu text-capitalize">
<<<<<<< HEAD
                                <a href="{{ route('guest.orders.history') }}" class="dropdown-item">
                                    <i class="fa fa-history mr-2 text-primary"></i> Pesanan Saya
                                </a>
=======
>>>>>>> 3acb0d8 (Menghubungkan projek lokal ke github)
                                <div class="dropdown-divider"></div>
                                @if(Auth::user()->isSeller())
                                    <a href="{{ url('/my-shop') }}" class="dropdown-item">
                                        <i class="fa fa-store mr-2 text-primary"></i> Kelola Toko
                                    </a>
<<<<<<< HEAD
                                @else
                                    <a href="{{ url('/daftar-umkm') }}" class="dropdown-item">
                                        <i class="fa fa-plus-circle mr-2 text-primary"></i> Daftarkan UMKM
                                    </a>
=======
>>>>>>> 3acb0d8 (Menghubungkan projek lokal ke github)
                                @endif
                                <div class="dropdown-divider"></div>
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">Keluar</button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="nav-item nav-link">Login</a>
                    @endauth
                </div>
            </div>
        </nav>
    </div>

    <div id="floating-alert" style="position: fixed; top: 20px; right: 20px; z-index: 10000; width: 350px;">
        @if (session('success'))
            <div class="alert alert-dismissible fade show border-0 shadow-lg" role="alert" style="background: #28a745 !important; color: #fff !important; border-radius: 10px;">
                <div class="d-flex align-items-center">
                    <div class="mr-3 d-flex align-items-center justify-content-center" style="background: rgba(255,255,255,0.2); width: 40px; height: 40px; border-radius: 50%;">
                        <i class="fa fa-check text-white"></i>
                    </div>
                    <div><strong>Berhasil!</strong><br><small>{{ session('success') }}</small></div>
                </div>
                <button type="button" class="close text-white" data-dismiss="alert">&times;</button>
            </div>
        @endif
    </div>
<<<<<<< HEAD
    
=======

>>>>>>> 3acb0d8 (Menghubungkan projek lokal ke github)
    @yield('content')

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
<<<<<<< HEAD
        <p class="m-0 text-white">Designed by <a class="font-weight-bold" href="https://htmlcodex.com">HTML Codex</a> Distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a></p>
=======
>>>>>>> 3acb0d8 (Menghubungkan projek lokal ke github)
    </div>
</div>

    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
<<<<<<< HEAD
</html>
=======
</html>
>>>>>>> 3acb0d8 (Menghubungkan projek lokal ke github)
