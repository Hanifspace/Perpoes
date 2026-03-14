<!DOCTYPE html>
<html>
<head>
    <title>Data Kategori</title>
    <style>
        body {
            font-family: sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>
<body>

<h2>Data Kategori</h2>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kategori</th>
        </tr>
    </thead>
    <tbody>
        @foreach($kategoris as $kategori)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $kategori->nama_kategori }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>