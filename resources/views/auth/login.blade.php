@extends('layouts.app_template')

@section('content')
<style>
    .login-section {
        min-height: 80vh; /* Menjaga agar footer tetap di bawah */
        display: flex;
        align-items: center;
        background: linear-gradient(rgba(51, 33, 29, 0.9), rgba(51, 33, 29, 0.9)), url('{{ asset("assets/img/bg.jpg") }}');
        background-size: cover;
        background-position: center;
    }
    .login-card {
        background: rgba(255, 255, 255, 0.05); /* Transparansi gelap */
        border: 1px solid rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        color: #ffffff;
    }
    .login-card .card-header {
        background: rgba(218, 158, 75, 0.8); /* Warna Primary template */
        color: white;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 2px;
        border: none;
    }
    .form-control {
        background: rgba(255, 255, 255, 0.9) !important;
        border: none;
        height: 45px;
    }
    label {
        color: #f8f9fa !important; /* Warna putih terang untuk label */
        font-weight: 500;
    }
    .btn-link {
        color: #da9e4b !important; /* Warna primary untuk "Forgot Password" */
    }
    .btn-link:hover {
        color: #ffffff !important;
    }
</style>

<div class="container-fluid login-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card login-card shadow-lg">
                    <div class="card-header text-center py-3">{{ __('Masuk Ke Akun') }}</div>

                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="email" class="mb-2">{{ __('Alamat Email') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Masukkan email anda">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="password" class="mb-2">{{ __('Kata Sandi') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Masukkan kata sandi">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label text-white" for="remember">
                                        {{ __('Ingat Saya') }}
                                    </label>
                                </div>
                            </div>

                            <div class="form-group mb-0 d-grid">
                                <button type="submit" class="btn btn-primary btn-block py-2 font-weight-bold text-uppercase">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link text-center mt-3" href="{{ route('password.request') }}">
                                        {{ __('Lupa Kata Sandi?') }}
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="text-center mt-4">
                    <p class="text-white">Belum punya akun? <a href="{{ route('register') }}" class="text-primary font-weight-bold">Daftar Warga</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection