@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow rounded-4">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">📘 Data Setoran Hafalan</h4>
            <a href="{{ route('setoran.create') }}" class="btn btn-light btn-sm">
                <i class="bi bi-plus-circle"></i> Tambah Setoran
            </a>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Nama Santri</th>
                            <th>Tanggal</th>
                            <th>Hafalan</th>
                            <th style="width: 200px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($setorans as $setoran)
                        <tr>
                            <td>{{ $setoran->user->name ?? 'Tidak diketahui' }}</td>
                            <td>{{ \Carbon\Carbon::parse($setoran->tanggal)->format('d M Y') }}</td>
                            <td>{{ $setoran->hafalan }}</td>
                            <td>
                                <a href="{{ route('setoran.show', $setoran->id) }}" class="btn btn-sm btn-info me-1">
                                    <i class="bi bi-eye"></i> Detail
                                </a>
                                <a href="{{ route('setoran.edit', $setoran->id) }}" class="btn btn-sm btn-warning me-1">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <form action="{{ route('setoran.destroy', $setoran->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin hapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">Belum ada data setoran hafalan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
