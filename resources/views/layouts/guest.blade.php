<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <!-- Icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body { font-family: 'Poppins', sans-serif; margin: 0; padding: 0; }
            
            .split-container {
                display: flex;
                flex-direction: column;
                min-height: 100vh;
                background-color: #fcfcfc;
            }

            @media (min-width: 1024px) {
                .split-container { flex-direction: row; height: 100vh; overflow: hidden; }
            }

            /* Video Section (Left) */
            .video-section {
                flex: 1;
                position: relative;
                overflow: hidden;
                display: none; /* Hide on mobile by default */
            }

            @media (min-width: 1024px) {
                .video-section { display: block; flex: 1.1; height: 100%; }
                .form-section { flex: 0.9; height: 100%; overflow-y: auto; }
            }

            .video-section video {
                width: 100%;
                height: 100%;
                object-fit: cover;
                position: absolute;
                top: 0;
                left: 0;
            }

            .video-overlay {
                position: absolute;
                top: 0; left: 0; right: 0; bottom: 0;
                background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.2));
                display: flex;
                flex-direction: column;
                justify-content: center;
                padding: 60px;
                color: white;
            }

            /* Form Section (Right) */
            .form-section {
                flex: 1;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                position: relative;
                z-index: 10;
                padding: 40px;
                background: #ffffff;
            }

            .form-container {
                width: 100%;
                max-width: 420px;
            }

            input:focus {
                border-color: #111111 !important;
                box-shadow: 0 0 0 1px #111111 !important;
            }

            /* Tasty Food Floating Logo Style on mobile */
            @media (max-width: 1024px) {
                .form-section {
                    background: url('https://images.unsplash.com/photo-1543353071-873f17a7a088?auto=format&fit=crop&w=1920&q=80') center/cover;
                    position: relative;
                }
                .form-section::before {
                    content: '';
                    position: absolute;
                    top:0; left:0; right:0; bottom:0;
                    background: rgba(255,255,255,0.95);
                    z-index: 1;
                }
                .form-container { position: relative; z-index: 2; }
                .mobile-logo { display: block !important; position: relative; z-index: 2; }
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="split-container">
            <!-- Sisi Kiri: Video Sinematik -->
            <div class="video-section">
                <video autoplay muted loop playsinline poster="https://i.imgur.com/cq73Cbp.png">
                    <source src="{{ asset('images/6a3bec6dd7b2e485741758e30d1de35a_720w.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <div class="video-overlay">
                    <h2 class="text-5xl font-black tracking-tighter uppercase mb-4">Tasty Food <br>Perfection</h2>
                    <p class="text-white/80 max-w-md font-light text-lg tracking-wide uppercase">Dibuat dengan bahan segar pilihan untuk pengalaman kuliner yang tidak terlupakan setiap hari.</p>
                </div>
            </div>

            <!-- Sisi Kanan: Formulir Autentikasi -->
            <div class="form-section">
                <!-- Logo Tasty Food -->
                <div class="mb-12 text-center mobile-logo">
                    <a href="/" class="inline-block transform transition hover:scale-105 duration-300">
                        <h1 class="text-4xl font-extrabold text-[#111] tracking-[0.3em] uppercase mb-1">TASTY <span class="font-light">FOOD</span></h1>
                        <div class="h-0.5 w-full bg-[#111] opacity-20"></div>
                    </a>
                </div>

                <div class="form-container">
                    {{ $slot }}
                </div>

                <div class="mt-12 text-gray-300 text-[10px] tracking-widest uppercase font-bold text-center">
                    © {{ date('Y') }} Tasty Food Dashboard &bull; Premium Culinary Experience
                </div>
            </div>
        </div>
    </body>
</html>
