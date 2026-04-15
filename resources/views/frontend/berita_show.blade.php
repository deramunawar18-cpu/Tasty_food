@extends('layouts.frontend')

@section('extra_css')
<style>
    .page-header-berita {
        position: relative;
        background: url('{{ asset('images/monika-grabkowska-P1aohbiT-EY-unsplash.jpg') }}') center/cover no-repeat;
        height: 400px;
        display: flex;
        align-items: center;
        padding-top: 50px;
    }
    .page-header-berita .container { width: 100%; }
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
        text-align: left;
    }
    .navbar { background: transparent; color: var(--white); }
    .nav-brand, .nav-menu li a { color: var(--white); }

    .article-content {
        padding: 80px 0;
        background: #f8f9fa;
    }
    .article-header {
        text-align: center;
        margin-bottom: 40px;
    }
    .article-header h2 {
        font-size: 2.5rem;
        color: var(--primary-color);
        margin-bottom: 15px;
    }
    .article-meta {
        color: #777;
        font-size: 0.9rem;
    }
    .article-body {
        max-width: 800px;
        margin: 0 auto;
        background: #fff;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
    }
    .article-body img {
        width: 100%;
        border-radius: 10px;
        margin-bottom: 30px;
    }
    .article-body p {
        color: #444;
        line-height: 1.8;
        font-size: 1.05rem;
        margin-bottom: 20px;
    }
</style>
@endsection

@section('content')
<div class="page-header-berita">
    <div class="container">
        <h1>BERITA KAMI</h1>
    </div>
</div>

<section class="article-content">
    <div class="container">
        <div class="article-header">
            <h2>{{ $berita->title }}</h2>
            <div class="article-meta">Diterbitkan pada {{ $berita->created_at->format('d M Y') }} • Oleh Admin</div>
        </div>
        
        <div class="article-body">
            @if($berita->image)
                <img src="{{ asset($berita->image) }}" alt="Gambar Berita">
            @endif
            
            <div>
                {!! nl2br(e($berita->content)) !!}
            </div>

            <div style="margin-top: 40px;">
                <a href="{{ route('berita') }}" class="btn-dark px-6 py-2 bg-black text-white hover:bg-gray-800 rounded uppercase text-sm font-bold">Kembali ke Daftar Berita</a>
            </div>
        </div>
    </div>
</section>
@endsection
