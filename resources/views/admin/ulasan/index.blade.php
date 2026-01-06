@extends('adminlte::page')

@section('title', 'Ulasan Produk')

@section('content_header')
    <h1>Ulasan Produk</h1>
@endsection

@section('content')
    <div class="card">
        <div class="card-body table-responsive p-0">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Produk</th>
                        <th>Pengguna</th>
                        <th>Rating</th>
                        <th>Komentar</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($ulasans as $u)
                        <tr>
                            <td>{{ $u->created_at }}</td>
                            <td>{{ optional($u->produk)->nama_produk }}</td>
                            <td>{{ optional($u->warga)->nama }}</td>
                            <td>{{ $u->rating }}</td>
                            <td>{{ $u->komentar }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Belum ada ulasan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
