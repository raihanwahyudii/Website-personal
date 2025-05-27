@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Hafalan</h2>

    <form action="{{ route('hafalan.update', $hafalan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="surah" class="form-label">Surah</label>
            <input type="text" name="surah" id="surah" class="form-control" value="{{ old('surah', $hafalan->surah) }}" required>
            @error('surah')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="ayat" class="form-label">Ayat</label>
            <input type="text" name="ayat" id="ayat" class="form-control" value="{{ old('ayat', $hafalan->ayat) }}" required>
            @error('ayat')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ old('tanggal', $hafalan->tanggal->format('Y-m-d')) }}" required>
            @error('tanggal')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('hafalan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
