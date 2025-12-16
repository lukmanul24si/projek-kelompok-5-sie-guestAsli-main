@extends('layouts.app_template')

@section('content')
<div class="container-fluid py-5">
    <div class="container">
        <div class="section-title text-center">
            <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Pendaftaran</h4>
            <h1 class="display-4">Daftarkan UMKM Anda</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="contact-form bg-light p-5 shadow">
                    <form action="{{ route('guest.umkm.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Nama Usaha</label>
                                <input type="text" name="nama_usaha" class="form-control bg-transparent p-4" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Kategori</label>
                                <select name="kategori" class="form-control bg-transparent px-4" style="height: 65px;">
                                    <option value="Kuliner">Kuliner</option>
                                    <option value="Kerajinan">Kerajinan</option>
                                    <option value="Jasa">Jasa</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Alamat Lengkap</label>
                            <textarea name="alamat" class="form-control bg-transparent p-4" rows="3" required></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>RT</label>
                                <input type="text" name="rt" class="form-control bg-transparent p-4">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>RW</label>
                                <input type="text" name="rw" class="form-control bg-transparent p-4">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Kontak (WhatsApp)</label>
                            <input type="text" name="kontak" class="form-control bg-transparent p-4" placeholder="08xxxx" required>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi Usaha</label>
                            <textarea name="deskripsi" class="form-control bg-transparent p-4" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Logo UMKM</label>
                            <input type="file" name="logo" class="form-control-file">
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary font-weight-bold py-3 px-5" type="submit">Daftar Sekarang</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection