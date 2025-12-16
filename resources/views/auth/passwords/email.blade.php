@extends('layouts.app_template')

@section('content')
<style>
    .auth-section {
        min-height: 80vh; 
        display: flex;
        align-items: center;
        background: linear-gradient(rgba(51, 33, 29, 0.9), rgba(51, 33, 29, 0.9)), url('{{ asset("assets/img/bg.jpg") }}');
        background-size: cover;
        background-position: center;
    }
    .auth-card {
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        color: #ffffff;
    }
    .auth-card .card-header {
        background: rgba(218, 158, 75, 0.8);
        color: white;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 2px;
        border: none;
    }
    label { color: #f8f9fa !important; font-weight: 500; }
    .form-control { background: rgba(255, 255, 255, 0.9) !important; border: none; height: 45px; }
</style>

<div class="container-fluid auth-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card auth-card shadow-lg">
                    <div class="card-header text-center py-3">{{ __('Reset Kata Sandi') }}</div>

                    <div class="card-body p-4">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group mb-4">
                                <label for="email" class="mb-2">{{ __('Alamat Email') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Masukkan email untuk pemulihan">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-0 d-grid">
                                <button type="submit" class="btn btn-primary btn-block py-2 font-weight-bold">
                                    {{ __('Kirim Link Reset') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection