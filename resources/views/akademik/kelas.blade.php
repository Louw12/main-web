@extends('layouts.akademik')
@section('content')

<div class="container">
    <h2>Daftar Kelas</h2>
    <a href="{{ route('kelas.create') }}" class="btn btn-primary mb-3">Tambah Kelas</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Kelas</th>
                <th>Kode Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kelas as $item)
            <tr>
                <td>{{ $item->nama_kelas }}</td>
                <td>{{ $item->kode_kelas }}</td>
                <td>
                    <a href="{{ route('kelas.edit', $item->kode_kelas) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('kelas.destroy', $item->kode_kelas) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection