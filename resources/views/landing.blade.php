@extends('layouts.main')

@section('content')

@push('styles')
<style>
    /* Enhanced carousel styling with more professional dimensions */
    #headerCarousel {
        max-width: 20%;
        margin: 0 auto 2rem;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    }
    
    .carousel-item {
        height: auto; /* Ubah dari fixed height ke auto */
        aspect-ratio: 16 / 5; 
    }
    
    .carousel-item img {
        object-fit: cover;
        height: 10%;
        width: 10%;
        filter: brightness(55%);
        max-height: 400px;
    }
    
    .carousel-caption {
        background: linear-gradient(to top, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0));
        padding: 1.5rem;
        bottom: 0;
        left: 0;
        right: 0;
        text-align: left;
    }
    
    .carousel-caption h5 {
        font-size: 1.6rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: #ffffff;
    }
    
    .carousel-caption p {
        font-size: 0.95rem;
        max-width: 90%;
        line-height: 1.4;
        color: #f0f0f0;
    }
    
    .carousel-indicators {
        bottom: 10px;
    }
    
    .carousel-indicators button {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        margin: 0 4px;
    }
    
    /* Container for the carousel with professional width */
    .carousel-container {
        width: 75%;
        max-width: 1200px;
        margin: 1.5rem auto;
    }
    
    /* Enhanced cards styling with professional look */
    .feature-cards {
        margin-bottom: 3rem;
        max-width: 1200px;
        margin-left: auto;
        margin-right: auto;
        padding: 0 15px;
    }
    
    .feature-card {
        height: 100%;
        border: none;
        border-radius: 6px;
        transition: transform 0.2s, box-shadow 0.2s;
        overflow: hidden;
        background-color: #fff;
    }
    
    .feature-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
    
    .feature-card .card-body {
        padding: 1.75rem;
        min-height: 200px;
        display: flex;
        flex-direction: column;
    }
    
    .feature-card .card-title {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 0.75rem;
        color: #0a2550;
        position: relative;
        padding-bottom: 0.6rem;
    }
    
    .feature-card .card-title:after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 40px;
        height: 2px;
        background-color: #4d96ff;
    }
    
    .feature-card .card-text {
        color: #475569;
        font-size: 0.9rem;
        line-height: 1.5;
        flex-grow: 1;
        margin-bottom: 1.25rem;
    }
    
    .feature-card .btn {
        align-self: flex-start;
        padding: 0.5rem 1.25rem;
        font-weight: 500;
        border-radius: 4px;
        font-size: 0.85rem;
        letter-spacing: 0.3px;
        transition: all 0.2s;
    }
    
    .feature-card .btn-primary {
        background-color: #4d96ff;
        border-color: #4d96ff;
    }
    
    .feature-card .btn-primary:hover {
        background-color: #0a2550;
        border-color: #0a2550;
    }
    
    .feature-card .card-icon {
        font-size: 1.8rem;
        margin-bottom: 1.25rem;
        color: #4d96ff;
    }
    
    /* Section title for feature cards */
    .section-title {
        text-align: center;
        margin-bottom: 2rem;
        position: relative;
        padding-bottom: 0.75rem;
        font-weight: 600;
        color: #0a2550;
        font-size: 1.75rem;
    }
    
    .section-title:after {
        content: '';
        position: absolute;
        width: 60px;
        height: 3px;
        background-color: #4d96ff;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .carousel-container {
            width: 95%;
        }
        
        .carousel-item {
            height: 250px;
        }
    }
    
    @media (max-width: 768px) {
        .carousel-item {
            height: 220px;
        }
        
        .carousel-caption {
            padding: 1rem;
        }
        
        .carousel-caption h5 {
            font-size: 1.3rem;
        }
        
        .carousel-caption p {
            font-size: 0.85rem;
        }
        
        .section-title {
            font-size: 1.5rem;
        }
    }
    
    @media (max-width: 576px) {
        .carousel-item {
            height: 200px;
        }
    }
    
    /* Ensure compatibility with main layout theme colors */
    .animate__animated {
        animation-duration: 0.8s;
    }
    
    .animate__fadeInUp {
        animation-name: fadeInUp;
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translate3d(0, 30px, 0);
        }
        to {
            opacity: 1;
            transform: translate3d(0, 0, 0);
        }
    }
</style>
@endpush

<!-- Professional Carousel Section with Optimized Height -->
<section class="carousel-container">
    <div id="headerCarousel" class="carousel slide" data-bs-ride="carousel" style="aspect-ratio: 16 / 7;">
        <!-- Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#headerCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#headerCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#headerCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <!-- Slides -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('images/Fotogedung.PNG')}}" class="d-block w-100" style="height: 50%;" alt="Gedung Sekolah">
                <div class="carousel-caption d-md-block">
                    <h5>Selamat Datang di MAN 2 Kota Kediri</h5>
                    <p>Menyediakan pendidikan berkualitas tinggi dalam lingkungan yang inspiratif.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset('images/BG.PNG')}}" class="d-block w-100" style="height: 50%;" alt="Prestasi Siswa">
                <div class="carousel-caption d-md-block">
                    <h5>Prestasi Gemilang Siswa</h5>
                    <p>Siswa kami meraih berbagai penghargaan bergengsi di tingkat regional dan nasional.</p>
                </div>
            </div>
            <!-- <div class="carousel-item">
                <img src="https://source.unsplash.com/1200x600/?classroom" class="d-block w-100" alt="Fasilitas Sekolah">
                <div class="carousel-caption d-md-block">
                    <h5>Fasilitas Modern</h5>
                    <p>Dilengkapi sarana pembelajaran mutakhir untuk proses belajar mengajar yang efektif.</p>
                </div>
            </div> -->
        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#headerCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Sebelumnya</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#headerCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Selanjutnya</span>
        </button>
    </div>
</section>
<br>
<!-- Professional Feature Cards Section -->
<section class="feature-cards">
    <h2 class="section-title">Fitur Unggulan</h2>
    <br>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card feature-card shadow-sm">
                <div class="card-body">
                    <div class="card-icon">
                        <i class="fas fa-info-circle"></i>
                    </div>
                    <h5 class="card-title">Informasi Sekolah</h5>
                    <p class="card-text">Akses berbagai informasi penting terkait kegiatan, kebijakan, dan program unggulan MAN 2 Kota Kediri.</p>
                    <a href="#" class="btn btn-primary">Selengkapnya</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card feature-card shadow-sm">
                <div class="card-body">
                    <div class="card-icon">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <h5 class="card-title">Prestasi Siswa</h5>
                    <p class="card-text">Lihat daftar lengkap prestasi membanggakan dari siswa-siswi kami di berbagai bidang kompetisi.</p>
                    <a href="#" class="btn btn-primary">Lihat Prestasi</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card feature-card shadow-sm">
                <div class="card-body">
                    <div class="card-icon">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <h5 class="card-title">PPDBM</h5>
                    <p class="card-text">Informasi lengkap mengenai proses pendaftaran, persyaratan, dan jadwal penerimaan siswa baru.</p>
                    <a href="#" class="btn btn-primary">Daftar Sekarang</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

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
                        entry.target.classList.add('animate__animated', 'animate__fadeInUp');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);
            
            document.querySelectorAll('.feature-card').forEach((card, index) => {
                // Add slight delay between each card animation
                setTimeout(() => {
                    observer.observe(card);
                }, index * 150);
            });
        }
    });
</script>
@endpush