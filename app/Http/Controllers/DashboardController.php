<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\User;
use App\Models\News;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('dashboard'); // redirect kalau bukan admin
        }

        $published = News::where('status', 'published')->count();
        $draft = News::where('status', 'draft')->count();

        $beritaPerKategori = Category::withCount('news')->get();
        $beritaPerWartawan = User::where('role', 'wartawan')
            ->withCount('news')
            ->get();

        return view('dashboard.admin', compact('published', 'draft', 'beritaPerKategori', 'beritaPerWartawan'));
    }
}
