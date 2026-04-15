<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->get();
        return view('admin.berita.index', compact('beritas'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        $data = $request->except('image');
        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/berita'), $imageName);
            $data['image'] = 'images/berita/' . $imageName;
        }

        $berita = Berita::create($data);

        ActivityLog::create([
            'user_id' => auth()->id(),
            'action_type' => 'CREATE_BERITA',
            'description' => 'Menambahkan berita baru: ' . $berita->title,
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan');
    }

    public function edit(Berita $berita)
    {
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        $data = $request->except('image');
        $data['slug'] = Str::slug($request->title);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/berita'), $imageName);
            $data['image'] = 'images/berita/' . $imageName;
        }

        $berita->update($data);

        ActivityLog::create([
            'user_id' => auth()->id(),
            'action_type' => 'UPDATE_BERITA',
            'description' => 'Memperbarui berita: ' . $berita->title,
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui');
    }

    public function destroy(Berita $berita)
    {
        ActivityLog::create([
            'user_id' => auth()->id(),
            'action_type' => 'DELETE_BERITA',
            'description' => 'Menghapus berita: ' . $berita->title,
        ]);
        
        if ($berita->image && file_exists(public_path($berita->image))) {
            unlink(public_path($berita->image));
        }

        $berita->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus');
    }
}
