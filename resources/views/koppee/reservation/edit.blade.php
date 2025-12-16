@extends('koppee.layout')

@section('title', 'Edit Pesanan')
@php $activeNav = 'reservasi'; @endphp

@section('page-header')
    <div class="container-fluid page-header-risoles mb-5">
        <div class="container">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Upload Bukti Bayar</h1>
        </div>
    </div>
@endsection

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-header bg-white">
                    <h4 class="mb-0">Edit Pesanan #{{ $reservation->id }}</h4>
                </div>
                <div class="card-body">
                    <!-- Form Update dengan Upload File -->
                    <form action="{{ route('reservation.update', $reservation->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>Nama Pemesan</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $reservation->name) }}" required>
                        </div>

                        <div class="form-group">
                            <label>Email (Tidak dapat diubah)</label>
                            <input type="email" class="form-control" value="{{ $reservation->email }}" disabled>
                        </div>

                        <div class="form-group">
                            <label>Upload Bukti Pembayaran</label>
                            <div class="custom-file">
                                <input type="file" name="bukti_bayar" class="custom-file-input" id="buktiBayar" accept="image/*">
                                <label class="custom-file-label" for="buktiBayar">Pilih file gambar...</label>
                            </div>
                            <small class="text-muted">Format: JPG, PNG. Maks 2MB.</small>
                            
                            @if($reservation->bukti_bayar)
                                <div class="mt-3">
                                    <p class="mb-1">Bukti saat ini:</p>
                                    <img src="{{ asset($reservation->bukti_bayar) }}" class="img-thumbnail" style="max-height: 200px;">
                                </div>
                            @endif
                        </div>

                        <hr>
                        <button type="submit" class="btn btn-success px-4">Simpan & Upload</button>
                        <a href="{{ route('reservation.index', ['search_email' => $reservation->email]) }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection