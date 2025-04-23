@extends('layouts.akademik')

@section('content')
<div class="container">
    <h1>Edit Mata Pelajaran</h1>
    <form action="{{ route('mapel.update', $mapel->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_mapel" class="form-label">Nama Mata Pelajaran</label>
            <input type="text" name="nama_mapel" class="form-control" value="{{ $mapel->nama_mapel }}" required>
        </div>
        <div class="mb-3">
            <label for="kode_mapel" class="form-label">Kode Mapel</label>
            <input type="text" name="kode_mapel" class="form-control" value="{{ $mapel->kode_mapel }}" required>
            <br>
        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
</div>
@endsection