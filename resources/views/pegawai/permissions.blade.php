@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between mb-3">
        <h2>Daftar Surat Undangan</h2>
        <a href="{{ route('permissions.create') }}" class="btn btn-primary">+ Ajukan Undangan Baru</a>
    </div>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Tempat</th>
                <th>Topik Rapat</th>
                <th>partisipasi</th>
                <th>file tambahan</th>
                <th>catatan</th>
                <th>Status</th>
                <th>Disetujui Oleh</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($permissions as $permission)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ \Carbon\Carbon::parse($permission->date)->translatedFormat('d F Y') }}</td>
                    <td>{{ $permission->time }}</td>
                    <td>{{ $permission->location }}</td>
                    <td>{{ $permission->topic }}</td>
                    <td>{{ $permission->participants }}</td>
                    <td>{{ $permission->attachment }}</td>
                    <td>{{ $permission->note }}</td>
                    <td>
                        @if($permission->status == 'approved')
                            <span class="badge bg-success">Disetujui</span>
                        @elseif($permission->status == 'rejected')
                            <span class="badge bg-danger">Ditolak</span>
                        @else
                            <span class="badge bg-warning">Menunggu</span>
                        @endif
                    </td>
                    <td>{{ $permission->approver->name ?? '-' }}</td>
                    <td>
                        <a href="{{ route('permissions.export', $permission->id) }}" class="btn btn-sm btn-outline-secondary">Unduh Surat Rapat</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">Belum ada data Surat Undangan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
