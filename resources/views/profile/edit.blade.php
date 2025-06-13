@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Edit Profil</h3>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', auth()->user()->name) }}" required>
        </div>

        <div class="form-group mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', auth()->user()->email) }}" required>
        </div>

        <div class="form-group mb-3">
            <label>Password Baru (opsional)</label>
            <input type="password" name="password" class="form-control" placeholder="Biarkan kosong jika tidak ingin mengubah">
        </div>

        <div class="form-group mb-4">
            <label>Konfirmasi Password Baru</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>

        <button class="btn btn-primary">
            <i class="fas fa-save"></i> Simpan Perubahan
        </button>
    </form>
</div>
@endsection
