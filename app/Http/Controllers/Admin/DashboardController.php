<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\User;
use App\Models\ActivityLog;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBerita = Berita::count();
        $totalGaleri = Galeri::count();
        $totalUser = User::where('role', 'user')->count();
        $logs = ActivityLog::with('user')->latest()->take(10)->get();

        return view('admin.dashboard', compact('totalBerita', 'totalGaleri', 'totalUser', 'logs'));
    }
}
