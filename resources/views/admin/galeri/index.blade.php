<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 uppercase tracking-widest leading-tight border-b-2 border-black inline-block pb-1">
            Manajemen Galeri
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto space-y-10">
        
        <!-- Upload Section -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-8">
                <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                    <div>
                        <h3 class="text-sm font-bold uppercase tracking-widest text-gray-800 mb-1">Unggah Koleksi Baru</h3>
                        <p class="text-xs text-gray-400">Tambahkan momen terbaik ke dalam galeri Tasty Food</p>
                    </div>

                    <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col sm:flex-row items-center gap-4">
                        @csrf
                        <div class="relative group">
                            <input type="file" name="image" id="image" required class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                            <div class="px-6 py-3 bg-gray-50 border-2 border-dashed border-gray-200 rounded-xl text-gray-400 group-hover:bg-gray-100 group-hover:border-black transition-all flex items-center">
                                <i class="fas fa-camera mr-2 text-sm"></i>
                                <span class="text-xs font-bold uppercase tracking-widest" id="fileName">Pilih File Foto</span>
                            </div>
                        </div>
                        <button type="submit" class="w-full sm:w-auto px-8 py-3 bg-black text-white rounded-xl text-xs font-bold uppercase tracking-widest hover:bg-gray-800 transition-all shadow-lg shadow-gray-200">
                            Upload <i class="fas fa-cloud-upload-alt ml-2"></i>
                        </button>
                    </form>
                </div>

                @if ($errors->any())
                    <div class="mt-6 bg-red-50 text-red-600 p-4 rounded-xl text-xs font-medium border border-red-100">
                        @foreach ($errors->all() as $error)
                            <div class="flex items-center"><i class="fas fa-times-circle mr-2"></i> {{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                @if(session('success'))
                    <div class="mt-6 bg-stone-50 text-stone-800 p-4 rounded-xl text-xs font-bold border border-stone-100 flex items-center tracking-widest uppercase">
                        <i class="fas fa-check-circle mr-2 text-stone-600"></i> {{ session('success') }}
                    </div>
                @endif
            </div>
        </div>

        <!-- Gallery Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 pb-10">
            @forelse($galeris as $galeri)
                <div class="group relative flex flex-col">
                    <!-- Polaroid Card -->
                    <div class="bg-white p-4 shadow-sm border border-gray-100 rounded-sm transform transition-all duration-500 group-hover:-rotate-2 group-hover:shadow-xl group-hover:scale-105">
                        <div class="relative overflow-hidden aspect-square rounded-sm">
                            <img src="{{ asset($galeri->image) }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            
                            <!-- Overlay Actions -->
                            <div class="absolute inset-0 bg-black/60 opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-center justify-center space-x-3">
                                <form action="{{ route('admin.galeri.destroy', $galeri) }}" method="POST" onsubmit="return confirm('Hapus foto ini secara permanen?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-12 h-12 bg-white text-red-500 rounded-full flex items-center justify-center hover:bg-red-500 hover:text-white transition-all transform translate-y-4 group-hover:translate-y-0 duration-500">
                                        <i class="far fa-trash-alt text-lg"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="pt-4 pb-2 text-center">
                            <span class="text-[10px] font-bold text-gray-300 uppercase tracking-[0.2em] italic">Tasty Moment</span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-20 text-center bg-gray-50 rounded-3xl border-2 border-dashed border-gray-100">
                    <div class="flex flex-col items-center opacity-30">
                        <i class="far fa-images text-6xl mb-4"></i>
                        <p class="font-bold uppercase tracking-widest text-sm text-gray-400">Belum Ada Foto Koleksi</p>
                    </div>
                </div>
            @endforelse
        </div>

    </div>

    @section('extra_js')
    <script>
        document.getElementById('image').onchange = function() {
            document.getElementById('fileName').innerHTML = this.files[0].name;
            document.getElementById('fileName').classList.add('text-black');
        };
    </script>
    @endsection
</x-app-layout>
