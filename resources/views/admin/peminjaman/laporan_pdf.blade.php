    <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Peminjaman</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #222;
            margin: 30px;
        }

        .header {
            text-align: center;
            margin-bottom: 25px;
        }

        .header h2 {
            margin: 0;
            font-size: 20px;
        }

        .header p {
            margin: 4px 0 0;
            font-size: 12px;
            color: #666;
        }

        .box {
            border: 1px solid #ccc;
            padding: 18px;
            border-radius: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 8px 4px;
            vertical-align: top;
        }

        .label {
            width: 180px;
            font-weight: bold;
        }

        .footer {
            margin-top: 30px;
            font-size: 11px;
            color: #666;
            text-align: right;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>Laporan Peminjaman Buku</h2>
        <p>Data detail peminjaman perpustakaan</p>
    </div>

    <div class="box">
        <table>
            <tr>
                <td class="label">Nama Peminjam</td>
                <td>: {{ $pinjam->user->nama_lengkap }}</td>
            </tr>
            <tr>
                <td class="label">Alamat Peminjam</td>
                <td>: {{ $pinjam->user->alamat }}</td>
            </tr>
            <tr>
                <td class="label">Judul Buku</td>
                <td>: {{ $pinjam->buku->judul }}</td>
            </tr>
            <tr>
                <td class="label">Kode Buku</td>
                <td>: {{ $pinjam->buku->kode_buku }}</td>
            </tr>
            <tr>
                <td class="label">Tanggal Peminjaman</td>
                <td>: {{ \Carbon\Carbon::parse($pinjam->tanggal_peminjaman)->format('d M Y') }}</td>
            </tr>
            <tr>
                <td class="label">Tanggal Pengembalian</td>
                <td>: {{ \Carbon\Carbon::parse($pinjam->tanggal_pengembalian)->format('d M Y') }}</td>
            </tr>
            <tr>
                <td class="label">Status</td>
                <td>: {{ ucfirst($pinjam->status) }}</td>
            </tr>
        </table>
    </div>

    <div class="footer">
        Dicetak pada {{ now()->format('d M Y') }}
    </div>
</body>
</html>