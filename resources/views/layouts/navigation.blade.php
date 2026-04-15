<nav x-data="{ open: false }" class="sidebar-bg text-white w-64 flex-shrink-0 hidden md:flex md:flex-col items-center py-8">
    <!-- Logo -->
    <div class="mb-10 w-full px-6 flex justify-center">
        <a href="{{ route('dashboard') }}" class="text-2xl font-bold tracking-widest uppercase">
            TASTY FOOD
        </a>
    </div>

    <!-- Navigation Links -->
    <div class="w-full flex-1 flex flex-col space-y-2 px-4">
        <div class="text-xs uppercase text-gray-500 font-semibold mb-2 px-4">Menu Utama</div>

        @if(auth()->user()->role === 'admin')
            <a href="{{ route('admin.dashboard') }}" class="flex items-center w-full px-4 py-3 rounded-lg transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-white text-black font-semibold' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                <i class="fas fa-chart-pie w-6"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('admin.berita.index') }}" class="flex items-center w-full px-4 py-3 rounded-lg transition-colors {{ request()->routeIs('admin.berita.*') ? 'bg-white text-black font-semibold' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                <i class="far fa-newspaper w-6"></i>
                <span>Kelola Berita</span>
            </a>
            <a href="{{ route('admin.galeri.index') }}" class="flex items-center w-full px-4 py-3 rounded-lg transition-colors {{ request()->routeIs('admin.galeri.*') ? 'bg-white text-black font-semibold' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                <i class="far fa-images w-6"></i>
                <span>Kelola Galeri</span>
            </a>
        @else
            <a href="{{ route('dashboard') }}" class="flex items-center w-full px-4 py-3 rounded-lg transition-colors {{ request()->routeIs('dashboard') ? 'bg-white text-black font-semibold' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                <i class="fas fa-chart-pie w-6"></i>
                <span>Dashboard User</span>
            </a>
        @endif

        <div class="mt-8 mb-2 px-4 border-t border-gray-800 pt-6"></div>

        <a href="{{ route('home') }}" class="flex items-center w-full px-4 py-3 rounded-lg transition-colors text-gray-300 hover:bg-gray-800 hover:text-white">
            <i class="fas fa-globe w-6"></i>
            <span>Kembali ke Website</span>
        </a>
        
        <form method="POST" action="{{ route('logout') }}" class="w-full mt-2">
            @csrf
            <button type="submit" class="flex items-center w-full px-4 py-3 rounded-lg transition-colors text-red-400 hover:bg-red-900/30 hover:text-red-300">
                <i class="fas fa-sign-out-alt w-6"></i>
                <span>Logout Keluar</span>
            </button>
        </form>
    </div>
</nav>

<!-- Mobile Navigation Menu Header -->
<div class="md:hidden bg-[#111111] text-white p-4 flex justify-between items-center" x-data="{ open: false }">
    <a href="{{ route('dashboard') }}" class="text-xl font-bold tracking-widest uppercase">
        TASTY FOOD
    </a>
    <button @click="open = !open" class="text-white hover:text-gray-300 focus:outline-none">
        <i class="fas fa-bars text-xl"></i>
    </button>
    
    <!-- Mobile dropdown panel -->
    <div x-show="open" @click.away="open = false" class="absolute top-16 left-0 w-full bg-[#111111] z-50 border-b border-gray-800" style="display: none;">
        <div class="px-2 pt-2 pb-3 space-y-1">
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('admin.dashboard') ? 'bg-gray-800 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">Dashboard</a>
                <a href="{{ route('admin.berita.index') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('admin.berita.*') ? 'bg-gray-800 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">Kelola Berita</a>
                <a href="{{ route('admin.galeri.index') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('admin.galeri.*') ? 'bg-gray-800 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">Kelola Galeri</a>
            @else
                <a href="{{ route('dashboard') }}" class="block px-3 py-2 rounded-md text-base font-medium {{ request()->routeIs('dashboard') ? 'bg-gray-800 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">Dashboard User</a>
            @endif
            <a href="{{ route('home') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Ke Website Penuh</a>
        </div>
    </div>
</div>
