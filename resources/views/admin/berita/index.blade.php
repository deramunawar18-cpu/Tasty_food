<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-gray-800 uppercase tracking-widest leading-tight border-b-2 border-black inline-block pb-1">
                Kelola Berita
            </h2>
            <a href="{{ route('admin.berita.create') }}" class="px-6 py-2.5 bg-[#111111] text-white hover:bg-gray-800 transition-colors rounded-lg text-xs font-bold uppercase tracking-widest shadow-sm">
                <i class="fas fa-plus mr-2"></i> Tambah Berita
            </a>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-8">
                
                @if(session('success'))
                    <div class="mb-6 bg-stone-50 border-l-4 border-black p-4 flex items-center justify-between shadow-sm">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-stone-800 mr-3"></i>
                            <span class="text-stone-800 font-medium text-sm">{{ session('success') }}</span>
                        </div>
                        <button type="button" class="text-stone-400 hover:text-stone-600 transition-colors" onclick="this.parentElement.remove()">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-600">
                        <thead class="text-xs text-gray-500 uppercase bg-gray-50/50">
                            <tr>
                                <th scope="col" class="px-6 py-4 font-semibold tracking-wider">Poster</th>
                                <th scope="col" class="px-6 py-4 font-semibold tracking-wider">Judul Artikel</th>
                                <th scope="col" class="px-6 py-4 font-semibold tracking-wider">Status</th>
                                <th scope="col" class="px-6 py-4 font-semibold tracking-wider text-right">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($beritas as $berita)
                                <tr class="bg-white hover:bg-gray-50/50 transition-colors group">
                                    <td class="px-6 py-5 whitespace-nowrap">
                                        @if($berita->image)
                                            <div class="relative w-24 h-16 overflow-hidden rounded-lg shadow-sm border border-gray-100">
                                                <img src="{{ asset($berita->image) }}" alt="Thumbnail" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                                            </div>
                                        @else
                                            <div class="w-24 h-16 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400">
                                                <i class="fas fa-image text-xl"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-5">
                                        <div class="font-bold text-gray-900 mb-0.5 text-base">{{ $berita->title }}</div>
                                        <div class="text-[11px] text-gray-400 flex items-center">
                                            <i class="far fa-calendar-alt mr-1.5"></i> {{ $berita->created_at->format('d M Y') }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-5">
                                        @if($berita->status === 'published')
                                            <span class="bg-black text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-tighter shadow-sm">Published</span>
                                        @else
                                            <span class="bg-gray-100 text-gray-500 text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-tighter">Draft</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-5 text-right">
                                        <div class="flex justify-end items-center space-x-3">
                                            <a href="{{ route('admin.berita.edit', $berita) }}" class="w-10 h-10 flex items-center justify-center bg-gray-50 text-gray-600 rounded-xl hover:bg-black hover:text-white transition-all duration-300 shadow-sm" title="Edit Berita">
                                                <i class="far fa-edit text-sm"></i>
                                            </a>
                                            <form action="{{ route('admin.berita.destroy', $berita) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini secara permanen?');" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="w-10 h-10 flex items-center justify-center bg-gray-50 text-red-400 rounded-xl hover:bg-red-500 hover:text-white transition-all duration-300 shadow-sm" title="Hapus Berita">
                                                    <i class="far fa-trash-alt text-sm"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-20 text-center">
                                        <div class="flex flex-col items-center justify-center space-y-3 opacity-40">
                                            <i class="far fa-newspaper text-5xl text-gray-300"></i>
                                            <p class="text-gray-500 font-medium">Belum ada berita yang tersedia.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
