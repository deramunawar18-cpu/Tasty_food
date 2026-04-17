<x-guest-layout>
    <!-- Dual Tab Switcher -->
    <div class="flex justify-center mb-10 p-1 bg-gray-100 rounded-2xl">
        <button type="button" id="tab-member" class="flex-1 py-3 text-[10px] font-black uppercase tracking-[0.2em] rounded-xl transition-all duration-300 bg-white shadow-md text-black">
            <i class="fas fa-user-circle mr-2"></i> Member
        </button>
        <button type="button" id="tab-admin" class="flex-1 py-3 text-[10px] font-black uppercase tracking-[0.2em] rounded-xl transition-all duration-300 text-gray-400 hover:text-gray-600">
            <i class="fas fa-user-shield mr-2"></i> Admin
        </button>
    </div>

    <div class="mb-10">
        <h2 id="login-title" class="text-2xl font-bold text-gray-900 uppercase tracking-widest border-b-2 border-black inline-block pb-1 transition-all duration-300">Login Member</h2>
        <p id="login-desc" class="text-[11px] text-gray-400 mt-4 font-bold tracking-[0.2em] uppercase leading-relaxed transition-all duration-300">Masuk untuk menikmati resep dan artikel eksklusif dari Tasty Food.</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-6" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf

        <!-- Email Address -->
        <div class="space-y-2">
            <label for="email" class="text-[10px] font-bold uppercase tracking-[0.2em] text-gray-400 ml-1">Email Address</label>
            <div class="relative group">
                <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-300 group-focus-within:text-black transition-colors">
                    <i class="far fa-envelope"></i>
                </span>
                <input id="email" class="block w-full pl-11 pr-4 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-black transition-all text-sm font-medium placeholder-gray-300" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="user@tastyfood.com" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-[10px] font-bold uppercase tracking-widest" />
        </div>

        <!-- Password -->
        <div class="space-y-2">
            <div class="flex justify-between items-center px-1">
                <label for="password" class="text-[10px] font-bold uppercase tracking-[0.2em] text-gray-400">Password</label>
                @if (Route::has('password.request'))
                    <a class="text-[10px] font-bold uppercase tracking-widest text-gray-400 hover:text-black transition-colors" href="{{ route('password.request') }}">
                        Lupa Kata Sandi?
                    </a>
                @endif
            </div>
            <div class="relative group">
                <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-300 group-focus-within:text-black transition-colors">
                    <i class="fas fa-lock text-xs"></i>
                </span>
                <input id="password" class="block w-full pl-11 pr-4 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-black transition-all text-sm font-medium placeholder-gray-300"
                                type="password"
                                name="password"
                                required autocomplete="current-password" placeholder="••••••••" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-[10px] font-bold uppercase tracking-widest" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between px-1">
            <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                <input id="remember_me" type="checkbox" class="rounded-lg border-gray-200 text-black shadow-sm focus:ring-black transition-all cursor-pointer" name="remember">
                <span class="ms-3 text-[10px] font-bold uppercase tracking-[0.2em] text-gray-400 group-hover:text-gray-600 transition-colors">Ingat Perangkat Ini</span>
            </label>
        </div>

        <div class="pt-4">
            <button type="submit" class="w-full py-4 bg-[#111111] text-white rounded-2xl text-xs font-bold uppercase tracking-[0.2em] shadow-xl hover:bg-gray-800 transition-all duration-300 group flex items-center justify-center">
                <span id="btn-text">Masuk Sekarang</span>
                <i class="fas fa-arrow-right ml-3 group-hover:translate-x-1 transition-transform"></i>
            </button>
        </div>

        <div class="text-center pt-8 border-t border-gray-100/50">
            <p class="text-[10px] font-bold uppercase tracking-[0.2em] text-gray-400">
                Belum memiliki akun? 
                <a href="{{ route('register') }}" class="text-black hover:underline underline-offset-4 ml-1 transition-all">Daftar Sekarang</a>
            </p>
        </div>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabMember = document.getElementById('tab-member');
            const tabAdmin = document.getElementById('tab-admin');
            const loginTitle = document.getElementById('login-title');
            const loginDesc = document.getElementById('login-desc');
            const btnText = document.getElementById('btn-text');
            const emailInput = document.getElementById('email');

            const content = {
                member: {
                    title: 'Login Member',
                    desc: 'Masuk untuk menikmati resep dan artikel eksklusif dari Tasty Food.',
                    placeholder: 'user@tastyfood.com',
                    btn: 'Masuk Sekarang'
                },
                admin: {
                    title: 'Login Admin',
                    desc: 'Silakan masuk untuk mengelola konten Tasty Food Anda secara profesional.',
                    placeholder: 'admin@tastyfood.com',
                    btn: 'Akses Dasbor Admin'
                }
            };

            const switchTab = (mode) => {
                if (mode === 'member') {
                    tabMember.classList.add('bg-white', 'shadow-md', 'text-black');
                    tabMember.classList.remove('text-gray-400', 'hover:text-gray-600');
                    tabAdmin.classList.remove('bg-white', 'shadow-md', 'text-black');
                    tabAdmin.classList.add('text-gray-400', 'hover:text-gray-600');
                    
                    loginTitle.textContent = content.member.title;
                    loginDesc.textContent = content.member.desc;
                    emailInput.placeholder = content.member.placeholder;
                    btnText.textContent = content.member.btn;
                } else {
                    tabAdmin.classList.add('bg-white', 'shadow-md', 'text-black');
                    tabAdmin.classList.remove('text-gray-400', 'hover:text-gray-600');
                    tabMember.classList.remove('bg-white', 'shadow-md', 'text-black');
                    tabMember.classList.add('text-gray-400', 'hover:text-gray-600');
                    
                    loginTitle.textContent = content.admin.title;
                    loginDesc.textContent = content.admin.desc;
                    emailInput.placeholder = content.admin.placeholder;
                    btnText.textContent = content.admin.btn;
                }
            };

            tabMember.addEventListener('click', () => switchTab('member'));
            tabAdmin.addEventListener('click', () => switchTab('admin'));
        });
    </script>
</x-guest-layout>
