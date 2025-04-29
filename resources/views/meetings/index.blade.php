@extends('layouts.app')

@section('content')
    <div class="container mt-5 animate__animated animate__fadeInUp">

        <h1 class="display-4 text-center mb-4 animate__animated animate__bounceInDown">📅 Daftar Rapat</h1>

        <div class="row mb-4">
            <div class="col-md-4">
                <div class="alert alert-info shadow-sm animate__animated animate__fadeInLeft">
                    <h5 class="mb-1"><strong>📚 Total Rapat:</strong></h5>
                    <p class="mb-0">{{ $totalMeetings }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="alert alert-warning shadow-sm animate__animated animate__fadeInDown">
                    <h5 class="mb-1"><strong>🆕 Rapat Terbaru:</strong></h5>
                    <p class="mb-0">
                        {{ $latestMeeting ? $latestMeeting->title : 'Tidak ada rapat.' }}
                        @if ($latestMeeting)
                            <br><small>{{ $latestMeeting->date->format('d-m-Y') }}</small>
                        @endif
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="alert alert-success shadow-sm animate__animated animate__fadeInRight">
                    <h5 class="mb-1"><strong>🚀 Rapat Mendatang:</strong></h5>
                    <p class="mb-0">
                        {{ $upcomingMeeting ? $upcomingMeeting->title : 'Tidak ada rapat mendatang.' }}
                        @if ($upcomingMeeting)
                            <br><small>{{ $upcomingMeeting->date->format('d-m-Y') }}</small>
                        @endif
                    </p>
                </div>
            </div>
        </div>

        <div class="text-end mb-3">
            <a href="{{ route('meetings.create') }}"
                class="btn btn-primary rounded-pill shadow-sm animate__animated animate__pulse animate__infinite">
                ➕ Buat Rapat Baru
            </a>
        </div>

        <div class="table-responsive animate__animated animate__fadeInUp animate__delay-1s">
            <table class="table table-hover table-striped table-bordered shadow-sm align-middle">
                <thead class="table-light">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Judul</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($meetings as $rapat)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $rapat->title }}</td>
                            <td>{{ $rapat->date->format('d-m-Y') }}</td>
                            <td class="text-center">
                                <div class="d-inline-flex gap-2">
                                    <a href="{{ route('meetings.pdf', $rapat->id) }}"
                                        class="btn btn-success btn-sm rounded-pill">
                                        📄 PDF
                                    </a>
                                    <a href="{{ route('meetings.show', $rapat->id) }}"
                                        class="btn btn-info btn-sm rounded-pill">
                                        👁️ Lihat
                                    </a>
                                    <form action="{{ route('meetings.destroy', $rapat->id) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus rapat ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm rounded-pill">
                                            🗑️ Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Belum ada rapat yang tersedia.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

<style>
    .alert h5 {
        font-weight: bold;
    }
</style>
