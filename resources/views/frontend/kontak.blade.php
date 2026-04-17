@extends('layouts.frontend')

@section('extra_css')
<style>
    /* Reuse page header */
    .page-header-kontak {
        position: relative;
        background: url('{{ asset('images/monika-grabkowska-P1aohbiT-EY-unsplash.jpg') }}') center/cover no-repeat;
        height: 400px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding-top: 50px;
    }

    .page-header-kontak .container {
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .page-header-kontak::before {
        content: '';
        position: absolute;
        top:0; left:0; right:0; bottom:0;
        background: rgba(0,0,0,0.6);
    }
    .page-header-kontak h1 {
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

    .kontak-page {
        padding: 80px 0;
        background: var(--white);
    }
    
    .kontak-title {
        font-size: 2rem;
        text-transform: uppercase;
        margin-bottom: 40px;
        font-weight: 700;
    }

    .k-form-box {
        margin-bottom: 60px;
    }
    .k-form {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }
    .k-form-left {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }
    .k-input {
        width: 100%;
        padding: 15px 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-family: inherit;
        font-size: 0.95rem;
    }
    .k-textarea {
        width: 100%;
        padding: 15px 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-family: inherit;
        font-size: 0.95rem;
        height: 100%;
        resize: none;
    }
    .k-btn-block {
        grid-column: 1 / -1;
        background: #111;
        color: var(--white);
        border: none;
        padding: 15px;
        font-size: 1rem;
        font-weight: 600;
        text-transform: uppercase;
        border-radius: 8px;
        cursor: pointer;
        transition: 0.3s;
    }
    .k-btn-block:hover { background: #333; }

    /* Kontak Info Icons */
    .k-info-items {
        display: flex;
        justify-content: space-around;
        text-align: center;
        margin-bottom: 80px;
    }
    .k-item {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .k-icon {
        width: 70px;
        height: 70px;
        background: #111;
        color: var(--white);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        margin-bottom: 15px;
    }
    .k-item h4 {
        font-size: 1.1rem;
        text-transform: uppercase;
        margin-bottom: 5px;
    }
    .k-item p {
        color: #666;
        font-size: 0.95rem;
    }

    /* Map Section */
    .k-map {
        width: 100%;
        height: 450px;
        border-radius: 15px;
        background: #e9ecef;
        overflow: hidden;
    }

    @media (max-width: 768px) {
        .k-form { grid-template-columns: 1fr; }
        .k-textarea { height: 150px; }
        .k-info-items { flex-direction: column; gap: 40px; }
    }
</style>
@endsection

@section('content')
<div class="page-header-kontak">
    <div class="container">
        <h1>KONTAK KAMI</h1>
    </div>
</div>

<section class="kontak-page">
    <div class="container">
        <h2 class="kontak-title">KONTAK KAMI</h2>
        
        <!-- Form Kontak -->
        <div class="k-form-box">
            <form class="k-form" action="#" method="POST">
                @csrf
                <div class="k-form-left">
                    <input type="text" placeholder="Subject" class="k-input">
                    <input type="text" placeholder="Name" class="k-input">
                    <input type="email" placeholder="Email" class="k-input">
                </div>
                <div class="k-form-right">
                    <textarea placeholder="Message" class="k-textarea"></textarea>
                </div>
                <button type="button" class="k-btn-block">KIRIM</button>
            </form>
        </div>

        <!-- Info Kontak -->
        <div class="k-info-items">
            <div class="k-item">
                <div class="k-icon"><i class="far fa-envelope"></i></div>
                <h4>EMAIL</h4>
                <p>tastyfood@gmail.com</p>
            </div>
            <div class="k-item">
                <div class="k-icon"><i class="fas fa-phone-alt"></i></div>
                <h4>PHONE</h4>
                <p>+62 812 3456 7890</p>
            </div>
            <div id="location-trigger" class="k-item" style="cursor: pointer;">
                <div class="k-icon"><i class="fas fa-map-marker-alt"></i></div>
                <h4>LOCATION</h4>
                <p>Jl. Terusan Mars Utara III No.8D, Manjahlega, Bandung</p>
            </div>
        </div>
    </div>
    
    <!-- Bagian Peta (Full Width background light) -->
    <div style="background: #f8f9fa; padding: 40px 0;">
        <div class="container">
            <div class="k-map">
                <!-- Google Maps (Dinamis via JS) -->
                <iframe id="main-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126748.56347862248!2d107.57311709235512!3d-6.903444341687889!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6398252477f%3A0x146a1f93d3e815b2!2sBandung%2C%20Bandung%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1714207851234!5m2!1sid!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const trigger = document.getElementById('location-trigger');
        const map = document.getElementById('main-map');
        
        const urls = {
            bandung: "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126748.56347862248!2d107.57311709235512!3d-6.903444341687889!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6398252477f%3A0x146a1f93d3e815b2!2sBandung%2C%20Bandung%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1714207851234!5m2!1sid!2sid",
            cyberlabs: "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3016.8319377929747!2d107.66141237356577!3d-6.943206067967048!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e7c381e3c323%3A0x5f5160f6c9796e4b!2sCyberLabs!5e1!3m2!1sen!2sid!4v1776343763337!5m2!1sen!2sid"
        };

        let currentMode = 'bandung';

        trigger.addEventListener('click', function() {
            if (currentMode === 'bandung') {
                map.src = urls.cyberlabs;
                currentMode = 'cyberlabs';
                trigger.querySelector('.k-icon').style.background = '#e6b325'; // Visual feedback
            } else {
                map.src = urls.bandung;
                currentMode = 'bandung';
                trigger.querySelector('.k-icon').style.background = '#111'; // Reset visual
            }
        });
    });
</script>
@endsection
