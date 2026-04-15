@extends('layouts.frontend')

@section('extra_css')
<style>
    /* Reuse page header */
    .page-header-galeri {
        position: relative;
        background: url('{{ asset('images/monika-grabkowska-P1aohbiT-EY-unsplash.jpg') }}') center/cover no-repeat;
        height: 400px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding-top: 50px;
    }

    .page-header-galeri .container{
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .page-header-galeri::before {
        content: '';
        position: absolute;
        top:0; left:0; right:0; bottom:0;
        background: rgba(0,0,0,0.6);
    }
    .page-header-galeri h1 {
        position: relative;
        color: var(--white);
        font-size: 3rem;
        text-transform: uppercase;
        font-weight: 700;
        z-index: 2;
        text-align: left;
    }
    
    .navbar {
        background: transparent;
        color: var(--white);
    }
    .nav-brand, .nav-menu li a { color: var(--white); }

    .galeri-page {
        padding: 50px 0 100px;
        background: #f8f9fa;
    }

    /* Carousel / Slider */
    .g-slider {
        position: relative;
        margin-bottom: 50px;
        border-radius: 15px;
        overflow: hidden;
    }
    .g-slider img {
        width: 100%;
        height: 500px;
        object-fit: cover;
        display: block;
    }
    .g-slider-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: var(--white);
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        z-index: 10;
        transition: 0.3s;
    }
    .g-slider-nav:hover { background: #eee; }
    .g-prev { left: 20px; }
    .g-next { right: 20px; }

    /* Galeri Grid */
    .g-page-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
    }
    .g-page-grid img {
        width: 100%;
        aspect-ratio: 1;
        object-fit: cover;
        border-radius: 15px;
        transition: transform 0.3s;
    }
    .g-page-grid img:hover {
        transform: scale(1.02);
    }

    @media (max-width: 992px) {
        .g-page-grid { grid-template-columns: repeat(3, 1fr); }
    }
    @media (max-width: 768px) {
        .g-slider img { height: 300px; }
        .g-page-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 480px) {
        .g-page-grid { grid-template-columns: 1fr; }
    }
</style>
@endsection

@section('content')
<div class="page-header-galeri">
    <div class="container">
        <h1>GALERI KAMI</h1>
    </div>
</div>

<section class="galeri-page">
    <div class="container">
        <!-- Main Slider -->
        <div class="g-slider">
            <div class="g-slider-nav g-prev"><i class="fas fa-chevron-left"></i></div>
            <img id="mainSliderImage" src="{{ asset('images/ella-olsson-mmnKI8kMxpc-unsplash.jpg') }}" alt="Galeri Slide">
            <div class="g-slider-nav g-next"><i class="fas fa-chevron-right"></i></div>
        </div>

        <!-- Grid Images -->
        <div class="g-page-grid">
            @forelse($galeris as $img)
                <img src="{{ asset($img->image) }}" alt="Galeri Item">
            @empty
                <div class="col-span-4 text-center py-8 text-gray-500 w-full">Belum ada foto galeri.</div>
            @endforelse
        </div>
    </div>
</section>
@endsection

@section('extra_js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sliderImg = document.getElementById('mainSliderImage');
        const prevBtn = document.querySelector('.g-prev');
        const nextBtn = document.querySelector('.g-next');

        @if($galeris->isNotEmpty())
            // Combined from database
            const images = [
                @foreach($galeris as $galeri)
                    "{{ asset($galeri->image) }}",
                @endforeach
            ];
            
            // Set initial image
            sliderImg.src = images[0];
            
            let currentIndex = 0;
            
            function updateSlider() {
                sliderImg.style.opacity = 0;
                setTimeout(() => {
                    sliderImg.src = images[currentIndex];
                    sliderImg.style.opacity = 1;
                }, 200);
            }
        @else
            // Fallback JS if empty
            const images = [
                "{{ asset('images/ella-olsson-mmnKI8kMxpc-unsplash.jpg') }}"
            ];
            let currentIndex = 0;
            function updateSlider() {}
        @endif

        // Add transition style via JS
        sliderImg.style.transition = 'opacity 0.3s ease-in-out';

        nextBtn.addEventListener('click', function() {
            if(images.length <= 1) return;
            currentIndex = (currentIndex + 1) % images.length;
            updateSlider();
        });

        prevBtn.addEventListener('click', function() {
            if(images.length <= 1) return;
            currentIndex = (currentIndex - 1 + images.length) % images.length;
            updateSlider();
        });
    });
</script>
@endsection
