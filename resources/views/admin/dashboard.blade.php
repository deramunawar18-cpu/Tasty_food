<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 uppercase tracking-widest leading-tight border-b-2 border-black inline-block pb-1">
            Overview
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto">
        
        <!-- Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-10 mt-4">
            <!-- Card 1 -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex items-center justify-between transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                <div>
                    <div class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-1">Total Berita</div>
                    <div class="text-4xl font-bold text-gray-900">{{ $totalBerita }}</div>
                </div>
                <div class="w-14 h-14 bg-gray-100 rounded-full flex items-center justify-center text-black">
                    <i class="far fa-newspaper text-2xl"></i>
                </div>
            </div>
            
            <!-- Card 2 -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex items-center justify-between transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                <div>
                    <div class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-1">Total Galeri Foto</div>
                    <div class="text-4xl font-bold text-gray-900">{{ $totalGaleri }}</div>
                </div>
                <div class="w-14 h-14 bg-gray-100 rounded-full flex items-center justify-center text-black">
                    <i class="far fa-images text-2xl"></i>
                </div>
            </div>
            
            <!-- Card 3 -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex items-center justify-between transition-all duration-300 hover:shadow-lg hover:-translate-y-1">
                <div>
                    <div class="text-sm font-medium text-gray-500 uppercase tracking-wider mb-1">User Terdaftar</div>
                    <div class="text-4xl font-bold text-gray-900">{{ $totalUser }}</div>
                </div>
                <div class="w-14 h-14 bg-gray-100 rounded-full flex items-center justify-center text-black">
                    <i class="fas fa-users text-2xl"></i>
                </div>
            </div>
        </div>

        <!-- Table History -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-8 py-6 border-b border-gray-100 flex justify-between items-center">
                <h3 class="text-lg font-bold text-gray-800 uppercase tracking-wide">Aktivitas Terbaru</h3>
                <i class="fas fa-history text-gray-400"></i>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-600">
                    <thead class="text-xs text-gray-500 uppercase bg-gray-50/50">
                        <tr>
                            <th scope="col" class="px-8 py-4 font-semibold tracking-wider">Waktu</th>
                            <th scope="col" class="px-8 py-4 font-semibold tracking-wider">User</th>
                            <th scope="col" class="px-8 py-4 font-semibold tracking-wider">Aksi</th>
                            <th scope="col" class="px-8 py-4 font-semibold tracking-wider">Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($logs as $log)
                            <tr class="bg-white hover:bg-gray-50/50 transition-colors">
                                <td class="px-8 py-5 whitespace-nowrap text-gray-500">
                                    {{ $log->created_at->format('d M Y, H:i') }}
                                </td>
                                <td class="px-8 py-5 font-medium text-gray-900">
                                    {{ $log->user->name }}
                                </td>
                                <td class="px-8 py-5">
                                    @php
                                        $badgeColor = 'bg-gray-100 text-gray-800';
                                        if(str_contains($log->action_type, 'CREATE')) $badgeColor = 'bg-stone-100 text-stone-800';
                                        if(str_contains($log->action_type, 'UPDATE')) $badgeColor = 'bg-neutral-100 text-neutral-800';
                                        if(str_contains($log->action_type, 'DELETE')) $badgeColor = 'bg-red-50 text-red-700';
                                    @endphp
                                    <span class="{{ $badgeColor }} text-[11px] font-bold px-3 py-1 rounded-full uppercase tracking-wide">{{ $log->action_type }}</span>
                                </td>
                                <td class="px-8 py-5">
                                    {{ $log->description }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-8 py-10 text-center text-gray-500">Belum ada aktivitas yang dicatat.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-app-layout>
