<!DOCTYPE html>
<html>
<head>
    <title>Data Buku</title>
    <style>
        body{
            font-family: sans-serif;
            font-size: 12px;
        }

        table{
            width:100%;
            border-collapse: collapse;
        }

        table, th, td{
            border:1px solid black;
        }

        th, td{
            padding:6px;
            text-align:left;
        }

        h2{
            text-align:center;
            margin-bottom:20px;
        }
    </style>
</head>
<body>

<h2>Data Buku</h2>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tahun</th>
            <th>Stok</th>
        </tr>
    </thead>

    <tbody>
        @foreach($bukus as $buku)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $buku->kode_buku }}</td>
            <td>{{ $buku->judul }}</td>
            <td>{{ $buku->kategori?->nama_kategori }}</td>
            <td>{{ $buku->penulis }}</td>
            <td>{{ $buku->penerbit }}</td>
            <td>{{ $buku->tahun_terbit }}</td>
            <td>{{ $buku->stok }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>