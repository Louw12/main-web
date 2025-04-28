@extends('layouts.akademik')

@section('content')
<div class="container">
    <h1>Tambah Guru</h1>
    <form action="{{ route('guru.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_guru" class="form-label">Nama Guru</label>
            <input type="text" name="nama_guru" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="kode_guru" class="form-label">Kode Guru</label>
            <input type="text" name="kode_guru" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="mapel_id" class="form-label">Mapel</label>
            <select name="mapel_id" class="form-control" required>
                <option value="">-- Pilih Mapel --</option>
                @foreach ($mapels as $mapel)
                    <!-- <option value="{{ $mapel->id }}">{{ $mapel->nama_mapel }}</option> -->
                <option value="{{ $mapel->id }}">{{ $mapel->nama_mapel }} ({{ $mapel->kode_mapel }})</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection