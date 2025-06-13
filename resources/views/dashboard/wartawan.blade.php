@extends('layouts.app')

@section('content')
<div class="container mb-5">
    <h1 class="h3 text-gray-800">Dashboard Wartawan</h1>
    <p>Selamat datang, {{ auth()->user()->name }} 👋</p>

    <div class="my-3">
        <a href="{{ route('news.create') }}" class="btn btn-primary">
            <i class="fas fa-plus-circle"></i> Tambah Berita Baru
        </a>
    </div>

    <div class="row mb-4">
        <div class="col-md-6 mb-3">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <h6 class="text-primary font-weight-bold">Total Berita Published</h6>
                    <h3 class="font-weight-bold">{{ $publishedCount }} Berita</h3>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <h6 class="text-warning font-weight-bold">Total Berita Draft</h6>
                    <h3 class="font-weight-bold">{{ $draftCount }} Berita</h3>
                </div>
            </div>
        </div>
    </div>

    <h4 class="mt-4 mb-3">Berita Terbaru Kamu</h4>
    @forelse ($latestNews as $news)
        <div class="card shadow-sm mb-3">
            <div class="card-body">
                <h5 class="mb-1">{{ $news->title }}</h5>
                <p class="text-muted small">
                    Status: 
                    @if ($news->status === 'published')
                        <span class="badge bg-success text-white">Published</span>
                    @else
                        <span class="badge bg-secondary text-white">Draft</span>
                    @endif
                </p>
                <p>{{ Str::limit($news->content, 120) }}</p>
                <a href="{{ route('news.edit', $news->id) }}" class="btn btn-sm btn-info">
                    <i class="fas fa-edit"></i> Edit
                </a>
                <form action="{{ route('news.destroy', $news->id) }}" method="POST" class="d-inline" 
                      onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">
                        <i class="fas fa-trash-alt"></i> Hapus
                    </button>
                </form>
            </div>
        </div>
    @empty
        <p class="text-muted">Belum ada berita. Yuk buat berita pertamamu!</p>
    @endforelse
</div>
@endsection
