<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\News;

class RedirectController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        if ($user->role === 'editor') {
            return view('dashboard.editor');
        }

        if ($user->role === 'wartawan') {
            $publishedCount = News::where('user_id', $user->id)->where('status', 'published')->count();
            $draftCount = News::where('user_id', $user->id)->where('status', 'draft')->count();
            $latestNews = News::where('user_id', $user->id)->latest()->take(3)->get();

            return view('dashboard.wartawan', compact('publishedCount', 'draftCount', 'latestNews'));
        }

        return abort(403, 'Role tidak dikenali.');
    }
}
