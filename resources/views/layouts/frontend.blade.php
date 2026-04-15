<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasty Food</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    @yield('extra_css')
</head>
<body>

    <!-- Auth Slide-down Navbar -->
    <div class="auth-topbar-wrapper" id="authTopbar">
        <div class="auth-topbar-content">
            @auth
                <span class="welcome-text">Halo, {{ auth()->user()->name }}!</span>
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="auth-link">Dashboard Admin</a>
                @else
                    <a href="{{ route('dashboard') }}" class="auth-link">Dashboard</a>
                @endif
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="auth-link logout-btn">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="auth-link">Login User / Admin</a>
            @endauth
        </div>
        <div class="auth-topbar-toggle" id="authToggleBtn">
            <i class="fas fa-chevron-down" id="authToggleIcon"></i>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar">
        <div class="container">
            <a href="{{ route('home') }}" class="nav-brand">TASTY FOOD</a>
            <ul class="nav-menu">
                <li><a href="{{ route('home') }}">HOME</a></li>
                <li><a href="{{ route('tentang') }}">TENTANG</a></li>
                <li><a href="{{ route('berita') }}">BERITA</a></li>
                <li><a href="{{ route('galeri') }}">GALERI</a></li>
                <li><a href="{{ route('kontak') }}">KONTAK</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-grid">
                <div class="footer-widget">
                    <h3>Tasty Food</h3>
                    <p>Tasty Food adalah tempat di mana rasa dan kesehatan bertemu. Kami berkomitmen menyajikan hidangan lezat dengan bahan-bahan segar setiap hari, memberikan pengalaman kuliner yang tidak saja memuaskan lidah tetapi juga baik untuk tubuh Anda.</p>
                    <div class="social-icons">
                        <a href="#"><img src="{{ asset('images/001-facebook.png') }}" alt="Facebook"></a>
                        <a href="#"><img src="{{ asset('images/002-twitter.png') }}" alt="Twitter"></a>
                    </div>
                </div>
                <div class="footer-widget">
                    <h3>Menu Utama</h3>
                    <ul class="footer-links">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('tentang') }}">Tentang Kami</a></li>
                        <li><a href="{{ route('berita') }}">Berita</a></li>
                        <li><a href="{{ route('galeri') }}">Galeri Foto</a></li>
                    </ul>
                </div>
                <div class="footer-widget">
                    <h3>Informasi</h3>
                    <ul class="footer-links">
                        <li><a href="#">Kebijakan Privasi</a></li>
                        <li><a href="#">Syarat & Ketentuan</a></li>
                        <li><a href="{{ route('kontak') }}">Hubungi Kami</a></li>
                        <li><a href="#">Bantuan</a></li>
                    </ul>
                </div>
                <div class="footer-widget">
                    <h3>Contact Info</h3>
                    <ul class="footer-contact">
                        <li><i class="far fa-envelope"></i> tastyfood@gmail.com</li>
                        <li><i class="fas fa-phone-alt"></i> +62 812 3456 7890</li>
                        <li><i class="fas fa-map-marker-alt"></i> Kota Bandung, Jawa Barat</li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>Copyright ©2023 All rights reserved</p>
            </div>
        </div>
    </footer>

    @yield('extra_js')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const authTopbar = document.getElementById('authTopbar');
            const authToggleBtn = document.getElementById('authToggleBtn');
            const authToggleIcon = document.getElementById('authToggleIcon');

            authToggleBtn.addEventListener('click', function() {
                authTopbar.classList.toggle('open');
                if (authTopbar.classList.contains('open')) {
                    authToggleIcon.classList.remove('fa-chevron-down');
                    authToggleIcon.classList.add('fa-chevron-up');
                } else {
                    authToggleIcon.classList.remove('fa-chevron-up');
                    authToggleIcon.classList.add('fa-chevron-down');
                }
            });
        });
    </script>
</body>
</html>
