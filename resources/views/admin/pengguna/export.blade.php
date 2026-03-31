<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Daftar Pengguna</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
      font-family: DejaVu Sans, sans-serif;
      font-size: 11px;
      color: #1e293b;
      background: #ffffff;
      padding: 32px;
    }

    /* Header */
    .header {
      border-bottom: 2px solid #1d4ed8;
      padding-bottom: 14px;
      margin-bottom: 20px;
    }
    .header-top {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
    }
    .header h1 {
      font-size: 18px;
      font-weight: bold;
      color: #1d4ed8;
      margin-bottom: 2px;
    }
    .header .subtitle {
      font-size: 10px;
      color: #64748b;
    }
    .header .meta-right {
      text-align: right;
      font-size: 10px;
      color: #64748b;
      line-height: 1.6;
    }

    /* Filter badge */
    .filter-info {
      background: #eff6ff;
      border: 1px solid #bfdbfe;
      border-radius: 6px;
      padding: 6px 12px;
      font-size: 10px;
      color: #1d4ed8;
      margin-bottom: 16px;
      display: inline-block;
    }

    /* Table */
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 4px;
    }
    thead tr {
      background-color: #1d4ed8;
    }
    thead th {
      color: #ffffff;
      font-size: 10px;
      font-weight: bold;
      text-align: left;
      padding: 8px 10px;
      letter-spacing: 0.05em;
      text-transform: uppercase;
    }
    tbody tr {
      border-bottom: 1px solid #e2e8f0;
    }
    tbody tr:nth-child(even) {
      background-color: #f8fafc;
    }
    tbody td {
      padding: 8px 10px;
      vertical-align: top;
      color: #334155;
      font-size: 11px;
    }
    tbody .no {
      color: #94a3b8;
      font-size: 10px;
      text-align: center;
      width: 36px;
    }
    .empty td {
      text-align: center;
      color: #94a3b8;
      padding: 20px;
      font-style: italic;
    }

    /* Footer */
    .footer {
      margin-top: 24px;
      padding-top: 12px;
      border-top: 1px solid #e2e8f0;
      font-size: 10px;
      color: #94a3b8;
      display: flex;
      justify-content: space-between;
    }
  </style>
</head>
<body>

  {{-- Header --}}
  <div class="header">
    <div class="header-top">
      <div>
        <h1>Daftar Pengguna</h1>
        <p class="subtitle">Perpoestakaan</p>
      </div>
      <div class="meta-right">
        <div>Dicetak pada</div>
        <div>{{ now()->format('d M Y') }}</div>
        
      </div>
    </div>
  </div>

  {{-- Filter --}}
  @if(!empty($q))
    <div class="filter-info">🔍 Filter pencarian: "{{ $q }}"</div>
  @endif

  {{-- Tabel --}}
  <table>
    <thead>
      <tr>
        <th style="width:36px; text-align:center;">No</th>
        <th>Nama Lengkap</th>
        <th>Username</th>
        <th>Email</th>
        <th>Alamat</th>
      </tr>
    </thead>
    <tbody>
      @forelse($nama as $i => $user)
        <tr>
          <td class="no">{{ $i + 1 }}</td>
          <td>{{ $user->nama_lengkap }}</td>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->alamat }}</td>
        </tr>
      @empty
        <tr class="empty">
          <td colspan="5">Belum ada data pengguna.</td>
        </tr>
      @endforelse
    </tbody>
  </table>

  {{-- Footer --}}
  <div class="footer">
    <span>Perpoestakaan &copy; {{ date('Y') }}</span>
    <span>Dokumen ini digenerate otomatis oleh sistem</span>
  </div>

</body>
</html>