@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Dashboard Admin</h1>
    <p class="lead">Selamat datang, <strong>{{ auth()->user()->name }}</strong>!</p>

    <div class="mb-4 d-flex gap-3">
        <a href="{{ route('admin.users.index', ['role' => 'santri']) }}" class="btn btn-primary flex-fill">
            Kelola Santri
        </a>
        <a href="{{ route('admin.users.index', ['role' => 'ustad']) }}" class="btn btn-secondary flex-fill">
            Kelola Ustadz
        </a>
    </div>

    <div class="row g-4">
        <div class="col-md-6">
            <div class="card text-white bg-primary shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Santri</h5>
                    <p class="display-4 mb-0">{{ $jumlahSantri ?? '7' }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-white bg-secondary shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Ustadz</h5>
                    <p class="display-4 mb-0">{{ $jumlahUstadz ?? '100' }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
