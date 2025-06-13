@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm mb-5">
        <div class="card-body">
            <h2 class="mb-4">Edit Berita</h2>

            <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" name="title" class="form-control" value="{{ $news->title }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Konten</label>
                    <textarea name="content" rows="5" class="form-control" required>{{ $news->content }}</textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label">Gambar Saat Ini</label><br>
                    @if($news->image)
                        <img src="{{ asset('storage/' . $news->image) }}" alt="" width="250" class="rounded shadow-sm mb-3">
                    @else
                        <p><i>Tidak ada gambar</i></p>
                    @endif
                </div>

                <div class="mb-4">
                    <label class="form-label">Ganti Gambar (optional)</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="mb-4">
                    <label class="form-label">Kategori</label>
                    <select name="category_id" class="form-control" required>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ $news->category_id == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="d-grid">
                    <button class="btn btn-success">
                        <i class="fas fa-save me-1"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
