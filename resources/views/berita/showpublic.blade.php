@extends('layouts.main')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <article class="card mb-4">
                @if($berita->gambar)
                    <img src="{{ asset($berita->gambar) }}" class="card-img-top mb-3" alt="{{ $berita->judul }}">
                @endif
                <div class="card-body">
                    <h1 class="card-title">{{ $berita->judul }}</h1>
                    <div class="mb-2 text-muted">
                        <small>
                            <i class="fas fa-user"></i> {{ $berita->user->name ?? 'Admin' }} &nbsp;|&nbsp;
                            <i class="fas fa-calendar"></i> {{ $berita->created_at->format('d M Y, H:i') }}
                        </small>
                    </div>
                    <div class="mb-2">
                        <span class="badge bg-secondary">Slug: <code>{{ $berita->slug }}</code></span>
                    </div>
                    <div class="article-content mt-4">
                        {!! $berita->isi !!}
                    </div>
                </div>
            </article>
            <a href="{{ url('/berita') }}" class="btn btn-outline-primary">
                <i class="fas fa-arrow-left me-2"></i>Kembali ke Daftar Berita
            </a>
        </div>
    </div>
</div>
@endsection