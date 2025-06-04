@extends('layouts.admin')
@section('content')
    <style>
        .article-content {
            line-height: 1.8;
            font-size: 16px;
        }
        .article-content img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin: 20px 0;
        }
        .article-meta {
            border-left: 4px solid #007bff;
            padding-left: 15px;
            background: #f8f9fa;
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <!-- Main content -->
            <main class="col-12 px-0">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Detail Berita</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <a href="{{ route('berita.edit', $berita->id) }}" class="btn btn-primary">
                                <i class="fas fa-edit me-2"></i>Edit
                            </a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                <i class="fas fa-trash me-2"></i>Hapus
                            </button>
                        </div>
                        <a href="{{ route('berita.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Kembali
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8">
                        <!-- Article -->
                        <article class="card">
                            <div class="card-body">
                                <!-- Status Badge -->
                                <div class="mb-3">
                                    @if($berita->status == 'published')
                                        <span class="badge bg-success fs-6">
                                            <i class="fas fa-check-circle me-1"></i>Published
                                        </span>
                                    @else
                                        <span class="badge bg-warning fs-6">
                                            <i class="fas fa-clock me-1"></i>Draft
                                        </span>
                                    @endif
                                </div>

                                <!-- Title -->
                                <h1 class="display-6 fw-bold mb-4">{{ $berita->judul }}</h1>

                                <!-- Meta Information -->
                                <div class="article-meta p-3 mb-4 rounded">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <small class="text-muted">
                                                <i class="fas fa-user me-1"></i>
                                                <strong>Penulis:</strong> {{ $berita->user->name ?? 'N/A' }}
                                            </small>
                                        </div>
                                        <div class="col-md-6">
                                            <small class="text-muted">
                                                <i class="fas fa-calendar me-1"></i>
                                                <strong>Dibuat:</strong> {{ $berita->created_at->format('d F Y, H:i') }}
                                            </small>
                                        </div>
                                    </div>
                                    @if($berita->created_at != $berita->updated_at)
                                    <div class="row mt-2">
                                        <div class="col-12">
                                            <small class="text-muted">
                                                <i class="fas fa-edit me-1"></i>
                                                <strong>Terakhir diupdate:</strong> {{ $berita->updated_at->format('d F Y, H:i') }}
                                            </small>
                                        </div>
                                    </div>
                                    @endif
                                </div>

                                <!-- Featured Image -->
                                @if($berita->gambar)
                                <div class="mb-4">
                                    <img src="{{ asset($berita->gambar) }}" alt="{{ $berita->judul }}" 
                                         class="img-fluid rounded shadow-sm">
                                </div>
                                @endif

                                <!-- Content -->
                                <div class="article-content">
                                    {!! nl2br(e($berita->isi)) !!}
                                </div>
                            </div>
                        </article>
                    </div>

                    <!-- Sidebar -->
                    <div class="col-lg-4">
                        <!-- Quick Actions -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h6 class="card-title mb-0">Aksi Cepat</h6>
                            </div>
                            <div class="card-body">
                                <div class="d-grid gap-2">
                                    <a href="{{ route('berita.edit', $berita->id) }}" class="btn btn-primary">
                                        <i class="fas fa-edit me-2"></i>Edit Berita
                                    </a>
                                    @if($berita->status == 'draft')
                                    <form action="{{ route('berita.update', $berita->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="judul" value="{{ $berita->judul }}">
                                        <input type="hidden" name="isi" value="{{ $berita->isi }}">
                                        <input type="hidden" name="status" value="published">
                                        <button type="submit" class="btn btn-success w-100">
                                            <i class="fas fa-rocket me-2"></i>Publish Sekarang
                                        </button>
                                    </form>
                                    @else
                                    <form action="{{ route('berita.update', $berita->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="judul" value="{{ $berita->judul }}">
                                        <input type="hidden" name="isi" value="{{ $berita->isi }}">
                                        <input type="hidden" name="status" value="draft">
                                        <button type="submit" class="btn btn-warning w-100">
                                            <i class="fas fa-eye-slash me-2"></i>Unpublish
                                        </button>
                                    </form>
                                    @endif
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                        <i class="fas fa-trash me-2"></i>Hapus Berita
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Article Info -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <h6 class="card-title mb-0">Informasi Berita</h6>
                            </div>
                            <div class="card-body">
                                <table class="table table-borderless table-sm">
                                    <tr>
                                        <td><strong>ID:</strong></td>
                                        <td>{{ $berita->id }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Slug:</strong></td>
                                        <td><code>{{ $berita->slug }}</code></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Status:</strong></td>
                                        <td>
                                            @if($berita->status == 'published')
                                                <span class="badge bg-success">Published</span>
                                            @else
                                                <span class="badge bg-warning">Draft</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Penulis:</strong></td>
                                        <td>{{ $berita->user->name ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Jumlah Kata:</strong></td>
                                        <td>{{ str_word_count(strip_tags($berita->isi)) }} kata</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Jumlah Karakter:</strong></td>
                                        <td>{{ strlen($berita->isi) }} karakter</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <!-- SEO Info -->
                        <div class="card">
                            <div class="card-header">
                                <h6 class="card-title mb-0">Informasi SEO</h6>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <small class="text-muted d-block">URL Preview:</small>
                                    <code class="small">{{ url('/berita/' . $berita->slug) }}</code>
                                </div>
                                <div class="mb-3">
                                    <small class="text-muted d-block">Meta Description:</small>
                                    <p class="small">{{ $berita->excerpt }}</p>
                                </div>
                                @if($berita->gambar)
                                <div>
                                    <small class="text-muted d-block">Featured Image:</small>
                                    <small class="text-success">
                                        <i class="fas fa-check me-1"></i>Tersedia
                                    </small>
                                </div>
                                @else
                                <div>
                                    <small class="text-muted d-block">Featured Image:</small>
                                    <small class="text-warning">
                                        <i class="fas fa-exclamation-triangle me-1"></i>Tidak ada
                                    </small>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus berita ini?</p>
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <strong>Peringatan:</strong> Tindakan ini tidak dapat dibatalkan.
                    </div>
                    <div class="bg-light p-3 rounded">
                        <strong>{{ $berita->judul }}</strong>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <form action="{{ route('berita.destroy', $berita->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash me-2"></i>Ya, Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

@endsection