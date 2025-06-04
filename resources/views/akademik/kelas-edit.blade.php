@extends('layouts.akademik')
@section('content')
<div class="container">
    <h2>Edit Kelas</h2>
    <form action="{{ route('kelas.update', $kelas->kode_kelas) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nama Kelas</label>
            <input type="text" name="nama_kelas" class="form-control" value="{{ $kelas->nama_kelas }}" required>
        </div>
        <div class="mb-3">
            <label>Kode Kelas</label>
            <input type="text" name="kode_kelas" class="form-control" value="{{ $kelas->kode_kelas }}" required>
        </div>
        <div class="mb-3">
            <label>Input Siswa</label>
            <select name="siswa[]" class="form-control select2" multiple required>
            @foreach($students as $student)
                <option value="{{ $student->id }}"
                    {{ optional($kelas->siswa)->pluck('id')->contains($student->id) ? 'selected' : '' }}>
                    {{ $student->name }}
                </option>
            @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection