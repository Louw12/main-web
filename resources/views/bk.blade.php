@extends('layouts.main')

@section('content')

<section class="bk-page py-5">
    <div class="container">
        <!-- Judul Halaman -->
        <div class="row mb-5">
            <div class="col-md-12 text-center">
                <h1 class="mb-3">Selamat Datang di Layanan Bimbingan Konseling</h1>
                <p class="lead">Silahkan gunakan layanan ini untuk mencari status tiket atau membuat jadwal bimbingan</p>
            </div>
        </div>
        
       
        
        <!-- Form Buat Jadwal -->
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card shadow-sm">
                    <div class="card-header text-white" style="background-color:rgb(0, 51, 132);">
                        <h4 class="mb-0">Buat Jadwal Bimbingan Konseling</h4>
                    </div>
                    <div class="card-body">
                        <p class="text-center mb-4">Silahkan isi form dibawah ini untuk membuat jadwal bimbingan konseling</p>
                        
                        <form method="POST" action="#">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="nisn" class="form-label">NISN</label>
                                    <input type="text" name="nisn" id="nisn" class="form-control" value="{{ old('nisn') }}" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="kelas" class="form-label">Kelas</label>
                                    <input type="text" name="kelas" id="kelas" class="form-control" value="{{ old('kelas') }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="guru" class="form-label">Pilih Guru Bimbingan Konseling</label>
                                    <select name="guru" id="guru" class="form-control" required>
                                        <option value="">-- Pilih Guru --</option>
                                        <option value="Bu Siti" {{ old('guru') == 'Bu Siti' ? 'selected' : '' }}>Bu Siti</option>
                                        <option value="Pak Budi" {{ old('guru') == 'Pak Budi' ? 'selected' : '' }}>Pak Budi</option>
                                        <option value="Bu Ani" {{ old('guru') == 'Bu Ani' ? 'selected' : '' }}>Bu Ani</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal Bimbingan</label>
                                <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ old('tanggal') }}" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" class="form-control" rows="4" placeholder="Deskripsikan kebutuhan bimbingan Anda">{{ old('keterangan') }}</textarea>
                            </div>
                            
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn text-white btn-lg" style="background-color:rgb(0, 51, 132);">Buat Jadwal Bimbingan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <!-- Pencarian Tiket -->
        <div class="row mb-5">
            <div class="col-md-10 mx-auto">
            <div class="card shadow-sm">
                <div class="card-header text-white" style="background-color:rgb(0, 51, 132)">
                <h4 class="mb-0">Cari Status Tiket Bimbingan</h4>
                </div>
                <div class="card-body">
                <form method="GET" action="#">
                    @csrf
                    <div class="mb-3">
                    <label for="search" class="form-label">Kode Tiket</label>
                    <input type="search" class="form-control" placeholder="Masukkan Kode Tiket" id="search" name="search" value="{{ old('search') }}">
                    </div>
                    <div class="d-flex justify-content-end">
                    <button type="submit" class="btn text-white" style="background-color:rgb(0, 51, 132);">
                        <i class="bi bi-search me-1"></i> Cari Tiket
                    </button>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>

@endsection