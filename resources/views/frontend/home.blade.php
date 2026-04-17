@extends('layouts.frontend')

@section('extra_css')
<style>
    /* Home Specific Styles */
    .navbar {
        background-color: transparent;
        color: var(--primary-color);
    }
    .navbar .container {
        justify-content: flex-start;
        gap: 40px;
    }
    .hero-home {
        display: flex;
        align-items: center;
        min-height: 100vh;
        background-color: #f4f4f4;
        position: relative;
        overflow: hidden;
    }
    .hero-text-box {
        flex: 1;
        padding-left: 10%;
        padding-right: 5%;
        position: relative;
        z-index: 10;
    }
    .hero-text-box h2 {
        font-weight: 300;
        font-size: 3rem;
        color: #111;
        line-height: 1.1;
    }
    .hero-text-box h1 {
        font-weight: 800;
        font-size: 3.5rem;
        color: #111;
        margin-bottom: 20px;
        text-transform: uppercase;
    }
    .hero-text-box p {
        color: #555;
        font-size: 0.9rem;
        margin-bottom: 30px;
        max-width: 500px;
    }
    .linha-reta {
        width: 80px;
        height: 3px;
        background-color: #111;
        margin-bottom: 20px;
    }
    .hero-image-box {
        flex: 1;
        height: 100vh;
        position: relative;
    }
    .hero-image-box img {
        position: absolute;
        right: -10%;
        top: 50%;
        transform: translateY(-50%);
        width: 120%;
        max-width: 800px;
        border-radius: 50%;
    }

    /* Tentang Kami Section */
    .tentang-home {
        text-align: center;
        padding: 80px 0;
        background-color: var(--white);
    }
    .tentang-home p {
        max-width: 600px;
        margin: 0 auto 50px;
        color: #666;
        font-size: 0.9rem;
    }
    .tentang-bg {
        background: url('{{ asset('images/monika-grabkowska-P1aohbiT-EY-unsplash.jpg') }}') center/cover no-repeat;
        min-height: 500px;
        position: relative;
        padding: 100px 0;
    }
    .carousel-wrapper {
        overflow: hidden;
        width: 100%;
        position: relative;
        top: 50px;
        padding: 60px 0 20px;
    }
    .tentang-cards {
        display: flex;
        gap: 30px;
        width: max-content;
        animation: infinite-scroll 13s linear infinite;
    }
    .carousel-wrapper:hover .tentang-cards {
        animation-play-state: paused;
    }
    .t-card {
        background: var(--white);
        border-radius: 10px;
        padding: 60px 20px 30px;
        text-align: center;
        position: relative;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        width: 300px; /* Fixed width for carousel consistency */
    }
    .t-card-img {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        position: absolute;
        top: -60px;
        left: 50%;
        transform: translateX(-50%);
        border: 5px solid var(--white);
        object-fit: cover;
    }
    .t-card h4 {
        margin-bottom: 10px;
        font-weight: 700;
        text-transform: uppercase;
        font-size: 1.1rem;
    }
    .t-card p {
        font-size: 0.8rem;
        color: #777;
    }

    @keyframes infinite-scroll {
        0% { transform: translateX(0); }
        100% { transform: translateX(calc(-330px * 4)); } /* (Width 300 + Gap 30) * 4 Original Cards */
    }

    /* Responsive adjustments for carousel */
    @media (max-width: 992px) {
        .carousel-wrapper { top: 0; margin-top: 80px; }
    }

    /* Berita Section */
    .berita-home {
        background-color: #f9f9f9;
        padding: 150px 0 80px; /* space for overlapping cards */
    }
    .berita-grid-home {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 30px;
    }
    .b-card-main img {
        width: 100%;
        border-radius: 10px;
        margin-bottom: 20px;
    }
    .b-card-main h3 {
        font-size: 1.5rem;
        margin-bottom: 15px;
        text-transform: uppercase;
    }
    .b-card-main p {
        color: #666;
        font-size: 0.9rem;
        margin-bottom: 15px;
    }
    .b-grid-right {
        display: grid;
        grid-template-columns: 1fr 1fr;
        grid-template-rows: 1fr 1fr;
        gap: 20px;
    }
    .b-card-small {
        background: var(--white);
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        display: flex;
        flex-direction: column;
    }
    .b-card-small img {
        width: 100%;
        height: 150px;
        object-fit: cover;
    }
    .b-card-content {
        padding: 15px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    .b-card-content h5 {
        font-size: 1rem;
        margin-bottom: 10px;
        text-transform: uppercase;
    }
    .b-card-content p {
        font-size: 0.75rem;
        color: #777;
        margin-bottom: 15px;
        flex: 1;
    }
    .read-more {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 0.8rem;
        font-weight: 600;
        color: #e6b325;
        text-transform: uppercase;
    }
    .read-more i { color: #ccc; }

    /* Galeri Home */
    .galeri-home {
        padding: 80px 0;
        text-align: center;
        background-color: var(--white);
    }
    .g-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 15px;
        margin-bottom: 40px;
    }
    .g-grid img {
        width: 100%;
        aspect-ratio: 1;
        object-fit: cover;
        border-radius: 10px;
    }

    @media (max-width: 992px) {
        .hero-home { flex-direction: column; text-align: center; justify-content: center; background: none; }
        .hero-text-box { padding: 100px 20px 50px; }
        .hero-image-box img { position: relative; right: 0; width: 80%; transform: none; top: 0; }
        .linha-reta { margin: 0 auto 20px; }
        .tentang-cards { grid-template-columns: 1fr 1fr; gap: 80px 20px; top: 0; margin-top: 80px; }
        .berita-grid-home { grid-template-columns: 1fr; }
        .berita-home { padding-top: 80px; }
    }
    @media (max-width: 768px) {
        .tentang-cards { grid-template-columns: 1fr; }
        .b-grid-right { grid-template-columns: 1fr; }
        .g-grid { grid-template-columns: 1fr 1fr; }
    }
</style>
@endsection

@section('content')
<!-- Hero Section -->
<section class="hero-home">
    <div class="hero-text-box">
        <div class="linha-reta"></div>
        <h2>HEALTHY</h2>
        <h1>TASTY FOOD</h1>
        <p>Nikmati kelezatan masakan sehat yang dibuat dengan cinta dan bahan-bahan segar pilihan langsung dari alam untuk kesehatan Anda dan keluarga.</p>
        <a href="{{ route('tentang') }}" class="btn">TENTANG KAMI</a>
    </div>
    <div class="hero-image-box">
        <img src="{{ asset('images/hero-plate.png') }}" alt="Tasty Food Plate" onerror="this.src='https://i.imgur.com/cq73Cbp.png';">
    </div>
</section>

<!-- Tentang Kami -->
<section class="tentang-home">
    <div class="container">
        <h2 class="section-title">TENTANG KAMI</h2>
        <p>Kami percaya bahwa makanan enak tidak harus membosankan. Di Tasty Food, kami meramu resep tradisional dengan sentuhan modern untuk memberikan pengalaman kuliner yang istimewa.</p>
    </div>
    
    <div class="tentang-bg">
        <div class="container">
            <div class="hero-overlay"></div>
            <div class="carousel-wrapper">
                <div class="tentang-cards">
                    <!-- Set 1 -->
                    <div class="t-card">
                        <img src="{{ asset('images/img-1.png') }}" alt="Food 1" class="t-card-img">
                        <h4>BAHAN SEGAR</h4>
                        <p>Kami selalu menggunakan bahan baku terbaik dan segar setiap hari untuk menjamin kualitas rasa.</p>
                    </div>
                    <div class="t-card">
                        <img src="{{ asset('images/img-2.png') }}" alt="Food 2" class="t-card-img">
                        <h4>RESEP AUTENTIK</h4>
                        <p>Setiap hidangan diramu dengan bumbu rahasia yang autentik, memberikan cita rasa yang sulit dilupakan.</p>
                    </div>
                    <div class="t-card">
                        <img src="{{ asset('images/img-3.png') }}" alt="Food 3" class="t-card-img">
                        <h4>KOKI AHLI</h4>
                        <p>Dapur kami dipimpin oleh koki profesional yang berdedikasi tinggi untuk menyajikan mahakarya kuliner.</p>
                    </div>
                    <div class="t-card">
                        <img src="{{ asset('images/img-4.png') }}" alt="Food 4" class="t-card-img">
                        <h4>MENU BERAGAM</h4>
                        <p>Nikmati berbagai pilihan menu dari tradisional hingga modern yang disesuaikan dengan selera lidah Anda.</p>
                    </div>
                    <!-- Duplicate Set for Seamless Loop -->
                    <div class="t-card">
                        <img src="{{ asset('images/img-1.png') }}" alt="Food 1" class="t-card-img">
                        <h4>BAHAN SEGAR</h4>
                        <p>Kami selalu menggunakan bahan baku terbaik dan segar setiap hari untuk menjamin kualitas rasa.</p>
                    </div>
                    <div class="t-card">
                        <img src="{{ asset('images/img-2.png') }}" alt="Food 2" class="t-card-img">
                        <h4>RESEP AUTENTIK</h4>
                        <p>Setiap hidangan diramu dengan bumbu rahasia yang autentik, memberikan cita rasa yang sulit dilupakan.</p>
                    </div>
                    <div class="t-card">
                        <img src="{{ asset('images/img-3.png') }}" alt="Food 3" class="t-card-img">
                        <h4>KOKI AHLI</h4>
                        <p>Dapur kami dipimpin oleh koki profesional yang berdedikasi tinggi untuk menyajikan mahakarya kuliner.</p>
                    </div>
                    <div class="t-card">
                        <img src="{{ asset('images/img-4.png') }}" alt="Food 4" class="t-card-img">
                        <h4>MENU BERAGAM</h4>
                        <p>Nikmati berbagai pilihan menu dari tradisional hingga modern yang disesuaikan dengan selera lidah Anda.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Berita Kami -->
<section class="berita-home">
    <div class="container">
        <h2 class="section-title">BERITA KAMI</h2>
        
        <div class="berita-grid-home">
            @if($beritas->isNotEmpty())
                <!-- Main News Card -->
                @php $featured = $beritas->first(); @endphp
                <div class="b-card-main b-card-small" style="padding: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); background: #fff;">
                    <img src="{{ $featured->image ? asset($featured->image) : asset('images/fathul-abrar-T-qI_MI2EMA-unsplash.jpg') }}" alt="Main News" style="height: auto; aspect-ratio: 16/9; object-fit:cover;">
                    <h3>{{ $featured->title }}</h3>
                    <p>{{ Str::limit(strip_tags($featured->content), 200) }}</p>
                    <div class="read-more">
                        <a href="{{ route('berita.show', $featured->slug) }}">Baca selengkapnya</a>
                        <i class="fas fa-ellipsis-h"></i>
                    </div>
                </div>
                
                <!-- Side News Grid -->
                <div class="b-grid-right">
                    @foreach($beritas->skip(1) as $berita)
                    <div class="b-card-small">
                        <img src="{{ $berita->image ? asset($berita->image) : asset('images/sanket-shah-SVA7TyHxojY-unsplash.jpg') }}" alt="News">
                        <div class="b-card-content">
                            <h5>{{ $berita->title }}</h5>
                            <p>{{ Str::limit(strip_tags($berita->content), 50) }}</p>
                            <div class="read-more">
                                <a href="{{ route('berita.show', $berita->slug) }}">Baca selengkapnya</a>
                                <i class="fas fa-ellipsis-h"></i>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <!-- Peringatan Kosong -->
                <div class="col-span-1 md:col-span-3 text-center text-gray-500 py-16" style="grid-column: 1 / -1;">
                    <h3>Belum Ada Berita</h3>
                    <p>Berita terbaru belum tersedia, silakan cek kembali nanti.</p>
                </div>
            @endif
        </div>
    </div>
</section>

<!-- Galeri Kami -->
<section class="galeri-home">
    <div class="container">
        <h2 class="section-title">GALERI KAMI</h2>
        <div class="g-grid">
            <img src="{{ asset('images/brooke-lark-oaz0raysASk-unsplash.jpg') }}" alt="Galeri 1">
            <img src="{{ asset('images/ella-olsson-mmnKI8kMxpc-unsplash.jpg') }}" alt="Galeri 2">
            <img src="{{ asset('images/eiliv-aceron-ZuIDLSz3XLg-unsplash.jpg') }}" alt="Galeri 3">
            <img src="{{ asset('images/jonathan-borba-Gkc_xM3VY34-unsplash.jpg') }}" alt="Galeri 4">
            <img src="{{ asset('images/mariana-medvedeva-iNwCO9ycBlc-unsplash.jpg') }}" alt="Galeri 5">
            <img src="{{ asset('images/monika-grabkowska-P1aohbiT-EY-unsplash.jpg') }}" alt="Galeri 6">
        </div>
        <a href="{{ route('galeri') }}" class="btn">LIHAT LEBIH BANYAK</a>
    </div>
</section>
@endsection
