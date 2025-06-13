<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->get();
        return view('news.index', compact('news'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('news.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048', // validasi tambahan ukuran
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('news_images', 'public');
        }

        $data['user_id'] = Auth::id();
        $data['status'] = 'draft';

        News::create($data);

        return redirect()->route('news.index')->with('success', 'Berita disimpan sebagai draft.');
    }

    public function edit(News $news)
    {
        $categories = Category::all();
        return view('news.edit', compact('news', 'categories'));
    }

    public function update(Request $request, News $news)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $data['image'] = $request->file('image')->store('news_images', 'public');
        }

        $news->update($data);

        return redirect()->route('news.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(News $news)
    {
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();

        return back()->with('success', 'Berita berhasil dihapus.');
    }

    public function approve($id)
    {
        $news = News::where('id', $id)->where('status', 'draft')->firstOrFail();
        $news->update(['status' => 'published']);

        return back()->with('success', 'Berita berhasil dipublish.');
    }

    public function editorList()
    {
        $news = News::where('status', 'draft')->get();
        return view('news.editor', compact('news'));
    }

    public function pending()
    {
        $news = \App\Models\News::where('status', 'draft')->latest()->get();
        return view('news.pending', compact('news'));
    }

}
