@extends('layouts.akademik')
@section('content')


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Data Siswa</h1>
            <div class="table-responsive">
                <div class="mb-3">
                    <a href="{{ route('akademik.studen.create') }}" class="btn btn-primary">Tambah Siswa</a>
                </div>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Nisn</th>
                            <th>Jenis Kelamin</th>
                            <th>tgl lahir</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $index => $student)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->nisn }}</td>
                            <td>{{ $student->jenis_kelamin }}</td>
                            <td>{{ $student->tgl_lahir }}</td>
                            <td>
                                <a href="{{ route('akademik.studen.edit', $student->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('akademik.studen.destroy', $student->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection