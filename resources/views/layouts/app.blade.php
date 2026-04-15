<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Admin - Tasty Food</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            body { font-family: 'Poppins', sans-serif; }
            .sidebar-bg { background-color: #111111; }
        </style>
    </head>
    <body class="font-sans antialiased bg-gray-50 text-gray-800">
        <div class="flex h-screen overflow-hidden">
            
            <!-- Sidebar Navigation -->
            @include('layouts.navigation')

            <!-- Main Content Area -->
            <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden">
                
                <!-- Top Header Bar -->
                <header class="bg-white shadow-sm sticky top-0 z-30">
                    <div class="flex items-center justify-between px-6 py-4">
                        <div class="flex-1">
                            <!-- Page Heading -->
                            @isset($header)
                                {{ $header }}
                            @endisset
                        </div>
                        <div class="flex items-center space-x-4">
                            <!-- User Profile Dropdown -->
                            <span class="text-sm font-medium text-gray-700">Halo, {{ Auth::user()->name }}</span>
                        </div>
                    </div>
                </header>

                <!-- Page Content -->
                <main class="w-full grow p-6">
                    {{ $slot }}
                </main>
                
            </div>
        </div>
    </body>
</html>
