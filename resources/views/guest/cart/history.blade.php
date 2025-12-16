@extends('layouts.app_template')

@section('content')
<div class="container-fluid page-header mb-5 position-relative overlay-bottom">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
        <h1 class="display-4 text-white text-uppercase">Pesanan Saya</h1>
        <div class="d-inline-flex text-white">
            <p class="m-0 text-uppercase"><a class="text-white" href="{{ url('/') }}">Beranda</a></p>
            <i class="fa fa-angle-double-right pt-1 px-3"></i>
            <p class="m-0 text-uppercase">Riwayat</p>
        </div>
    </div>
</div>

<div class="container-fluid py-5">
    <div class="container">
        <div class="section-title text-center">
            <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Transaksi</h4>
            <h1 class="display-4">Riwayat Belanja Anda</h1>
        </div>

        <div class="row mt-5">
            @forelse($pesanans as $order)
                <div class="col-12 mb-4">
                    <div class="card border-0 shadow-sm overflow-hidden">
                        <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                            <h5 class="m-0 text-white">ID Pesanan: #{{ $order->pesanan_id }}</h5>
                            <span class="badge badge-{{ $order->status_pembayaran == 'pending' ? 'warning' : 'success' }} px-3 py-2">
                                {{ strtoupper($order->status_pembayaran) }}
                            </span>
                        </div>
                        <div class="card-body bg-light">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <ul class="list-group list-group-flush">
                                        @foreach($order->details as $item)
                                            <li class="list-group-item bg-transparent border-0 d-flex justify-content-between">
                                                <span><i class="fa fa-box text-primary mr-2"></i> {{ $item->produk->nama_produk }} <strong>(x{{ $item->jumlah }})</strong></span>
                                                <span class="text-muted">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-md-4 border-left text-center">
                                    <p class="text-muted mb-1 small">Total yang dibayar:</p>
                                    <h3 class="text-primary font-weight-bold">Rp {{ number_format($order->total_harga, 0, ',', '.') }}</h3>
                                    <p class="text-muted small mb-0">{{ $order->created_at->format('d M Y, H:i') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <i class="fa fa-shopping-cart fa-4x text-muted mb-3"></i>
                    <p class="lead">Anda belum memiliki riwayat pesanan.</p>
                    <a href="{{ route('menu') }}" class="btn btn-primary font-weight-bold py-2 px-4">Mulai Belanja</a>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection