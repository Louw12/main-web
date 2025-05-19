  @extends('layouts.main')

  @section('slider')

  <div class="slider">
            <div class="slide active">
                <img src="{{asset('images/BG.PNG')}}" alt="Slider Image 1">
                <div class="slide-content">
                    <h2>Welcome to Man 2 Kota Kediri</h2>
                    <p>Excellence in Education and Islamic Values</p>
                    <a href="#" class="btn-slider">Learn More</a>
                </div>
            </div>
            <div class="slide">
                <img src="{{asset('images/Fotogedung.PNG')}}" alt="Slider Image 2">
                <div class="slide-content">
                    <h2>Develop Your Potential</h2>
                    <p>Academic Excellence and Character Building</p>
                    <a href="#" class="btn-slider">Discover</a>
                </div>
            </div>
            <div class="slide">
                <img src="/api/placeholder/1400/500" alt="Slider Image 3">
                <div class="slide-content">
                    <h2>Join Our Community</h2>
                    <p>Creating Future Leaders</p>
                    <a href="#" class="btn-slider">Enroll Now</a>
                </div>
            </div>
            
            <button class="slider-btn prev-btn"><i class="fas fa-chevron-left"></i></button>
            <button class="slider-btn next-btn"><i class="fas fa-chevron-right"></i></button>
            
            <div class="slider-dots">
                <span class="dot active" data-slide="0"></span>
                <span class="dot" data-slide="1"></span>
                <span class="dot" data-slide="2"></span>
            </div>
        </div>
</div>
  @endsection