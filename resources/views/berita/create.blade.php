@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Main content -->
            <main class="col-12 px-0">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Tambah Berita</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <a href="{{ route('berita.index') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Kembali
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
                        <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="card mb-6">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Informasi Berita</h5>
                                </div>
                                <div class="card-body">
                                    <!-- Judul -->
                                    <div class="mb-3">
                                        <label for="judul" class="form-label">Judul Berita <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                                               id="judul" name="judul" value="{{ old('judul') }}" 
                                               placeholder="Masukkan judul berita" required>
                                        @error('judul')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Isi Berita -->
                                    <div class="mb-3">
                                        <label for="isi" class="form-label">Isi Berita <span class="text-danger">*</span></label>
                                        <textarea class="form-control @error('isi') is-invalid @enderror" 
                                                  id="isi" name="isi" rows="10" required>{{ old('isi') }}</textarea>
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
                                    <!-- Gambar -->
                                    <div class="mb-3">
                                        <label for="gambar" class="form-label">Gambar Berita</label>
                                        <input type="file" class="form-control @error('gambar') is-invalid @enderror" 
                                               id="gambar" name="gambar" accept="image/*">
                                        <div class="form-text">
                                            Format yang didukung: JPEG, PNG, JPG, GIF. Maksimal 2MB.
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
                                            <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                                            <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
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
                                    <i class="fas fa-save me-2"></i>Simpan Berita
                                </button>
                                <a href="{{ route('berita.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-times me-2"></i>Batal
                                </a>
                            </div>
                        </form>
                    </div>

                    <!-- Sidebar Info -->
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="card-title mb-0">Tips Menulis Berita</h6>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled">
                                    <li class="mb-2">
                                        <i class="fas fa-check text-success me-2"></i>
                                        Gunakan judul yang menarik dan informatif
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-check text-success me-2"></i>
                                        Tulis paragraf pembuka yang kuat
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-check text-success me-2"></i>
                                        Gunakan gambar berkualitas tinggi
                                    </li>
                                    <li class="mb-2">
                                        <i class="fas fa-check text-success me-2"></i>
                                        Periksa ejaan dan tata bahasa
                                    </li>
                                    <li>
                                        <i class="fas fa-check text-success me-2"></i>
                                        Simpan sebagai draft untuk review
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
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.7.0/tinymce.min.js"></script> -->
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