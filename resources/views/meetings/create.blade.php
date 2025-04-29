@extends('layouts.app')

@section('content')
    <div class="container animate__animated animate__fadeInDown mb-4 mt-4">
        <h1 class="animate__animated animate__fadeInLeft">{{ $title }}</h1>

        <form action="{{ route('meetings.store') }}" method="POST"
            class="animate__animated animate__zoomIn animate__delay-1s">
            @csrf
            <div class="mb-3 animate__animated animate__bounceIn animate__delay-1s">
                <label for="title" class="form-label">Judul Rapat</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="mb-3 animate__animated animate__bounceIn animate__delay-2s">
                <label for="date" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>

            <div class="mb-3 animate__animated animate__bounceIn animate__delay-3s">
                <label for="location" class="form-label">Lokasi</label>
                <input type="text" class="form-control" id="location" name="location" required>
            </div>

            <div class="mb-3 animate__animated animate__bounceIn animate__delay-4s">
                <label for="participants" class="form-label">Peserta</label>
                <textarea class="form-control" id="participants" name="participants" rows="3" required></textarea>
            </div>

            <div class="mb-3 animate__animated animate__bounceIn animate__delay-5s">
                <label for="agenda" class="form-label">Agenda</label>
                <textarea class="form-control" id="agenda" name="agenda" rows="3" required></textarea>
            </div>

            <div class="mb-3 animate__animated animate__bounceIn animate__delay-6s">
                <label for="notes" class="form-label">Catatan (Opsional)</label>
                <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary animate__animated animate__pulse animate__infinite">Simpan
                Rapat</button>
        </form>

        <div class="text-end mt-3">
            <a href="{{ route('meetings.index') }}"
                class="btn btn-secondary animate__animated animate__fadeInRight animate__delay-2s">
                ⬅️ Kembali
            </a>
        </div>
    </div>
@endsection
