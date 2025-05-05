@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Daftar Pengajuan Izin Pegawai</h3>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pegawai</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Tempat</th>
                <th>Topik Rapat</th>
                <th>partisipasi</th>
                <th>file tambahan</th>
                <th>catatan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($permissions as $permission)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $permission->user->name }}</td>
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
                    <td>
                        @if($permission->status == 'pending')
                            <form action="{{ route('atasan.permissions.approve', $permission->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm btn-success" onclick="return confirm('Setujui izin ini?')">Setujui</button>
                            </form>

                            <form action="{{ route('atasan.permissions.reject', $permission->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tolak izin ini?')">Tolak</button>
                            </form>
                        @else
                            <span>-</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Belum ada pengajuan izin.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $permissions->links() }}
    </div>
</div>
@endsection
