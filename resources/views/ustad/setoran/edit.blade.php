@extends('layouts.app')

@section('title', 'Edit Setoran')

@section('content')
<div class="container">
    <h1 class="mb-4"><i class="bi bi-pencil-square me-2"></i>Edit Setoran Hafalan</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('setoran.update', $setoran->id) }}" method="POST" class="needs-validation" novalidate>
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="user_id" class="form-label">👤 Santri</label>
            <select name="user_id" id="user_id" class="form-select" required>
                <option value="">-- Pilih Santri --</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $setoran->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
            <div class="invalid-feedback">Pilih salah satu santri.</div>
        </div>

        <div class="mb-3">
            <label for="penerima_id" class="form-label">👨‍🏫 Penerima Setoran (Ustadz)</label>
            <select name="penerima_id" id="penerima_id" class="form-select" required>
                <option value="">-- Pilih Ustadz --</option>
                @foreach ($ustadzList as $ustadz)
                    <option value="{{ $ustadz->id }}" {{ $setoran->penerima_id == $ustadz->id ? 'selected' : '' }}>
                        {{ $ustadz->name }}
                    </option>
                @endforeach
            </select>
            <div class="invalid-feedback">Pilih salah satu ustadz penerima.</div>
        </div>

        <div class="mb-3">
            <label for="tanggal" class="form-label">📅 Tanggal Setoran</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ $setoran->tanggal }}" required>
            <div class="invalid-feedback">Tanggal wajib diisi.</div>
        </div>

        <div class="mb-3">
            <label for="surat" class="form-label">📖 Nama Surat</label>
            <select name="surat" id="surat" class="form-select" required>
                <option value="">-- Pilih Surat --</option>
                @foreach ($suratList as $surat)
                    <option value="{{ $surat['number'] }}" {{ $setoran->surat == $surat['number'] ? 'selected' : '' }}>
                        {{ $surat['number'] }} - {{ $surat['name_translated'] }} ({{ $surat['name'] }})
                    </option>
                @endforeach
            </select>
            <div class="invalid-feedback">Pilih nama surat terlebih dahulu.</div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="ayat_start" class="form-label">🔢 Ayat Mulai</label>
                <input type="number" name="ayat_start" id="ayat_start" class="form-control" min="1" value="{{ $setoran->ayat_start }}" required>
                <div class="invalid-feedback">Ayat mulai minimal 1 dan wajib diisi.</div>
            </div>
            <div class="col-md-6">
                <label for="ayat_end" class="form-label">🔢 Ayat Akhir</label>
                <input type="number" name="ayat_end" id="ayat_end" class="form-control" min="1" value="{{ $setoran->ayat_end }}" required>
                <div class="invalid-feedback">Ayat akhir wajib diisi dan tidak boleh lebih kecil dari ayat mulai.</div>
            </div>
        </div>

        <div class="mb-3">
            <label for="catatan" class="form-label">📝 Catatan</label>
            <textarea name="catatan" id="catatan" class="form-control" rows="3" placeholder="Tambahkan catatan jika perlu">{{ $setoran->catatan }}</textarea>
        </div>

        <div class="mb-3">
            <label for="hafalan" class="form-label">📚 Hafalan</label>
            <textarea name="hafalan" id="hafalan" class="form-control" rows="3" placeholder="Contoh: QS Al-Baqarah ayat 1–5">{{ $setoran->hafalan }}</textarea>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('setoran.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left-circle"></i> Batal
            </a>
            <button type="submit" class="btn btn-success">
                <i class="bi bi-save"></i> Simpan Perubahan
            </button>
        </div>
    </form>
</div>

{{-- Bootstrap validation --}}
<script>
    (function () {
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
