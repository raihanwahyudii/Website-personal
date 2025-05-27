@extends('layouts.app')

@section('title', 'Tambah Hafalan')

@section('content')
@php
    
    $jumlahAyatPerSurat = [
        'Al-Fatihah' => 7,
        'Al-Baqarah' => 286,
        'Ali Imran' => 200,
        'An-Nisa' => 176,
        'Al-Maidah' => 120,
        // Tambah surat lain jika perlu
    ];
@endphp

<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Tambah Hafalan</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('hafalan.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="surat" class="block font-medium text-gray-700">Nama Surat</label>
            <select name="surat" id="surat" onchange="updateAyat()" required
                class="w-full p-2 border border-gray-300 rounded">
                @foreach ($jumlahAyatPerSurat as $nama => $jumlah)
                    <option value="{{ $nama }}" {{ old('surat') == $nama ? 'selected' : '' }}>
                        {{ $nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="ayat" class="block font-medium text-gray-700">Ayat</label>
            <select name="ayat" id="ayat" class="w-full p-2 border border-gray-300 rounded" required>
                {{-- Diisi dengan JavaScript --}}
            </select>
        </div>

        <div>
            <label for="tanggal_setoran" class="block font-medium text-gray-700">Tanggal Setoran</label>
            <input type="date" name="tanggal_setoran" id="tanggal_setoran" value="{{ old('tanggal_setoran') }}"
                class="w-full p-2 border border-gray-300 rounded" required>
        </div>

        <div>
            <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Simpan</button>
            <a href="{{ route('hafalan.index') }}" class="ml-2 text-blue-600 hover:underline">Kembali</a>
        </div>
    </form>
</div>

{{-- JavaScript --}}
<script>
    const jumlahAyat = @json($jumlahAyatPerSurat);

    function updateAyat() {
        const surat = document.getElementById('surat').value;
        const ayatSelect = document.getElementById('ayat');
        ayatSelect.innerHTML = '';

        const total = jumlahAyat[surat] ?? 1;
        for (let i = 1; i <= total; i++) {
            const option = document.createElement('option');
            option.value = i;
            option.text = i;
            ayatSelect.appendChild(option);
        }

       
        const oldAyat = "{{ old('ayat') }}";
        if (oldAyat) {
            ayatSelect.value = oldAyat;
        }
    }


    window.addEventListener('DOMContentLoaded', updateAyat);
</script>
@endsection
