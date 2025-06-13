@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Daftar Berita</h2>
        <a href="{{ route('news.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> Tambah Berita
        </a>
    </div>

    @forelse ($news as $item)
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h5 class="card-title mb-2">{{ $item->title }}</h5>
                <p class="text-muted mb-1">
                    Status:
                    @if($item->status === 'published')
                        <span class="badge bg-success text-white text-uppercase">Published</span>
                    @else
                        <span class="badge bg-secondary text-white text-uppercase">Draft</span>
                    @endif
                </p>
                <p class="card-text text-truncate">{{ Str::limit(strip_tags($item->content), 150) }}</p>

                <div class="mt-3">
                    <a href="{{ route('news.edit', $item->id) }}" class="btn btn-warning btn-sm me-2">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('news.destroy', $item->id) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                            <i class="fas fa-trash-alt"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <div class="alert alert-info">
            Belum ada berita yang ditulis.
        </div>
    @endforelse
</div>
@endsection
