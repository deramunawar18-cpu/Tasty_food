@extends('layouts.frontend')

@section('extra_css')
<style>
    /* Reuse .page-header from tentang page by adding it to style.css or here */
    .page-header-berita {
        position: relative;
        background: url('{{ asset('images/monika-grabkowska-P1aohbiT-EY-unsplash.jpg') }}') center/cover no-repeat;
        height: 400px;
        display: flex;
        align-items: center;
        /* justify-content: center; <-- Dihapus agar container bisa ditarik ke kiri */
        padding-top: 50px;
    }
    
    /* Tambahan agar container mengambil lebar penuh dan teks bisa rata kiri */
    .page-header-berita .container {
        width: 100%;
    }

    .page-header-berita::before {
        content: '';
        position: absolute;
        top:0; left:0; right:0; bottom:0;
        background: rgba(0,0,0,0.6);
    }
    .page-header-berita h1 {
        position: relative;
        color: var(--white);
        font-size: 3rem;
        text-transform: uppercase;
        font-weight: 700;
        z-index: 2;
        text-align: left; /* Teks dipastikan rata kiri */
    }

    .navbar {
        background: transparent;
        color: var(--white);
    }
    .nav-brand, .nav-menu li a { color: var(--white); }

    /* Berita Content */
    .berita-page {
        padding: 80px 0;
        background: #f8f9fa;
    }

    .featured-news {
        display: flex;
        gap: 40px;
        align-items: center;
        margin-bottom: 80px;
    }
    .featured-news img {
        flex: 1;
        width: 100%;
        max-width: 450px;
        height: 497px;
        border-radius: 15px;
        object-fit: cover;
        object-position: center 20%;
    }
    .featured-text {
        flex: 1;
    }
    .featured-text h2 {
        font-size: 2rem;
        text-transform: uppercase;
        margin-bottom: 20px;
    }
    .featured-text p {
        color: #555;
        margin-bottom: 20px;
    }
    .btn-dark {
        background-color: var(--primary-color);
        color: var(--white);
        padding: 12px 30px;
        border: none;
        text-transform: uppercase;
        font-weight: 600;
        cursor: pointer;
    }

    .berita-lainnya h3 {
        font-size: 1.5rem;
        text-transform: uppercase;
        margin-bottom: 30px;
    }
    .bl-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
    }
    
    /* Reuse small card style from home */
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
        height: 180px;
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

    @media (max-width: 992px) {
        .featured-news { flex-direction: column; }
        .bl-grid { grid-template-columns: repeat(2, 1fr); }
    }
    @media (max-width: 576px) {
        .bl-grid { grid-template-columns: 1fr; }
    }
</style>
@endsection

@section('content')
<div class="page-header-berita">
    <div class="container">
        <h1>BERITA KAMI</h1>
    </div>
</div>

<section class="berita-page">
    <div class="container">
        @if($beritas->isNotEmpty())
            <!-- Dynamic Featured News = First Item -->
            @php $featured = $beritas->first(); @endphp
            <div class="featured-news">
                <img src="{{ $featured->image ? asset($featured->image) : asset('images/eiliv-aceron-ZuIDLSz3XLg-unsplash.jpg') }}" alt="Featured News">
                <div class="featured-text">
                    <h2>{{ $featured->title }}</h2>
                    <p>{{ Str::limit(strip_tags($featured->content), 250) }}</p>
                    <a href="{{ route('berita.show', $featured->slug) }}" class="btn-dark inline-block mt-4">BACA SELENGKAPNYA</a>
                </div>
            </div>

            <div class="berita-lainnya">
                <h3>BERITA LAINNYA</h3>
                <div class="bl-grid">
                    @foreach($beritas->skip(1) as $berita)
                    <div class="b-card-small">
                        <img src="{{ $berita->image ? asset($berita->image) : asset('images/sanket-shah-SVA7TyHxojY-unsplash.jpg') }}" alt="News Image">
                        <div class="b-card-content">
                            <h5>{{ $berita->title }}</h5>
                            <p>{{ Str::limit(strip_tags($berita->content), 100) }}</p>
                            <div class="read-more">
                                <a href="{{ route('berita.show', $berita->slug) }}">Baca selengkapnya</a>
                                <i class="fas fa-ellipsis-h"></i>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        @else
            <!-- Peringatan Kosong Jika Tidak Ada Data -->
            <div class="text-center text-gray-500 py-16">
                <h2>Ooopps! Belum Ada Berita.</h2>
                <p>Saat ini belum ada rilisan berita terbaru dari admin. Segera cek kembali nanti ya!</p>
            </div>
        @endif
    </div>
</section>
@endsection