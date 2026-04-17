<x-guest-layout>
    <div class="mb-10">
        <h2 class="text-2xl font-bold text-gray-900 uppercase tracking-widest border-b-2 border-black inline-block pb-1">Daftar Akun</h2>
        <p class="text-[11px] text-gray-400 mt-4 font-bold tracking-[0.2em] uppercase leading-relaxed">Bergabunglah dengan komunitas Tasty Food dan mulai kreasi kuliner Anda.</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf

        <!-- Name -->
        <div class="space-y-2">
            <label for="name" class="text-[10px] font-bold uppercase tracking-[0.2em] text-gray-400 ml-1">Nama Lengkap</label>
            <div class="relative group">
                <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-300 group-focus-within:text-black transition-colors">
                    <i class="far fa-user"></i>
                </span>
                <input id="name" class="block w-full pl-11 pr-4 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-black transition-all text-sm font-medium placeholder-gray-300" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="John Doe" />
            </div>
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-[10px] font-bold uppercase tracking-widest" />
        </div>

        <!-- Email Address -->
        <div class="space-y-2">
            <label for="email" class="text-[10px] font-bold uppercase tracking-[0.2em] text-gray-400 ml-1">Email Address</label>
            <div class="relative group">
                <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-300 group-focus-within:text-black transition-colors">
                    <i class="far fa-envelope"></i>
                </span>
                <input id="email" class="block w-full pl-11 pr-4 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-black transition-all text-sm font-medium placeholder-gray-300" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="john@example.com" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-[10px] font-bold uppercase tracking-widest" />
        </div>

        <!-- Password -->
        <div class="space-y-2">
            <label for="password" class="text-[10px] font-bold uppercase tracking-[0.2em] text-gray-400 ml-1">Password</label>
            <div class="relative group">
                <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-300 group-focus-within:text-black transition-colors">
                    <i class="fas fa-lock text-xs"></i>
                </span>
                <input id="password" class="block w-full pl-11 pr-4 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-black transition-all text-sm font-medium placeholder-gray-300"
                                type="password"
                                name="password"
                                required autocomplete="new-password" placeholder="••••••••" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-[10px] font-bold uppercase tracking-widest" />
        </div>

        <!-- Confirm Password -->
        <div class="space-y-2">
            <label for="password_confirmation" class="text-[10px] font-bold uppercase tracking-[0.2em] text-gray-400 ml-1">Konfirmasi Password</label>
            <div class="relative group">
                <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-300 group-focus-within:text-black transition-colors">
                    <i class="fas fa-check-double text-xs"></i>
                </span>
                <input id="password_confirmation" class="block w-full pl-11 pr-4 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-black transition-all text-sm font-medium placeholder-gray-300"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" />
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-[10px] font-bold uppercase tracking-widest" />
        </div>

        <div class="pt-4">
            <button type="submit" class="w-full py-4 bg-[#111111] text-white rounded-2xl text-xs font-bold uppercase tracking-[0.2em] shadow-xl hover:bg-gray-800 transition-all duration-300 group flex items-center justify-center">
                <span>Daftar Sekarang</span>
                <i class="fas fa-user-plus ml-3 group-hover:translate-x-1 transition-transform"></i>
            </button>
        </div>

        <div class="text-center pt-8 border-t border-gray-100/50">
            <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-gray-400">
                Sudah memiliki akun? 
                <a href="{{ route('login') }}" class="text-black hover:underline underline-offset-4 ml-1 transition-all">Masuk di sini</a>
            </p>
        </div>
    </form>
</x-guest-layout>
