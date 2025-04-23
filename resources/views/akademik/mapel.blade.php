@extends('layouts.akademik')

@section('content')
<div class="container">
    <h1>Daftar Mata Pelajaran</h1>
    <a href="{{ route('mapel.create') }}" class="btn btn-primary mb-3">Tambah Mata Pelajaran</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Mata Pelajaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mapels as $mapel)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $mapel->nama_mapel }}</td>
                    <td>
                        <a href="{{ route('mapel.edit', $mapel->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('mapel.destroy', $mapel->id) }}" method="POST" style="display:inline;">
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