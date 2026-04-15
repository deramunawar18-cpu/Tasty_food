<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-3">
            <a href="{{ route('admin.berita.index') }}" class="w-10 h-10 flex items-center justify-center bg-white rounded-full shadow-sm text-gray-400 hover:text-black transition-colors" title="Kembali">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h2 class="font-bold text-2xl text-gray-800 uppercase tracking-widest leading-tight border-b-2 border-black inline-block pb-1">
                Buat Berita Baru
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

                <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                    @csrf
                    
                    <div class="space-y-2">
                        <label for="title" class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Judul Artikel</label>
                        <input type="text" name="title" id="title" class="w-full px-5 py-4 bg-gray-50 border-none rounded-xl focus:ring-2 focus:ring-black placeholder-gray-300 text-gray-900 font-medium transition-all" value="{{ old('title') }}" placeholder="Masukkan judul berita yang menarik..." required>
                    </div>

                    <div class="space-y-2">
                        <label for="content" class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Konten Berita</label>
                        <textarea name="content" id="content" rows="10" class="w-full px-5 py-4 bg-gray-50 border-none rounded-2xl focus:ring-2 focus:ring-black placeholder-gray-300 text-gray-900 leading-relaxed transition-all" placeholder="Tuliskan isi berita selengkap mungkin di sini..." required>{{ old('content') }}</textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-2">
                            <label for="image" class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Gambar Poster</label>
                            <label class="flex flex-col items-center px-4 py-6 bg-gray-50 text-gray-400 rounded-xl cursor-pointer hover:bg-gray-100 transition-all border-2 border-dashed border-gray-200">
                                <i class="fas fa-cloud-upload-alt text-2xl mb-2"></i>
                                <span class="text-xs font-medium">Klik untuk Pilih Gambar</span>
                                <input type="file" name="image" id="image" class="hidden">
                            </label>
                            <p class="text-[10px] text-gray-400 mt-1 ml-1">* Format: JPG, PNG, JPEG. Max: 10MB</p>
                        </div>

                        <div class="space-y-2">
                            <label for="status" class="text-xs font-bold uppercase tracking-widest text-gray-500 ml-1">Status Publikasi</label>
                            <select name="status" id="status" class="w-full px-5 py-4 bg-gray-50 border-none rounded-xl focus:ring-2 focus:ring-black text-gray-900 font-medium transition-all appearance-none cursor-pointer">
                                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Terbitkan Sekarang</option>
                                <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Simpan sebagai Draft</option>
                            </select>
                        </div>
                    </div>

                    <div class="pt-6 border-t border-gray-100 flex items-center justify-between">
                        <a href="{{ route('admin.berita.index') }}" class="text-sm font-bold uppercase tracking-widest text-gray-400 hover:text-black transition-colors">Batal</a>
                        <button type="submit" class="px-10 py-4 bg-[#111111] text-white hover:bg-gray-800 transition-all rounded-xl text-xs font-bold uppercase tracking-widest shadow-lg shadow-gray-200">
                            Simpan Artikel <i class="fas fa-paper-plane ml-2"></i>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
