@extends('layouts.admin')
@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.7.0/tinymce.min.js"></script>
    <div class="container-fluid">
        <div class="row">
            <!-- Main content -->
            <main class="col-12 px-0">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Edit Berita</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <a href="{{ route('berita.index') }}" class="btn btn-outline-secondary me-2">
                            <i class="fas fa-arrow-left me-2"></i>Kembali
                        </a>
                        <a href="{{ route('berita.show', $berita->id) }}" class="btn btn-outline-info">
                            <i class="fas fa-eye me-2"></i>Lihat
                        </a>
                    </div>
                </div>

                <!-- Error Messages -->
                @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h6><i class="fas fa-exclamation-triangle me-2"></i>Terdapat kesalahan:</h6>
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif

                <!-- Form -->
                <div class="row">
                    <div class="col-lg-8">
                        <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Informasi Berita</h5>
                                </div>
                                <div class="card-body">
                                    <!-- Judul -->
                                    <div class="mb-3">
                                        <label for="judul" class="form-label">Judul Berita <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                                               id="judul" name="judul" value="{{ old('judul', $berita->judul) }}" 
                                               placeholder="Masukkan judul berita" required>
                                        @error('judul')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Isi Berita -->
                                    <div class="mb-3">
                                        <label for="isi" class="form-label">Isi Berita <span class="text-danger">*</span></label>
                                        <textarea class="form-control @error('isi') is-invalid @enderror" 
                                                  id="isi" name="isi" rows="10" required>{{ old('isi', $berita->isi) }}</textarea>
                                        @error('isi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Media & Pengaturan</h5>
                                </div>
                                <div class="card-body">
                                    <!-- Gambar Saat Ini -->
                                    @if($berita->gambar)
                                    <div class="mb-3">
                                        <label class="form-label">Gambar Saat Ini</label>
                                        <div class="mb-2">
                                            <img src="{{ asset($berita->gambar) }}" alt="{{ $berita->judul }}" 
                                                 class="img-thumbnail" style="max-width: 300px;">
                                        </div>
                                    </div>
                                    @endif

                                    <!-- Upload Gambar Baru -->
                                    <div class="mb-3">
                                        <label for="gambar" class="form-label">
                                            {{ $berita->gambar ? 'Ganti Gambar' : 'Gambar Berita' }}
                                        </label>
                                        <input type="file" class="form-control @error('gambar') is-invalid @enderror" 
                                               id="gambar" name="gambar" accept="image/*">
                                        <div class="form-text">
                                            Format yang didukung: JPEG, PNG, JPG, GIF. Maksimal 2MB.
                                            {{ $berita->gambar ? 'Kosongkan jika tidak ingin mengganti gambar.' : '' }}
                                        </div>
                                        @error('gambar')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        
                                        <!-- Preview -->
                                        <div id="imagePreview" class="mt-3" style="display: none;">
                                            <img id="preview" src="" alt="Preview" class="img-thumbnail" style="max-width: 300px;">
                                        </div>
                                    </div>

                                    <!-- Status -->
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                                        <select class="form-select @error('status') is-invalid @enderror" 
                                                id="status" name="status" required>
                                            <option value="draft" {{ old('status', $berita->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                                            <option value="published" {{ old('status', $berita->status) == 'published' ? 'selected' : '' }}>Published</option>
                                        </select>
                                        @error('status')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="d-flex gap-2 mb-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i>Update Berita
                                </button>
                                <a href="{{ route('berita.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-times me-2"></i>Batal
                                </a>
                            </div>
                        </form>
                    </div>

                    <!-- Sidebar Info -->
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h6 class="card-title mb-0">Informasi Berita</h6>
                            </div>
                            <div class="card-body">
                                <table class="table table-borderless table-sm">
                                    <tr>
                                        <td><strong>Dibuat:</strong></td>
                                        <td>{{ $berita->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Diupdate:</strong></td>
                                        <td>{{ $berita->updated_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Penulis:</strong></td>
                                        <td>{{ $berita->user->name ?? 'N/A' }}</td>
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
                                </table>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h6 class="card-title mb-0">Tips Editing</h6>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled">
                                    <li class="mb-2">
                                        <i class="fas fa-check text-success me-2"></i>
                                        Periksa kembali judul dan isi berita
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-check text-success me-2"></i>
                                        Pastikan gambar sesuai dengan konten
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-check text-success me-2"></i>
                                        Ubah status ke Published jika sudah siap
                                    </li>
                                    <li>
                                        <i class="fas fa-check text-success me-2"></i>
                                        Simpan perubahan secara berkala
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        // Initialize TinyMCE
        tinymce.init({
            selector: '#isi',
            height: 400,
            plugins: [
                'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                'insertdatetime', 'media', 'table', 'help', 'wordcount'
            ],
            toolbar: 'undo redo | blocks | bold italic forecolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
        });

        // Image preview
        document.getElementById('gambar').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview').src = e.target.result;
                    document.getElementById('imagePreview').style.display = 'block';
                }
                reader.readAsDataURL(file);
            } else {
                document.getElementById('imagePreview').style.display = 'none';
            }
        });
    </script>

@endsection