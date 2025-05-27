@extends('layouts.app')

@section('content')
<h1>Daftar Setoran Saya</h1>

<p><strong>Total Setoran:</strong> {{ $totalSetoran }}</p>

<a href="{{ route('santri.setoran.downloadPdf') }}" class="btn btn-success mb-3">Download PDF</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul Setoran</th>
            <th>Tanggal Setoran</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($setorans as $index => $setoran)
        <tr>
            <td>{{ $setorans->firstItem() + $index }}</td>
            <td>{{ $setoran->judul }}</td>
            <td>{{ $setoran->created_at->format('d-m-Y') }}</td>
            <td>{{ $setoran->status }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $setorans->links() }}

@endsection
