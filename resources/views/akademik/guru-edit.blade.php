@extends('layouts.akademik')

@section('content')
<div class="container">
    <h1>Edit Guru</h1>
    <form action="{{ route('guru.update', $guru->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_guru" class="form-label">Nama Guru</label>
            <input type="text" name="nama_guru" class="form-control" value="{{ $guru->nama_guru }}" required>
        </div>
        <div class="mb-3">
            <label for="kode_guru" class="form-label">Kode Guru</label>
            <input type="text" name="kode_guru" class="form-control" value="{{ $guru->kode_guru }}" required>
        </div>
        <div class="mb-3">
            <label for="mapel_id" class="form-label">Mapel</label>
            <select name="mapel_id" class="form-control" required>
                <option value="">-- Pilih Mapel --</option>
                @foreach ($mapels as $mapel)
                <option value="{{ $mapel->id }}" {{ $guru->mapel_id == $mapel->id ? 'selected' : '' }}>
                    {{ $mapel->nama_mapel }} ({{ $mapel->kode_mapel }})
                </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <button type="submit" class="btn btn-primary">Verifikasi</button>
    </form>
</div>
@endsection