<!-- resources/views/rapat/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detail Rapat</h1>
        <table class="table">
            <tr>
                <th>Judul</th>
                <td>{{ $rapat->judul }}</td>
            </tr>
            <tr>
                <th>Deskripsi</th>
                <td>{{ $rapat->deskripsi }}</td>
            </tr>
            <tr>
                <th>Tanggal</th>
                <td>{{ $rapat->tanggal }}</td>
            </tr>
        </table>

        <!-- Jika sudah ada arsip PDF -->
        @if ($rapat->arsip)
            <a href="{{ route('rapat.download', $rapat->arsip->id) }}" class="btn btn-warning">Unduh Arsip PDF</a>
        @else
            <p>Arsip PDF belum tersedia.</p>
        @endif
    </div>
@endsection
