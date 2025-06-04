@extends('layouts.akademik')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Edit Siswa</h1>
            <form action="{{ route('akademik.siswa.update', $student->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nama Siswa</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $student->name }}" required>
                </div>
                <div class="form-group">   
                    <label for="nisn">NISN</label>
                    <input type="text" class="form-control" id="nisn" name="nisn" value="{{ $student->nisn }}" required>
                </div> 
                <div class="form-group">
                    <label for="gender">Jenis Kelamin</label>
                    <select class="form-control" id="gender" name="gender" required>
                        <option value="L" {{ $student->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ $student->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tgl_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="{{ $student->tgl_lahir }}" required>
                </div>
                <div class="button-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('akademik.siswa.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection