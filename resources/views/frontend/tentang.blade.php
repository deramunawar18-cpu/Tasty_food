@extends('layouts.frontend')

@section('extra_css')
<style>
    /* Global Page Header (Reusable for other pages too) */
    .page-header {
        position: relative;
        background: url('{{ asset('images/monika-grabkowska-P1aohbiT-EY-unsplash.jpg') }}') center/cover no-repeat;
        height: 400px;
        display: flex;
        align-items: center;
        /* justify-content: center; */
        padding-top: 50px;
    }
    .page-header .container {
        width: 100%;
    }
    .page-header::before {
        content: '';
        position: absolute;
        top:0; left:0; right:0; bottom:0;
        background: rgba(0,0,0,0.6);
    }
    .page-header h1 {
        position: relative;
        color: var(--white);
        font-size: 3rem;
        text-transform: uppercase;
        font-weight: 700;
        z-index: 2;
        text-align: left;
    }
    
    /* Modify navbar for inner pages to always be transparent with white text over dark image */
    .navbar {
        background: transparent;
        color: var(--white);
    }
    .nav-brand, .nav-menu li a {
        color: var(--white);
    }

    /* Tentang Content */
    .tentang-content {
        padding: 80px 0;
        background: var(--white);
    }
    
    .t-section {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 50px;
        margin-bottom: 80px;
    }
    .t-text {
        flex: 1;
        min-width: 0; /* Mencegah teks overlap */
    }
    .t-text h3 {
        font-size: 1.8rem;
        margin-bottom: 20px;
        text-transform: uppercase;
        color: var(--primary-color);
    }
    .t-text p {
        color: #555;
        margin-bottom: 15px;
        font-size: 0.95rem;
    }
    
    .t-images-2 {
        flex: 1;
        min-width: 0; /* Mencegah gambar overflow */
        display: flex;
        gap: 20px;
    }
    .t-images-2 img {
        flex: 1;
        min-width: 0;
        width: 100%;
        max-width: 100%;
        height: 350px;
        border-radius: 10px;
        object-fit: cover;
    }
    
    .t-image-1 {
        flex: 1;
        min-width: 0;
    }
    .t-image-1 img {
        width: 100%;
        max-width: 100%;
        border-radius: 10px;
        object-fit: cover;
        height: 350px;
    }
    
    @media (max-width: 768px) {
        .t-section { flex-direction: column; }
        .t-section.reverse { flex-direction: column-reverse; }
    }
</style>
@endsection

@section('content')
<!-- Page Header -->
<div class="page-header">
    <div class="container">
        <h1>TENTANG KAMI</h1>
    </div>
</div>

<!-- Main Content -->
<section class="tentang-content">
    <div class="container">
        <!-- TASTY FOOD Section -->
        <div class="t-section">
            <div class="t-text">
                <h3>TASTY FOOD</h3>
                <p><strong>Berawal dari kegemaran mengolah bahan makanan lokal menjadi sajian istimewa, Tasty Food hadir sebagai jawaban bagi Anda yang mencari keseimbangan antara rasa dan kesehatan. Kami percaya bahwa setiap suapan harus memberikan kebahagiaan sekaligus nutrisi terbaik bagi tubuh.</strong></p>
                <p>Sejak berdiri, komitmen kami tidak pernah berubah: menyajikan hidangan berkualitas tinggi dengan standar kebersihan yang ketat. Kami bekerja sama dengan petani lokal untuk memastikan setiap sayuran dan daging yang masuk ke dapur kami adalah yang terbaik dari alam.</p>
            </div>
            <div class="t-images-2">
                <img src="{{ asset('images/brooke-lark-oaz0raysASk-unsplash.jpg') }}" alt="Tentang 1">
                <img src="{{ asset('images/sebastian-coman-photography-eBmyH7oO5wY-unsplash.jpg') }}" alt="Tentang 2">
            </div>
        </div>
        
        <!-- VISI Section -->
        <div class="t-section reverse">
            <div class="t-images-2">
                <img src="{{ asset('images/fathul-abrar-T-qI_MI2EMA-unsplash.jpg') }}" alt="Visi 1" style="border-radius: 20px;">
                <img src="{{ asset('images/michele-blackwell-rAyCBQTH7ws-unsplash.jpg') }}" alt="Visi 2" style="border-radius: 20px;">
            </div>
            <div class="t-text">
                <h3>VISI</h3>
                <p>Menjadi pelopor gaya hidup sehat melalui hidangan lezat yang bisa dinikmati oleh semua kalangan di seluruh penjuru negeri. Kami bercita-cita untuk menginspirasi masyarakat agar lebih peduli terhadap apa yang mereka konsumsi tanpa harus mengorbankan kenikmatan rasa.</p>
            </div>
        </div>
        
        <!-- MISI Section -->
        <div class="t-section">
            <div class="t-text">
                <h3>MISI</h3>
                <p>Menghadirkan inovasi menu yang bergizi setiap bulan, menjaga standar kualitas rasa secara konsisten di setiap cabang, dan memberdayakan bahan baku lokal guna mendukung ekonomi petani Indonesia sekaligus menjamin kesegaran bahan masakan kami.</p>
            </div>
            <div class="t-image-1">
                <img src="{{ asset('images/sanket-shah-SVA7TyHxojY-unsplash.jpg') }}" alt="Misi">
            </div>
        </div>
    </div>
</section>
@endsection
