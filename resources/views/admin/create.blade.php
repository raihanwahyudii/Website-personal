@extends('layouts.admin')

@section('content')
<h1>Tambah User Baru</h1>

<form action="{{ route('admin.users.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Nama</label>
        <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
        @error('email')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" id="password" name="password" class="form-control" required>
        @error('password')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="role" class="form-label">Role</label>
        <select id="role" name="role" class="form-select" required>
            <option value="">-- Pilih Role --</option>
            <option value="santri" {{ old('role') == 'santri' ? 'selected' : '' }}>Santri</option>
            <option value="ustad" {{ old('role') == 'ustad' ? 'selected' : '' }}>Ustad</option>
        </select>
        @error('role')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
