@extends('koppee.layout')

@section('title', 'Reservasi & Cek Pesanan')
@php $activeNav = 'reservasi'; @endphp

@section('page-header')
    <div class="container-fluid page-header-risoles mb-5">
        <div class="container">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Reservasi</h1>
        </div>
    </div>
@endsection

@section('content')
    <!-- CSS Khusus -->
    <style>
        .reservation .form-control, .reservation .custom-select { color: #fff !important; background: transparent !important; }
        .reservation option { color: #333 !important; background: #fff !important; }
        .reservation ::placeholder { color: rgba(255,255,255,0.7) !important; }
    </style>

    <div class="container-fluid my-5">
        <div class="container">
            
            <!-- BAGIAN 1: FORM PEMESANAN -->
            <div class="reservation position-relative overlay-top overlay-bottom mb-5">
                <div class="row align-items-center">
                    <div class="col-lg-6 my-5 my-lg-0">
                        <div class="p-5">
                            <div class="mb-4">
                                <h1 class="display-3 text-primary">DISKON 30%</h1>
                                <h1 class="text-white">Pesan Sekarang</h1>
                            </div>
                            <p class="text-white">Isi formulir di samping untuk memesan risoles. Setelah memesan, Anda bisa mengecek status dan upload bukti bayar di bawah halaman ini.</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="text-center p-5" style="background: rgba(51, 33, 29, .8);">
                            <h1 class="text-white mb-4 mt-5">Formulir Pesanan</h1>
                            
                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            @if($errors->any())
                                <div class="alert alert-danger"><ul>@foreach($errors->all() as $e)<li>{{$e}}</li>@endforeach</ul></div>
                            @endif

                            <form action="{{ route('reservation.store') }}" method="POST">
                                @csrf
                                <div class="form-group"><input type="text" name="name" class="form-control border-primary p-4" placeholder="Nama Anda" required value="{{ old('name') }}"></div>
                                <div class="form-group"><input type="email" name="email" class="form-control border-primary p-4" placeholder="Email Anda" required value="{{ old('email') }}"></div>
                                <div class="form-group">
                                    <div class="date" id="date" data-target-input="nearest"><input type="text" name="date" class="form-control border-primary p-4 datetimepicker-input" placeholder="Tanggal" data-target="#date" data-toggle="datetimepicker" value="{{ old('date') }}"/></div>
                                </div>
                                <div class="form-group">
                                    <div class="time" id="time" data-target-input="nearest"><input type="text" name="time" class="form-control border-primary p-4 datetimepicker-input" placeholder="Jam" data-target="#time" data-toggle="datetimepicker" value="{{ old('time') }}"/></div>
                                </div>
                                <div class="form-group">
                                    <select name="quantity" class="custom-select border-primary px-4" style="height: 49px;">
                                        <option selected disabled>Jumlah Pesanan</option>
                                        <option value="1-5 Pcs">1-5 Pcs</option>
                                        <option value="1 Box">1 Box</option>
                                        <option value="Partai Besar">Partai Besar</option>
                                    </select>
                                </div>
                                <button class="btn btn-primary btn-block font-weight-bold py-3">Pesan Sekarang</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- BAGIAN 2: CEK STATUS & RIWAYAT PESANAN (Search, Filter, Pagination) -->
            <div class="row justify-content-center mt-5">
                <div class="col-lg-10">
                    <h2 class="mb-4 text-center">Cek Pesanan Saya</h2>
                    
                    <!-- Form Pencarian (Filter) -->
                    <form action="{{ route('reservation.index') }}" method="GET" class="mb-4">
                        <div class="input-group">
                            <input type="email" name="search_email" class="form-control p-4" placeholder="Masukkan Email yang Anda gunakan saat memesan..." value="{{ request('search_email') }}" required>
                            <div class="input-group-append">
                                <button class="btn btn-primary px-4">Cari Pesanan</button>
                            </div>
                        </div>
                    </form>

                    <!-- Tabel Hasil (Pagination) -->
                    @if(request('search_email'))
                        @if($my_reservations->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Nama</th>
                                            <th>Pesanan</th>
                                            <th>Status</th>
                                            <th>Bukti Bayar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($my_reservations as $res)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($res->date)->format('d M Y') }}<br><small>{{ $res->time }}</small></td>
                                            <td>{{ $res->name }}</td>
                                            <td>{{ $res->quantity }}</td>
                                            <td><span class="badge badge-info">{{ $res->status }}</span></td>
                                            <td>
                                                @if($res->bukti_bayar)
                                                    <a href="{{ asset($res->bukti_bayar) }}" target="_blank" class="btn btn-sm btn-success">Lihat Foto</a>
                                                @else
                                                    <span class="text-danger small">Belum Upload</span>
                                                @endif
                                            </td>
                                            <td>
                                                <!-- Tombol Edit -->
                                                <a href="{{ route('reservation.edit', $res->id) }}" class="btn btn-sm btn-warning">Upload / Edit</a>
                                                
                                                <!-- Tombol Hapus -->
                                                <form action="{{ route('reservation.destroy', $res->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Batalkan pesanan ini?')">
                                                    @csrf @method('DELETE')
                                                    <button class="btn btn-sm btn-danger">Batal</button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- Pagination Links -->
                            <div class="d-flex justify-content-center mt-3">
                                {{ $my_reservations->links() }}
                            </div>
                        @else
                            <div class="alert alert-warning text-center">Tidak ada pesanan ditemukan untuk email tersebut.</div>
                        @endif
                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection