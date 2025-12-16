@extends('layouts.app_template')

@section('content')
<div class="container-fluid page-header mb-5 position-relative overlay-bottom">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
        <h1 class="display-4 text-white text-uppercase">Keranjang Belanja</h1>
        <div class="d-inline-flex text-white">
            <p class="m-0 text-uppercase"><a class="text-white" href="{{ url('/') }}">Beranda</a></p>
            <i class="fa fa-angle-double-right pt-1 px-3"></i>
            <p class="m-0 text-uppercase">Keranjang</p>
        </div>
    </div>
</div>
<div class="container-fluid py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                            <th>Hapus</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @php $total = 0 @endphp
                        @forelse($cart as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                            <tr>
                                <td class="align-middle text-left">
                                    <img src="{{ $details['image'] ? asset('storage/'.$details['image']) : asset('assets/img/menu-1.jpg') }}" alt="" style="width: 50px;" class="mr-3">
                                    {{ $details['name'] }}
                                </td>
                                <td class="align-middle">Rp {{ number_format($details['price'], 0, ',', '.') }}</td>
                                <td class="align-middle">{{ $details['quantity'] }}</td>
                                <td class="align-middle">Rp {{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }}</td>
                                <td class="align-middle">
                                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-5">Keranjang Anda masih kosong.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="col-lg-4">
                <div class="bg-light p-30 mb-5 p-4 shadow-sm">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-light pr-3">Ringkasan Belanja</span></h5>
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>Rp {{ number_format($total, 0, ',', '.') }}</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5>Rp {{ number_format($total, 0, ',', '.') }}</h5>
                        </div>
                        <button class="btn btn-block btn-primary font-weight-bold my-3 py-3 shadow"><form action="{{ route('cart.checkout') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-block btn-primary font-weight-bold my-3 py-3 shadow">
        Proses Checkout
    </button>
</form>
</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection