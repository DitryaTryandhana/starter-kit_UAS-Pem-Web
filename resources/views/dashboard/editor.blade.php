@extends('layouts.app')

@section('content')
<div class="container mb-5">
    <h1 class="h3 text-gray-800">Dashboard Editor</h1>
    <p>Selamat datang, {{ auth()->user()->name }} 👋</p>

    <div class="card shadow-sm mt-3">
        <div class="card-body">
            <h4 class="mb-3"><i class="fas fa-tasks"></i> Tugas Hari Ini</h4>
            <p class="text-muted">Siap memverifikasi berita dari para wartawan? Klik tombol di bawah untuk mulai meninjau.</p>

            <a href="{{ route('editor.news') }}" class="btn btn-primary">
                <i class="fas fa-check-circle"></i> Verifikasi Berita
            </a>
        </div>
    </div>

    <div class="mt-5">
        <h5><i class="fas fa-info-circle"></i> Panduan Singkat</h5>
        <ul class="text-muted">
            <li>Pastikan berita sesuai dengan kebijakan redaksi.</li>
            <li>Periksa tata bahasa, isi, dan relevansi berita.</li>
            <li>Hanya klik <strong>Approve</strong> jika berita sudah layak terbit.</li>
        </ul>
    </div>
</div>
@endsection
