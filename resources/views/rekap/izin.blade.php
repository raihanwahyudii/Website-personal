<!DOCTYPE html>
<html>
<head>
    <title>Rekap Izin</title>
    <style>
        table, th, td { border: 1px solid black; border-collapse: collapse; padding: 8px; }
    </style>
</head>
<body>
    <h2>Rekap Izin</h2>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Keperluan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($izin as $i)
            <tr>
                <td>{{ $i->user->name }}</td>
                <td>{{ $i->tanggal }}</td>
                <td>{{ $i->keperluan }}</td>
                <td>{{ $i->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

