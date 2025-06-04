@php
    $isPartial = $isPartial ?? false;
    $beritaItems = $isPartial ? $berita->take(6) : $berita;
@endphp

@if($isPartial)
    <div class="row align-items-center mb-4">
        <div class="col-auto">
            <a href="{{ route('berita.index') }}" class="btn btn-outline-primary btn-sm">
                Lihat Semua <i class="fas fa-arrow-right ms-1"></i>
            </a>
        </div>
    </div>
@endif

<div>
<h1 style="text-align: center;">Berita</h1>
    <p class="text-muted: text-center">Berikut adalah daftar berita terbaru yang kami sajikan untuk Anda.</p>
</div>

<div class="row {{ $isPartial ? 'g-4' : '' }}">
    @forelse($beritaItems as $item)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 {{ $isPartial ? 'news-card-homepage shadow-sm' : 'shadow-sm' }}">
                @if($item->gambar)
                    <div class="card-img-wrapper {{ $isPartial ? 'homepage-img' : '' }}">
                        <img src="{{ asset($item->gambar) }}" 
                             class="card-img-top" 
                             alt="{{ $item->judul }}" 
                             style="height:{{ $isPartial ? '200px' : '180px' }};object-fit:cover;">
                        @if($isPartial)
                            <div class="img-overlay"></div>
                        @endif
                    </div>
                @endif
                
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title {{ $isPartial ? 'homepage-title' : '' }}">
                        {{ $isPartial ? Str::limit($item->judul, 50) : $item->judul }}
                    </h5>
                    <p class="card-text {{ $isPartial ? 'homepage-text' : '' }}">
                        {{ $item->excerpt ?? Str::limit(strip_tags($item->konten ?? ''), $isPartial ? 80 : 120) }}
                    </p>
                    
                    @if($isPartial)
                        <div class="mt-auto">
                            <div class="homepage-meta mb-2">
                                <small class="text-muted">
                                    <i class="fas fa-calendar me-1"></i>
                                    {{ $item->created_at->format('d M Y') }}
                                </small>
                                <small class="text-muted ms-2">
                                    <i class="fas fa-user me-1"></i>
                                    {{ $item->user->name ?? 'Admin' }}
                                </small>
                            </div>
                            <a href="{{ route('berita.show', $item->slug ?? $item->id) }}" 
                               class="btn btn-primary btn-sm w-100 homepage-btn">
                                <i class="fas fa-book-open me-1"></i>
                                Baca Selengkapnya
                            </a>
                        </div>
                    @else
                        <a href="{{ route('berita.show', $item->slug ?? $item->id) }}" 
                           class="mt-auto btn btn-primary btn-sm">
                            Baca Selengkapnya
                        </a>
                    @endif
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-info text-center {{ $isPartial ? 'homepage-empty' : '' }}">
                @if($isPartial)
                    <i class="fas fa-newspaper fa-2x mb-2 d-block text-primary"></i>
                    <h5 class="mb-2">Belum Ada Berita Terbaru</h5>
                    <p class="mb-0">Berita terbaru akan segera hadir. Silakan kembali lagi nanti.</p>
                @else
                    <i class="fas fa-info-circle me-2"></i>
                    Belum ada berita.
                @endif
            </div>
        </div>
    @endforelse
</div>

@if(!$isPartial && method_exists($berita, 'links'))
    <div class="d-flex justify-content-center mt-4">
        {{ $berita->links() }}
    </div>
@endif

@if($isPartial)
    <style>
        .section-title {
            font-weight: 700;
            color: #2c3e50;
            position: relative;
            font-size: 2rem;
        }

        .section-title::after {
            content: '';
            display: block;
            width: 80px;
            height: 4px;
            background: linear-gradient(45deg, #007bff, #0056b3);
            margin-top: 12px;
            border-radius: 2px;
        }

        .news-card-homepage {
            transition: all 0.4s ease;
            border: none;
            border-radius: 15px;
            overflow: hidden;
            background: #fff;
        }

        .news-card-homepage:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15) !important;
        }

        .homepage-img {
            position: relative;
            overflow: hidden;
        }

        .homepage-img img {
            transition: transform 0.5s ease;
        }

        .news-card-homepage:hover .homepage-img img {
            transform: scale(1.1);
        }

        .img-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, transparent 0%, rgba(0,0,0,0.1) 50%, rgba(0,0,0,0.3) 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .news-card-homepage:hover .img-overlay {
            opacity: 1;
        }

        .homepage-title {
            font-weight: 600;
            color: #2c3e50;
            line-height: 1.3;
            margin-bottom: 0.75rem;
        }

        .homepage-text {
            font-size: 0.9rem;
            line-height: 1.5;
            color: #6c757d;
            flex-grow: 1;
        }

        .homepage-meta {
            border-top: 1px solid #f1f3f4;
            padding-top: 0.5rem;
            font-size: 0.8rem;
        }

        .homepage-btn {
            transition: all 0.3s ease;
            font-weight: 500;
            border-radius: 8px;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
        }

        .homepage-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,123,255,0.3);
        }

        .homepage-empty {
            border: 2px dashed #dee2e6;
            background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);
            border-radius: 15px;
            padding: 3rem 2rem;
        }

        @media (max-width: 768px) {
            .row.align-items-center {
                text-align: center;
            }

            .row.align-items-center .col-auto {
                margin-top: 1rem;
                width: 100%;
            }

            .section-title {
                font-size: 1.5rem;
            }

            .news-card-homepage:hover {
                transform: translateY(-4px) scale(1.01);
            }
        }

        @media (max-width: 576px) {
            .homepage-meta {
                text-align: center;
            }

            .homepage-meta small {
                display: block;
                margin: 0.25rem 0;
            }
        }
    </style>
@endif
