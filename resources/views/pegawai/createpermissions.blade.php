@extends('layouts.app')

@section('content')
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <div class="container py-5 animate__animated animate__fadeIn">
        <div class="card shadow-lg border-0">
            <div class="card-body">
                <h3 class="card-title text-center text-primary fw-bold mb-4">
                    <i class="bi bi-calendar-plus me-2"></i>Buat Undangan Rapat Kantor
                </h3>

                <form action="{{ route('permissions.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="date" class="form-label">Tanggal Rapat</label>
                            <input type="date" name="date" id="date" class="form-control" required
                                min="{{ date('Y-m-d') }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="time" class="form-label">Waktu Rapat</label>
                            <input type="time" name="time" id="time" class="form-control" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="location" class="form-label">Tempat Rapat</label>
                        <input type="text" name="location" id="location" class="form-control"
                            placeholder="Contoh: Ruang Rapat Lantai 2" required>
                    </div>

                    <div class="mb-3">
                        <label for="topic" class="form-label">Topik Rapat</label>
                        <textarea name="topic" id="topic" class="form-control" rows="3"
                            placeholder="Contoh: Evaluasi Kinerja Bulanan" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="participants" class="form-label">Peserta Rapat</label>
                        <textarea name="participants" id="participants" class="form-control" rows="3"
                            placeholder="Contoh: Seluruh Tim Marketing, Manajer HR, dll" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="attachment" class="form-label">Lampiran Tambahan (opsional)</label>
                        <input type="file" name="attachment" id="attachment" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="note" class="form-label">Catatan (opsional)</label>
                        <textarea name="note" id="note" class="form-control" rows="2"
                            placeholder="Contoh: Siapkan data penjualan Q1"></textarea>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg shadow-sm">
                            <i class="bi bi-send-check me-1"></i> Kirim Undangan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
@endsection
