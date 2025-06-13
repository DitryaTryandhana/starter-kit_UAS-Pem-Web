@extends('layouts.app')

@section('content')
<div class="container-fluid">
    {{-- Header --}}
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h3 class="mb-0">Dashboard Admin</h3>
            <small class="text-muted">Selamat datang, {{ auth()->user()->name }} 👋</small>
        </div>
    </div>

    {{-- Statistik Berita --}}
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card border-left-success shadow-sm h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Published
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $published }} Berita</div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card border-left-secondary shadow-sm h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                        Draft
                    </div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $draft }} Berita</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Statistik per Kategori --}}
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h5 class="mb-3">
                <i class="fas fa-layer-group me-2"></i>Statistik Berita per Kategori</h5>
            <ul class="list-group">
                @forelse ($beritaPerKategori as $cat)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $cat->name }}
                        <span class="badge bg-primary rounded-pill text-white fw-bold">{{ $cat->news_count }}</span>
                    </li>
                @empty
                    <li class="list-group-item">Belum ada kategori</li>
                @endforelse
            </ul>
        </div>
    </div>

    {{-- Statistik per Wartawan --}}
    <div class="card shadow-sm mb-5">
        <div class="card-body">
            <h5 class="mb-3"><i class="fas fa-user-edit me-2"></i>Statistik Berita per Wartawan</h5>
            <ul class="list-group">
                @forelse ($beritaPerWartawan as $user)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $user->name }}
                        <span class="badge bg-success rounded-pill text-white fw-bold">{{ $user->news_count }}</span>
                    </li>
                @empty
                    <li class="list-group-item">Belum ada wartawan</li>
                @endforelse
            </ul>
        </div>
    </div>
</div>
@endsection
