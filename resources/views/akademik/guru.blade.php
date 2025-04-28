@extends('layouts.akademik')

@section('content')
<div class="container">
    <h1>Daftar Guru</h1>
    <a href="{{ route('guru.create') }}" class="btn btn-primary mb-3">Tambah Guru</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Guru</th>
                <th>Kode Guru</th>
                <th>Mapel</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gurus as $guru)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $guru->nama_guru }}</td>
                    <td>{{ $guru->kode_guru }}</td>
                    <!-- <td>{{ $guru->mapel->nama_mapel ?? '-' }}</td> -->
                    <td>{{ $guru->mapel->kode_mapel ?? '-' }} - {{ $guru->mapel->nama_mapel ?? '-' }}</td>
                    <td>
                        <a href="{{ route('guru.edit', $guru->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('guru.destroy', $guru->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection