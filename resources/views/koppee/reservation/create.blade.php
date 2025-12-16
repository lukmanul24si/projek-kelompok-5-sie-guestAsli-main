@extends('koppee.layout')

@section('title', 'Buat Pesanan Baru')
@php $activeNav = 'reservasi'; @endphp

@section('page-header')
    <div class="container-fluid page-header-risoles mb-5">
        <div class="container">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Buat Pesanan</h1>
        </div>
    </div>
@endsection

@section('content')
    <!-- CSS Khusus (Paste CSS input putih di sini) -->
    <style> .reservation .form-control { color: #fff !important; } </style>

    <div class="container-fluid my-5">
        <div class="container">
            <div class="reservation position-relative overlay-top overlay-bottom">
                <div class="row align-items-center">
                    <div class="col-lg-6 my-5 my-lg-0">
                        <div class="p-5">
                            <div class="mb-4">
                                <h1 class="display-3 text-primary">30% OFF</h1>
                                <h1 class="text-white">Pesan Sekarang</h1>
                            </div>
                            <p class="text-white">Silakan isi form untuk memesan.</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="text-center p-5" style="background: rgba(51, 33, 29, .8);">
                            <h1 class="text-white mb-4 mt-5">Formulir Pesanan</h1>
                            
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
                                </div>
                            @endif

                            <form action="{{ route('reservation.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control border-primary p-4" placeholder="Nama Anda" required value="{{ old('name') }}" />
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control border-primary p-4" placeholder="Email Anda" required value="{{ old('email') }}" />
                                </div>
                                <div class="form-group">
                                    <div class="date" id="date" data-target-input="nearest">
                                        <input type="text" name="date" class="form-control border-primary p-4 datetimepicker-input" placeholder="Tanggal" data-target="#date" data-toggle="datetimepicker" value="{{ old('date') }}"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="time" id="time" data-target-input="nearest">
                                        <input type="text" name="time" class="form-control border-primary p-4 datetimepicker-input" placeholder="Jam" data-target="#time" data-toggle="datetimepicker" value="{{ old('time') }}"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <select name="quantity" class="custom-select border-primary px-4" style="height: 49px;">
                                        <option selected disabled>Jumlah Pesanan</option>
                                        <option value="1-5 Pcs">1 - 5 Pcs</option>
                                        <option value="6-10 Pcs">6 - 10 Pcs</option>
                                        <option value="1 Box">1 Box</option>
                                    </select>
                                </div>
                                <button class="btn btn-primary btn-block font-weight-bold py-3" type="submit">Pesan Sekarang</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection