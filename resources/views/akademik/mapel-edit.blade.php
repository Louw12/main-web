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
        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
</div>
@endsection