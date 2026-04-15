<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-3">
            <a href="{{ route('admin.berita.index') }}" class="w-10 h-10 flex items-center justify-center bg-white rounded-full shadow-sm text-gray-400 hover:text-black transition-colors" title="Kembali">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h2 class="font-bold text-2xl text-gray-800 uppercase tracking-widest leading-tight border-b-2 border-black inline-block pb-1">
                Edit Berita
            </h2>
        </div>
    </x-slot>

    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-8 md:p-12">
                
                @if ($errors->any())
                    <div class="mb-8 bg-red-50 border-l-4 border-red-500 p-4 rounded-r-lg">
                        <div class="flex items-center mb-2 text-red-800 font-bold text-sm">
                            <i class="fas fa-exclamation-triangle mr-2"></i>
                            Terjadi Kesalahan:
                        </div>
                        <ul class="text-xs text-red-600 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.berita.update', $berita) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                    @csrf
                    @method('PUT')
                    
                    <div class="space-y-2">
                        <label for="title" class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Judul Artikel</label>
                        <input type="text" name="title" id="title" class="w-full px-5 py-4 bg-gray-50 border-none rounded-xl focus:ring-2 focus:ring-black transition-all text-gray-900 font-medium" value="{{ old('title', $berita->title) }}" required>
                    </div>

                    <div class="space-y-2">
                        <label for="content" class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Konten Berita</label>
                        <textarea name="content" id="content" rows="10" class="w-full px-5 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-black leading-relaxed transition-all text-gray-900" required>{{ old('content', $berita->content) }}</textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-2">
                            <label class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Poster Saat Ini</label>
                            @if($berita->image)
                                <div class="relative group h-40 rounded-xl overflow-hidden border border-gray-100 shadow-sm">
                                    <img src="{{ asset($berita->image) }}" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500">
                                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                        <span class="text-white text-[10px] font-bold uppercase tracking-widest">Gambar Aktif</span>
                                    </div>
                                </div>
                            @else
                                <div class="h-40 bg-gray-50 rounded-xl flex items-center justify-center text-gray-300 border-2 border-dashed border-gray-100">
                                    <i class="far fa-image text-3xl"></i>
                                </div>
                            @endif
                            
                            <div class="mt-4">
                                <label for="image" class="text-[11px] font-bold text-gray-400 mb-1 block">GANTI GAMBAR (OPSIONAL)</label>
                                <input type="file" name="image" id="image" class="block w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-[10px] file:font-black file:bg-gray-100 file:text-gray-700 hover:file:bg-black hover:file:text-white transition-all">
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <div class="space-y-2 mb-6">
                                <label for="status" class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Status Publikasi</label>
                                <select name="status" id="status" class="w-full px-5 py-4 bg-gray-50 border-none rounded-xl focus:ring-2 focus:ring-black text-gray-900 font-medium transition-all appearance-none cursor-pointer">
                                    <option value="published" {{ old('status', $berita->status) == 'published' ? 'selected' : '' }}>Published (Terbit)</option>
                                    <option value="draft" {{ old('status', $berita->status) == 'draft' ? 'selected' : '' }}>Draft (Arsip)</option>
                                </select>
                            </div>
                            
                            <div class="bg-gray-50 p-6 rounded-xl border border-gray-100 mt-auto">
                                <div class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-3">Informasi Sistem</div>
                                <div class="space-y-2">
                                    <div class="flex justify-between text-[11px]">
                                        <span class="text-gray-500">Terakhir Diperbarui:</span>
                                        <span class="font-bold text-gray-700">{{ $berita->updated_at->format('d M Y, H:i') }}</span>
                                    </div>
                                    <div class="flex justify-between text-[11px]">
                                        <span class="text-gray-500">ID Konten:</span>
                                        <span class="font-bold text-gray-700">#{{ str_pad($berita->id, 5, '0', STR_PAD_LEFT) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pt-8 border-t border-gray-100 flex items-center justify-between">
                        <a href="{{ route('admin.berita.index') }}" class="text-sm font-bold uppercase tracking-widest text-gray-400 hover:text-black transition-colors">Batal</a>
                        <button type="submit" class="px-12 py-4 bg-[#111111] text-white hover:bg-gray-800 transition-all rounded-xl text-xs font-bold uppercase tracking-widest shadow-xl shadow-gray-200">
                            Update Artikel <i class="fas fa-sync-alt ml-2"></i>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
