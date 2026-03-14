<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Pengembalian Buku</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 5px; text-align: left; }
        th { background: #f0f0f0; }
    </style>
</head>
<body>
    <h2>Laporan Pengembalian Buku Perpustakaan</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Peminjam</th>
                <th>Judul Buku</th>
                <th>Kode Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pengembalian as $index => $pinjam)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $pinjam->user->name }}</td>
                <td>{{ $pinjam->buku->judul }}</td>
                <td>{{ $pinjam->buku->kode_buku }}</td>
                <td>{{ \Carbon\Carbon::parse($pinjam->tanggal_peminjaman)->format('d-m-Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($pinjam->tanggal_pengembalian)->format('d-m-Y') }}</td>
                <td>{{ ucfirst($pinjam->status) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>