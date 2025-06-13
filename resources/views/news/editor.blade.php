@extends('layouts.app')

@section('content')
<h1 class="h3 text-gray-800">Verifikasi Berita</h1>

@foreach ($news as $item)
    <div class="card mb-3 shadow-sm">
        <div class="card-body">
            <h5>{{ $item->title }}</h5>
            <p class="text-muted mb-1">Status: <span class="badge bg-warning text-dark">Draft</span></p>
            <p class="mb-2">{{ Str::limit($item->content, 100) }}</p>

            <form action="{{ route('news.approve', $item->id) }}" method="POST" class="d-inline">
                @csrf @method('PUT')
                <button class="btn btn-success btn-sm">
                    <i class="fas fa-check-circle"></i> Approve
                </button>
            </form>
        </div>
    </div>
@endforeach
@endsection
