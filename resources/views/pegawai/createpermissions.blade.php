@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Buat Undangan Rapat Kantor</h2>

    <form action="{{ route('permissions.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="date" class="form-label">Tanggal Rapat</label>
            <input type="date" name="date" id="date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="time" class="form-label">Waktu Rapat</label>
            <input type="time" name="time" id="time" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Tempat Rapat</label>
            <input type="text" name="location" id="location" class="form-control" placeholder="Contoh: Ruang Rapat Lantai 2" required>
        </div>

        <div class="mb-3">
            <label for="topic" class="form-label">Topik Rapat</label>
            <textarea name="topic" id="topic" class="form-control" rows="3" required placeholder="Contoh: Evaluasi Kinerja Bulanan"></textarea>
        </div>

        <div class="mb-3">
            <label for="participants" class="form-label">Peserta Rapat</label>
            <textarea name="participants" id="participants" class="form-control" rows="3" placeholder="Contoh: Seluruh Tim Marketing, Manajer HR, dll" required></textarea>
        </div>

        <div class="mb-3">
            <label for="attachment" class="form-label">Lampiran Tambahan (opsional)</label>
            <input type="file" name="attachment" id="attachment" class="form-control">
        </div>

        <div class="mb-3">
            <label for="note" class="form-label">Catatan (opsional)</label>
            <textarea name="note" id="note" class="form-control" rows="2"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Kirim Undangan</button>
    </form>
</div>
@endsection
