@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm mb-5">
        <div class="card-body">
            <h2 class="mb-4">Tambah Berita</h2>

            <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Konten</label>
                    <textarea name="content" rows="5" class="form-control" required></textarea>
                </div>

                <div class="mb-4">
                    <label class="form-label">Gambar (optional)</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="mb-4">
                    <label class="form-label">Kategori</label>
                    <select name="category_id" class="form-control" required>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Simpan Draft
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
