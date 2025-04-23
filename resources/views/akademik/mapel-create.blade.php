@extends('layouts.akademik')

@section('content')
<div class="container">
    <h1>Tambah Mata Pelajaran</h1>
    <form action="{{ route('mapel.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_mapel" class="form-label">Nama Mata Pelajaran</label>
            <input type="text" name="nama_mapel" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="kode_mapel" class="form-label">Kode Mapel</label>
            <input type="text" name="kode_mapel" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection