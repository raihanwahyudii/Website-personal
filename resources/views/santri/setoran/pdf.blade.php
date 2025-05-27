<!DOCTYPE html>
<html>
<head>
    <title>Hafalan Santri</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 5px; text-align: left; }
    </style>
</head>
<body>
    <h2>Data Hafalan Santri</h2>
    <table>
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
</body>
</html>
