@extends('layouts.main')

@section('content')

@push('styles')
<style>
    /* Enhanced carousel styling with reduced width */
    #headerCarousel {
        max-width: 900px; /* Reduced from 1140px */
        margin: 0 auto 3rem;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
    
    .carousel-item {
        height: 450px; /* Slightly reduced height to match the narrower width */
    }
    
    .carousel-item img {
        object-fit: cover;
        height: 100%;
        width: 100%;
        filter: brightness(65%);
    }
    
    .carousel-caption {
        background: linear-gradient(to top, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0));
        border-radius: 0;
        padding: 2rem;
        bottom: 0;
        left: 0;
        right: 0;
        text-align: left;
    }
    
    .carousel-caption h5 {
        font-size: 2rem; /* Slightly reduced from 2.2rem */
        font-weight: 700;
        margin-bottom: 0.8rem;
    }
    
    .carousel-caption p {
        font-size: 1.1rem;
        max-width: 90%;
    }
    
    .carousel-indicators {
        bottom: 20px;
    }
    
    .carousel-indicators button {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        margin: 0 6px;
    }
    
    /* Container for the carousel to control width */
    .carousel-container {
        width: 80%; /* This makes the carousel take up only 80% of the parent width */
        margin: 0 auto;
    }
    
    /* Enhanced cards styling */
    .feature-cards {
        margin-bottom: 4rem;
        max-width: 1000px; /* Slightly narrower than default container */
        margin-left: auto;
        margin-right: auto;
    }
    
    .feature-card {
        height: 100%;
        border: none;
        border-radius: 12px;
        transition: transform 0.3s, box-shadow 0.3s;
        overflow: hidden;
    }
    
    .feature-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    }
    
    .feature-card .card-body {
        padding: 2rem;
        min-height: 220px;
        display: flex;
        flex-direction: column;
    }
    
    .feature-card .card-title {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 1rem;
        color: #2c3e50;
        position: relative;
        padding-bottom: 0.8rem;
    }
    
    .feature-card .card-title:after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 50px;
        height: 3px;
        background-color: #3498db;
    }
    
    .feature-card .card-text {
        color: #5d6778;
        font-size: 1rem;
        line-height: 1.6;
        flex-grow: 1;
        margin-bottom: 1.5rem;
    }
    
    .feature-card .btn {
        align-self: flex-start;
        padding: 0.6rem 1.5rem;
        font-weight: 500;
        border-radius: 30px;
        text-transform: uppercase;
        font-size: 0.85rem;
        letter-spacing: 0.5px;
        transition: all 0.3s;
    }
    
    .feature-card .btn-primary {
        background-color: #3498db;
        border-color: #3498db;
    }
    
    .feature-card .btn-primary:hover {
        background-color: #2980b9;
        border-color: #2980b9;
    }
    
    .feature-card .card-icon {
        font-size: 2.5rem;
        margin-bottom: 1.5rem;
        color: #3498db;
    }
    
    /* Responsive adjustments */
    @media (max-width: 992px) {
        .carousel-container {
            width: 90%;
        }
        
        #headerCarousel {
            max-width: 100%;
        }
    }
    
    @media (max-width: 768px) {
        .carousel-item {
            height: 350px;
        }
        
        .carousel-caption {
            padding: 1.5rem;
        }
        
        .carousel-caption h5 {
            font-size: 1.6rem;
        }
        
        .carousel-container {
            width: 95%;
        }
    }
</style>
@endpush

<!-- Enhanced Carousel Section with Narrower Width -->
<section class="carousel-container">
    <div id="headerCarousel" class="carousel slide" data-bs-ride="carousel">
        <!-- Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#headerCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#headerCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#headerCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <!-- Slides -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('images/Fotogedung.PNG')}}" class="d-block w-100" alt="Gedung Sekolah">
                <div class="carousel-caption d-md-block">
                    <h5>Selamat Datang di Sekolah Kami</h5>
                    <p>Menyediakan pendidikan berkualitas dengan standar akademik tinggi dalam lingkungan yang inspiratif.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/1200x600/?student" class="d-block w-100" alt="Prestasi Siswa">
                <div class="carousel-caption d-md-block">
                    <h5>Prestasi Gemilang Siswa</h5>
                    <p>Siswa kami telah meraih berbagai penghargaan bergengsi di tingkat regional dan nasional.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/1200x600/?classroom" class="d-block w-100" alt="Fasilitas Sekolah">
                <div class="carousel-caption d-md-block">
                    <h5>Fasilitas Modern</h5>
                    <p>Dilengkapi dengan sarana pembelajaran mutakhir untuk mendukung proses belajar mengajar yang efektif.</p>
                </div>
            </div>
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

<!-- Enhanced Cards Section -->
<section class="container feature-cards">
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card feature-card shadow">
                <div class="card-body">
                    <div class="card-icon">
                        <i class="fas fa-info-circle"></i>
                    </div>
                    <h5 class="card-title">Informasi Sekolah</h5>
                    <p class="card-text">Akses berbagai informasi penting terkait kegiatan, kebijakan, dan program unggulan sekolah kami.</p>
                    <a href="#" class="btn btn-primary">Selengkapnya</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card feature-card shadow">
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
            <div class="card feature-card shadow">
                <div class="card-body">
                    <div class="card-icon">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <h5 class="card-title">Pendaftaran</h5>
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
        new bootstrap.Carousel(carousel, {
            interval: 6000,
            pause: 'hover',
            wrap: true,
            keyboard: true
        });
        
        // Add animation to cards on scroll
        const observerOptions = {
            threshold: 0.1
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate__animated', 'animate__fadeInUp');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);
        
        document.querySelectorAll('.feature-card').forEach(card => {
            observer.observe(card);
        });
    });
</script>
@endpush