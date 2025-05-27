@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Hafalan Saya</h1>

    <a href="{{ route('santri.download') }}" class="btn btn-success mb-3">Download PDF</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Surat</th>
                <th>Ayat</th>
                <th>Catatan</th>
                <th>Hafalan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($setorans as $setoran)
            <tr>
                <td>{{ $setoran->tanggal }}</td>
                <td>{{ $setoran->surat }}</td>
                <td>{{ $setoran->ayat_start }} - {{ $setoran->ayat_end }}</td>
                <td>{{ $setoran->catatan }}</td>
                <td>{{ $setoran->hafalan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
