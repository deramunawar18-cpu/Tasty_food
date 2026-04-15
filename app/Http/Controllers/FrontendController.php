<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Berita;
use App\Models\Galeri;

class FrontendController extends Controller
{
    public function home()
    {
        $beritas = Berita::where('status', 'published')->latest()->take(5)->get();
        return view('frontend.home', compact('beritas'));
    }

    public function tentang()
    {
        return view('frontend.tentang');
    }

    public function berita()
    {
        $beritas = Berita::where('status', 'published')->latest()->get();
        return view('frontend.berita', compact('beritas'));
    }

    public function showBerita($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        return view('frontend.berita_show', compact('berita'));
    }

    public function galeri()
    {
        $galeris = Galeri::latest()->get();
        return view('frontend.galeri', compact('galeris'));
    }

    public function kontak()
    {
        return view('frontend.kontak');
    }
}
