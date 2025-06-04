@extends('layouts.main')

@section('slider')
    @include('layouts.slider')
@endsection

@section('content')
    <!-- Feature Cards Section -->
    <section class="feature-cards py-5">
        <div class="container">
            <h2 class="section-title text-center mb-5">Fitur Unggulan</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card feature-card shadow-sm h-100">
                        <div class="card-body d-flex flex-column">
                            <div class="card-icon text-center mb-3">
                                <i class="fas fa-info-circle fa-3x text-primary"></i>
                            </div>
                            <h5 class="card-title text-center">Informasi Sekolah</h5>
                            <p class="card-text flex-grow-1">Akses berbagai informasi penting terkait kegiatan, kebijakan, dan program unggulan MAN 2 Kota Kediri.</p>
                            <a href="#" class="btn btn-primary mt-auto">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card shadow-sm h-100">
                        <div class="card-body d-flex flex-column">
                            <div class="card-icon text-center mb-3">
                                <i class="fas fa-trophy fa-3x text-warning"></i>
                            </div>
                            <h5 class="card-title text-center">Prestasi Siswa</h5>
                            <p class="card-text flex-grow-1">Lihat daftar lengkap prestasi membanggakan dari siswa-siswi kami di berbagai bidang kompetisi.</p>
                            <a href="#" class="btn btn-primary mt-auto">Lihat Prestasi</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card shadow-sm h-100">
                        <div class="card-body d-flex flex-column">
                            <div class="card-icon text-center mb-3">
                                <i class="fas fa-user-graduate fa-3x text-success"></i>
                            </div>
                            <h5 class="card-title text-center">PPDBM</h5>
                            <p class="card-text flex-grow-1">Informasi lengkap mengenai proses pendaftaran, persyaratan, dan jadwal penerimaan siswa baru.</p>
                            <a href="#" class="btn btn-primary mt-auto">Daftar Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section class="news-section py-5 bg-light">
        <div class="container">
            <!-- @include('berita', ['isPartial' => true]) -->
            @include('berita', ['berita' => $berita, 'isPartial' => false])
        </div>
    </section>
@endsection

@push('styles')
<style>
    .feature-cards {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    }
    
    .feature-card {
        transition: all 0.3s ease;
        border: none;
        border-radius: 15px;
        overflow: hidden;
    }
    
    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 35px rgba(0,0,0,0.1) !important;
    }
    
    .card-icon {
        margin-bottom: 1rem;
    }
    
    .card-icon i {
        transition: all 0.3s ease;
    }
    
    .feature-card:hover .card-icon i {
        transform: scale(1.1);
    }
    
    .section-title {
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 3rem;
        position: relative;
    }
    
    .section-title::after {
        content: '';
        display: block;
        width: 60px;
        height: 4px;
        background: linear-gradient(45deg, #007bff, #0056b3);
        margin: 1rem auto;
        border-radius: 2px;
    }
    
    .news-section {
        min-height: 400px; /* Ensure section has minimum height */
    }
    
    /* Animation classes for intersection observer */
    .animate__fadeInUp {
        animation-duration: 0.6s;
        animation-fill-mode: both;
        animation-name: fadeInUp;
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translate3d(0, 40px, 0);
        }
        to {
            opacity: 1;
            transform: translate3d(0, 0, 0);
        }
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize carousel with enhanced options
        const carousel = document.querySelector('#headerCarousel');
        if (carousel) {
            new bootstrap.Carousel(carousel, {
                interval: 5000,
                pause: 'hover',
                wrap: true,
                keyboard: true
            });
        }
        
        // Add subtle animation to cards on scroll
        if ('IntersectionObserver' in window) {
            const observerOptions = {
                threshold: 0.2,
                rootMargin: '0px 0px -50px 0px'
            };
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate__fadeInUp');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);
            
            // Observe feature cards
            document.querySelectorAll('.feature-card').forEach((card, index) => {
                setTimeout(() => {
                    observer.observe(card);
                }, index * 150);
            });
            
            // Observe news section
            const newsSection = document.querySelector('.news-section');
            if (newsSection) {
                observer.observe(newsSection);
            }
        }
        
        // Debug: Check if berita include is loaded
        console.log('News section loaded:', document.querySelector('.news-section'));
        
        // Add error handling for missing includes
        const newsContainer = document.querySelector('.news-section');
        if (newsContainer && newsContainer.children.length === 0) {
            console.warn('Berita include may not be loading properly');
        }
    });
</script>
@endpush