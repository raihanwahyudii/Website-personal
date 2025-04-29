@extends('layouts.app')

@section('content')
    <div class="container animate__animated animate__fadeInUp mt-5">
        <div class="card shadow-lg">
            <div class="card-body">
                <h1 class="card-title text-center mb-4 animate__animated animate__rubberBand">
                    📋 {{ $meeting->title }}
                </h1>

                <table class="table table-striped table-bordered animate__animated animate__fadeIn animate__delay-1s">
                    <tr>
                        <th>📅 Tanggal</th>
                        <td>{{ $meeting->date->format('d-m-Y') }}</td>
                    </tr>
                    <tr>
                        <th>📍 Lokasi</th>
                        <td>{{ $meeting->location }}</td>
                    </tr>
                    <tr>
                        <th>👤 Pemimpin</th>
                        <td>{{ $meeting->participants }}</td>
                    </tr>
                    <tr>
                        <th>🗓️ Agenda</th>
                        <td>{{ $meeting->agenda }}</td>
                    </tr>
                    <tr>
                        <th>📝 Catatan</th>
                        <td>{{ $meeting->notes ?? 'Tidak ada catatan' }}</td>
                    </tr>
                </table>

                <div class="text-end mt-4">
                    <a href="{{ route('meetings.index') }}"
                        class="btn btn-secondary animate__animated animate__fadeInRight animate__delay-2s">
                        ⬅️ Kembali ke Daftar Rapat
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
