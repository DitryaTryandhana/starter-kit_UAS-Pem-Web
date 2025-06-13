@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Verifikasi Berita</h2>

    @forelse ($news as $item)
        <div class="card mb-3">
            <div class="card-body">
                <h5>{{ $item->title }}</h5>
                <p>{{ Str::limit($item->content, 100) }}</p>

                <form action="{{ route('news.approve', $item->id) }}" method="POST">
                    @csrf @method('PUT')
                    <button class="btn btn-success">Approve</button>
                </form>
            </div>
        </div>
    @empty
        <p>Tidak ada berita untuk diverifikasi.</p>
    @endforelse
</div>
@endsection
