@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h1 class="mb-4 text-primary fw-bold">Edit User: {{ $user->name }}</h1>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="needs-validation" novalidate>
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label fw-semibold">Nama</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @else
                <div class="form-text">Masukkan nama lengkap user.</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label fw-semibold">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @else
                <div class="form-text">Masukkan alamat email yang valid.</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="role" class="form-label fw-semibold">Role</label>
            <select class="form-select @error('role') is-invalid @enderror" id="role" name="role" required>
                <option value="" disabled>Pilih role user</option>
                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
                <!-- Tambah opsi role lain jika ada -->
            </select>
            @error('role')
                <div class="invalid-feedback">{{ $message }}</div>
            @else
                <div class="form-text">Pilih peran user dalam sistem.</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary shadow-sm">
            <i class="bi bi-save me-2"></i> Simpan Perubahan
        </button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary ms-2">Batal</a>
    </form>
</div>

<script>
// Contoh validasi Bootstrap 5 custom
(() => {
    'use strict'
    const forms = document.querySelectorAll('.needs-validation')
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }
            form.classList.add('was-validated')
        }, false)
    })
})()
</script>
@endsection
