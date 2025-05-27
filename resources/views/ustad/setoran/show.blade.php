@extends('layouts.app')

@section('title', 'Detail Setoran')

@section('content')
<div class="container">
    <h1 class="mb-4"><i class="bi bi-journal-text me-2"></i>Detail Setoran Hafalan</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-borderless table-hover">
                <tr>
                    <th width="30%">👤 Santri</th>
                    <td>{{ $setoran->user->name ?? '-' }}</td>
                </tr>
                <tr>
                    <th>👨‍🏫 Penerima (Ustadz)</th>
                    <td>{{ $setoran->penerima->name ?? '-' }}</td>
                </tr>
                <tr>
                    <th>📅 Tanggal Setoran</th>
                    <td>{{ \Carbon\Carbon::parse($setoran->tanggal)->translatedFormat('d F Y') }}</td>
                </tr>
                <tr>
                    <th>📖 Surat</th>
                    <td>{{ $setoran->surat ?? '-' }}</td>
                </tr>
                <tr>
                    <th>🔢 Ayat Mulai</th>
                    <td>{{ $setoran->ayat_start }}</td>
                </tr>
                <tr>
                    <th>🔢 Ayat Akhir</th>
                    <td>{{ $setoran->ayat_end }}</td>
                </tr>
                <tr>
                    <th>📝 Catatan</th>
                    <td>{{ $setoran->catatan ?? '-' }}</td>
                </tr>
                <tr>
                    <th>📚 Hafalan</th>
                    <td>{{ $setoran->hafalan ?? '-' }}</td>
                </tr>
            </table>
        </div>
    </div>

    <div class="mt-4 d-flex gap-2">
        <a href="{{ route('setoran.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
        <a href="{{ route('setoran.edit', $setoran->id) }}" class="btn btn-warning">
            <i class="bi bi-pencil-square"></i> Edit
        </a>
    </div>
</div>
@endsection
