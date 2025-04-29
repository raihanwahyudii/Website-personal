<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} - {{ $meeting->title }}</title>
</head>
<body>
    <h1>{{ $meeting->title }}</h1>
    <p><strong>Tanggal:</strong> {{ $meeting->date->format('d-m-Y') }}</p>
    <p><strong>Lokasi:</strong> {{ $meeting->location }}</p>
    <p><strong>Pemimpin:</strong> {{ $meeting->participants }}</p>
    <p><strong>Agenda:</strong> {{ $meeting->agenda }}</p>
    <p><strong>Catatan:</strong> {{ $meeting->notes ?? 'Tidak ada catatan' }}</p>
</body>
</html>
