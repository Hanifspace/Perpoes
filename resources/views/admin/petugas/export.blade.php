<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Daftar Petugas</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 11px; }
        h2 { margin: 0 0 10px 0; }
        .meta { margin-bottom: 10px; color: #555; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #999; padding: 6px; vertical-align: top; }
        th { background: #f2f2f2; text-align: left; }
    </style>
</head>
<body>
    <h2>Daftar Petugas</h2>
    <div class="meta">
        @if(!empty($q))
            Filter pencarian: "{{ $q }}"
        @endif
    </div>

    <table>
        <thead>
            <tr>
                <th style="width:40px;">No</th>
                <th>Nama Lengkap</th>
                <th>Username</th>
                <th>Email</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @forelse($nama as $i => $user)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $user->nama_lengkap }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->alamat }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align:center;">Belum ada data petugas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>