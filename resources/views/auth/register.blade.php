@extends('layouts.app_template')

@section('content')
<style>
    .register-section {
        min-height: 85vh; /* Menjaga agar footer tetap di bawah */
        display: flex;
        align-items: center;
        background: linear-gradient(rgba(51, 33, 29, 0.9), rgba(51, 33, 29, 0.9)), url('{{ asset("assets/img/bg.jpg") }}');
        background-size: cover;
        background-position: center;
        padding: 50px 0;
    }
    .register-card {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        color: #ffffff;
    }
    .register-card .card-header {
        background: rgba(218, 158, 75, 0.8); /* Warna Primary */
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
        color: #f8f9fa !important;
        font-weight: 500;
    }
</style>

<div class="container-fluid register-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card register-card shadow-lg">
                    <div class="card-header text-center py-3">{{ __('Daftar Akun Warga') }}</div>

                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="first_name" class="mb-2">{{ __('Nama Lengkap') }}</label>
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus placeholder="Masukkan nama lengkap">

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="email" class="mb-2">{{ __('Alamat Email') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="contoh@email.com">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="password" class="mb-2">{{ __('Kata Sandi') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Minimal 8 karakter">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="password-confirm" class="mb-2">{{ __('Konfirmasi Kata Sandi') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Ulangi kata sandi">
                            </div>

                            <div class="form-group mb-0 d-grid">
                                <button type="submit" class="btn btn-primary btn-block py-2 font-weight-bold text-uppercase">
                                    {{ __('Daftar Sekarang') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="text-center mt-4">
                    <p class="text-white">Sudah punya akun? <a href="{{ route('login') }}" class="text-primary font-weight-bold">Masuk di Sini</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection