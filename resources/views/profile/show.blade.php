@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4 text-primary fw-bold">Profil Pengguna</h3>

    <div class="card shadow-sm rounded-3 border-0">
        <div class="card-body px-4 py-3">
            <div class="row mb-3">
                <div class="col-sm-2 fw-semibold text-muted">Nama</div>
                <div class="col-sm-8">: {{ $user->name }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-2 fw-semibold text-muted">Email</div>
                <div class="col-sm-8">: {{ $user->email }}</div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-2 fw-semibold text-muted">Role</div>
                <div class="col-sm-8">
                    <span class="badge bg-primary text-white px-3 py-1 fs-6">{{ strtoupper($user->role) }}</span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-2 fw-semibold text-muted">Terdaftar Sejak</div>
                <div class="col-sm-8">: {{ $user->created_at->translatedFormat('d F Y') }}</div>
            </div>
        </div>
    </div>
</div>
@endsection
