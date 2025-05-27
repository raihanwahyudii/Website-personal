@extends('layouts.app')

@section('content')
<style>
    /* Style form */
    form {
        max-width: 500px;
        margin: 20px auto;
        font-family: Arial, sans-serif;
        color: #333;
    }

    label {
        display: block;
        margin-bottom: 6px;
        font-weight: 600;
        font-size: 16px;
    }

    input, select, textarea {
        width: 100%;
        box-sizing: border-box;
        border: 2px solid #333; /* garis border tebal */
        border-radius: 5px;
        padding: 10px 12px;
        font-size: 16px;
        margin-bottom: 16px;
        transition: border-color 0.3s ease;
    }

    input:focus, select:focus, textarea:focus {
        border-color: #0056b3;
        outline: none;
        box-shadow: 0 0 5px rgba(0,86,179,0.5);
    }

    button {
        background-color: #0056b3;
        color: white;
        padding: 12px 20px;
        font-size: 18px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #004494;
    }

    .error-message {
        color: red;
        font-size: 14px;
        margin-top: -12px;
        margin-bottom: 12px;
        display: none;
    }
</style>

<h1>Tambah Setoran Hafalan</h1>

<form id="setoranForm" action="{{ route('setoran.store') }}" method="POST" novalidate>
    @csrf

    <label for="user_id">Santri:</label>
    <select name="user_id" id="user_id" required>
        <option value="" disabled selected>-- Pilih Santri --</option>
        @foreach ($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
        @endforeach
    </select>
    <div class="error-message" id="error-user">Silakan pilih santri.</div>

    <label for="penerima_id">Penerima (Ustad):</label>
    <select name="penerima_id" id="penerima_id" required>
        <option value="" disabled selected>-- Pilih Ustadz --</option>
        @foreach ($ustadzList as $ustadz)
            <option value="{{ $ustadz->id }}">{{ $ustadz->name }}</option>
        @endforeach
    </select>
    <div class="error-message" id="error-penerima">Silakan pilih ustadz penerima.</div>

    <label for="tanggal">Tanggal:</label>
    <input type="date" name="tanggal" id="tanggal" required>
    <div class="error-message" id="error-tanggal">Tanggal wajib diisi.</div>

    <label for="surat">Surat:</label>
    <select name="surat" id="surat" required>
        <option value="" disabled selected>-- Pilih Surat --</option>
        @foreach ($suratList as $surat)
            <option value="{{ $surat['number'] }}">{{ $surat['name'] }} - {{ $surat['name_translated'] }}</option>
        @endforeach
    </select>
    <div class="error-message" id="error-surat">Silakan pilih surat.</div>

    <label for="ayat_start">Ayat Mulai:</label>
    <input type="number" name="ayat_start" id="ayat_start" min="1" required>
    <div class="error-message" id="error-ayat_start">Ayat mulai wajib diisi dan minimal 1.</div>

    <label for="ayat_end">Ayat Akhir:</label>
    <input type="number" name="ayat_end" id="ayat_end" min="1" required>
    <div class="error-message" id="error-ayat_end">Ayat akhir wajib diisi dan tidak boleh kurang dari ayat mulai.</div>

    <label for="catatan">Catatan:</label>
    <textarea name="catatan" id="catatan"></textarea>

    <button type="submit">Simpan Setoran</button>
</form>

<script>
    document.getElementById('setoranForm').addEventListener('submit', function(e) {
        let isValid = true;

        // Reset semua error message
        document.querySelectorAll('.error-message').forEach(el => el.style.display = 'none');

        // Validasi Santri
        const user = document.getElementById('user_id');
        if (!user.value) {
            document.getElementById('error-user').style.display = 'block';
            isValid = false;
        }

        // Validasi Ustadz
        const penerima = document.getElementById('penerima_id');
        if (!penerima.value) {
            document.getElementById('error-penerima').style.display = 'block';
            isValid = false;
        }

        // Validasi Tanggal
        const tanggal = document.getElementById('tanggal');
        if (!tanggal.value) {
            document.getElementById('error-tanggal').style.display = 'block';
            isValid = false;
        }

        // Validasi Surat
        const surat = document.getElementById('surat');
        if (!surat.value) {
            document.getElementById('error-surat').style.display = 'block';
            isValid = false;
        }

        // Validasi Ayat Mulai
        const ayatStart = document.getElementById('ayat_start');
        if (!ayatStart.value || parseInt(ayatStart.value) < 1) {
            document.getElementById('error-ayat_start').style.display = 'block';
            isValid = false;
        }

        // Validasi Ayat Akhir
        const ayatEnd = document.getElementById('ayat_end');
        if (!ayatEnd.value || parseInt(ayatEnd.value) < parseInt(ayatStart.value)) {
            document.getElementById('error-ayat_end').style.display = 'block';
            isValid = false;
        }

        if (!isValid) {
            e.preventDefault();
        }
    });
</script>
@endsection
