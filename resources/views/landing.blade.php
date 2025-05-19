@extends('layouts.main')

@section('slider')
@include('layouts.slider')
@endsection

@section('content')

@push('styles')
<!-- Professional Feature Cards Section -->
<section class="feature-cards">
    <h2 class="section-title" style="text-align: center">Fitur Unggulan</h2>
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