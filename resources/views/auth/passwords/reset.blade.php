@extends('layouts.app_template')

@section('content')
<style>
    .auth-section { min-height: 85vh; display: flex; align-items: center; background: linear-gradient(rgba(51, 33, 29, 0.9), rgba(51, 33, 29, 0.9)), url('{{ asset("assets/img/bg.jpg") }}'); background-size: cover; background-position: center; padding: 40px 0; }
    .auth-card { background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); color: #ffffff; }
    .auth-card .card-header { background: rgba(218, 158, 75, 0.8); color: white; font-weight: bold; text-transform: uppercase; border: none; }
    label { color: #f8f9fa !important; }
    .form-control { background: rgba(255, 255, 255, 0.9) !important; border: none; height: 45px; }
</style>

<div class="container-fluid auth-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card auth-card shadow-lg">
                    <div class="card-header text-center py-3">{{ __('Perbarui Kata Sandi') }}</div>

                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group mb-3">
                                <label for="email" class="mb-2">{{ __('Alamat Email') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                @error('email') <span class="invalid-feedback"><strong>{{ $message }}</strong></span> @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="password" class="mb-2">{{ __('Kata Sandi Baru') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password') <span class="invalid-feedback"><strong>{{ $message }}</strong></span> @enderror
                            </div>

                            <div class="form-group mb-4">
                                <label for="password-confirm" class="mb-2">{{ __('Konfirmasi Kata Sandi') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>

                            <div class="form-group mb-0 d-grid">
                                <button type="submit" class="btn btn-primary btn-block py-2 font-weight-bold">
                                    {{ __('Simpan Perubahan') }}
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