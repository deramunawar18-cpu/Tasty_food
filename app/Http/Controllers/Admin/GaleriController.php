<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::latest()->get();
        return view('admin.galeri.index', compact('galeris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/galeri'), $imageName);
            
            Galeri::create([
                'image' => 'images/galeri/' . $imageName
            ]);

            ActivityLog::create([
                'user_id' => auth()->id(),
                'action_type' => 'UPLOAD_GALERI',
                'description' => 'Mengunggah foto baru ke galeri',
            ]);

            return redirect()->route('admin.galeri.index')->with('success', 'Gambar berhasil diunggah!');
        }

        return back()->withErrors(['image' => 'Gagal mengunggah gambar.']);
    }

    public function destroy(Galeri $galeri)
    {
        ActivityLog::create([
            'user_id' => auth()->id(),
            'action_type' => 'DELETE_GALERI',
            'description' => 'Menghapus foto dari galeri',
        ]);

        if ($galeri->image && file_exists(public_path($galeri->image))) {
            unlink(public_path($galeri->image));
        }

        $galeri->delete();

        return redirect()->route('admin.galeri.index')->with('success', 'Gambar berhasil dihapus dari galeri');
    }
}
