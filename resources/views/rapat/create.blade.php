<!-- resources/views/rapat/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Buat Rapat Baru</h1>
        <form action="{{ route('rapat.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="judul" class="form-label">Judul Rapat</label>
                <input type="text" class="form-control" id="judul" name="judul" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi Rapat</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
            </div>
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal dan Waktu</label>
                <input type="datetime-local" class="form-control" id="tanggal" name="tanggal" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Rapat</button>
        </form>
    </div>
@endsection
