@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="bg-white rounded-4 shadow-lg p-5 animate__animated animate__swing">
            {{-- Welcome --}}
            <h1 class="text-3xl font-semibold text-dark mb-3">Halo, Admin!</h1>
            <p class="text-muted">Selamat datang kembali di dashboard admin.</p>

            {{-- Statistik Ringkas --}}
            <div class="row row-cols-1 row-cols-md-3 g-4 mt-4">
                <div class="col">
                    <div class="card border-0 bg-primary text-white rounded-3 p-4 shadow">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="card-title fs-5">Total Pengguna</h4>
                                <p class="fs-3 fw-bold">145</p>
                            </div>
                            <i class="fas fa-users fs-2"></i>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card border-0 bg-success text-white rounded-3 p-4 shadow">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="card-title fs-5">Total Dokumen</h4>
                                <p class="fs-3 fw-bold">320</p>
                            </div>
                            <i class="fas fa-file-alt fs-2"></i>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card border-0 bg-warning text-white rounded-3 p-4 shadow">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="card-title fs-5">Notifikasi Terkirim</h4>
                                <p class="fs-3 fw-bold">210</p>
                            </div>
                            <i class="fas fa-bell fs-2"></i>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Chart --}}
            <div class="mt-5 bg-white p-4 rounded-3 shadow">
                <h3 class="text-xl font-semibold mb-3 text-dark">Statistik Aktivitas</h3>
                <canvas id="adminChart" height="100"></canvas>
            </div>

            {{-- Tombol Aksi --}}
            <div class="row row-cols-1 row-cols-md-3 g-4 mt-5">
                <div class="col">
                    <div class="card p-3 text-center shadow-lg rounded-3 hover-shadow-lg transition">
                        <div class="card-body">
                            <h3 class="card-title">Pengguna</h3>
                            <i class="fas fa-users text-primary fs-2 mb-3"></i>
                            <p class="card-text">Lihat dan kelola data pengguna.</p>
                            <a href="#" class="btn btn-primary btn-sm">Kelola</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card p-3 text-center shadow-lg rounded-3 hover-shadow-lg transition">
                        <div class="card-body">
                            <h3 class="card-title">Dokumen</h3>
                            <i class="fas fa-file-alt text-success fs-2 mb-3"></i>
                            <p class="card-text">Tambah atau hapus dokumen penting.</p>
                            <a href="#" class="btn btn-success btn-sm">Kelola</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card p-3 text-center shadow-lg rounded-3 hover-shadow-lg transition">
                        <div class="card-body">
                            <h3 class="card-title">Pengaturan</h3>
                            <i class="fas fa-cogs text-warning fs-2 mb-3"></i>
                            <p class="card-text">Ubah konfigurasi sistem dan preferensi.</p>
                            <a href="#" class="btn btn-warning btn-sm">Kelola</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{-- Chart.js CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('adminChart').getContext('2d');
        const adminChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
                datasets: [{
                    label: 'Pengunjung Mingguan',
                    data: [12, 19, 3, 5, 2, 3, 7],
                    backgroundColor: 'rgba(59, 130, 246, 0.2)',
                    borderColor: 'rgba(59, 130, 246, 1)',
                    borderWidth: 2,
                    tension: 0.4
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    {{-- SweetAlert Welcome --}}
    <script>
        Swal.fire({
            title: 'Selamat Datang Admin!',
            text: 'Semoga harimu menyenangkan 😄',
            icon: 'success',
            confirmButtonText: 'Siap!',
            confirmButtonColor: '#2563eb'
        })
    </script>
@endpush
