<!-- resources/views/rapat/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Rapat</h1>
        <a href="{{ route('rapat.create') }}" class="btn btn-primary">Buat Rapat Baru</a>
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Judul</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rapats as $rapat)
                    <tr>
                        <td>{{ $rapat->id }}</td>
                        <td>{{ $rapat->judul }}</td>
                        <td>{{ $rapat->tanggal }}</td>
                        <td>
                            <a href="{{ route('rapat.generatePdf', $rapat->id) }}" class="btn btn-success">Unduh PDF</a>
                            <a href="{{ route('rapat.show', $rapat->id) }}" class="btn btn-info">Lihat</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
