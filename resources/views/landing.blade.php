@extends('layouts.main')

@section('content')

@push('styles')
<style>
    .carousel-item {
        height: 650px;
        position: relative;
    }

    .carousel-item img {
        object-fit: cover;
        width: 100%;
        height: 100%;
        filter: brightness(70%);
    }

    .carousel-caption {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgba(10, 37, 80, 0.65);
        padding: 30px;
        border-radius: 15px;
        color: #fff;
        text-align: center;
        max-width: 80%;
    }

    .carousel-caption h2 {
        font-size: 2.5rem;
        font-weight: bold;
    }

    .carousel-caption p {
        font-size: 1.2rem;
        margin-top: 10px;
    }

    .carousel-indicators [data-bs-target] {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background-color: #fff;
    }

    .btn-primary {
        background-color: #4d96ff;
        border-color: #4d96ff;
    }

    .btn-primary:hover {
        background-color: #3d85ff;
        border-color: #3d85ff;
    }
</style>
@endpush

<!-- Bootstrap Carousel -->
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
            <img src="https://source.unsplash.com/1200x650/?school,building" alt="Gedung Sekolah">
            <div class="carousel-caption">
                <h2>Selamat Datang di MAN 2 Kota Kediri</h2>
                <p>Mencetak generasi berakhlak mulia, berprestasi, dan berwawasan lingkungan</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://source.unsplash.com/1200x650/?student,competition" alt="Prestasi">
            <div class="carousel-caption">
                <h2>Prestasi Siswa</h2>
                <p>Berprestasi di tingkat lokal, nasional hingga internasional</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://source.unsplash.com/1200x650/?classroom,technology" alt="Fasilitas">
            <div class="carousel-caption">
                <h2>Fasilitas Modern</h2>
                <p>Ruang belajar, laboratorium, dan sarana prasarana yang mendukung</p>
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

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var myCarousel = document.getElementById('headerCarousel');
        new bootstrap.Carousel(myCarousel, {
            interval: 4000,
            pause: 'hover',
            wrap: true
        });
    });
</script>
@endpush
