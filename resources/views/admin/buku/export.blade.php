<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Daftar Buku</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
      font-family: DejaVu Sans, sans-serif;
      font-size: 11px;
      color: #1e293b;
      background: #ffffff;
      padding: 32px;
    }

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
    .stok-ada { color: #16a34a; font-weight: bold; }
    .stok-habis { color: #dc2626; font-weight: bold; }
    .empty td {
      text-align: center;
      color: #94a3b8;
      padding: 20px;
      font-style: italic;
    }

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
        <h1>Daftar Buku</h1>
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
        <th style="width:70px;">Kode</th>
        <th>Judul</th>
        <th style="width:80px;">Kategori</th>
        <th style="width:90px;">Penulis</th>
        <th style="width:90px;">Penerbit</th>
        <th style="width:40px;">Tahun</th>
        <th style="width:36px; text-align:center;">Stok</th>
      </tr>
    </thead>
    <tbody>
      @forelse($bukus as $buku)
        <tr>
          <td class="no">{{ $loop->iteration }}</td>
          <td style="font-family: monospace;">{{ $buku->kode_buku }}</td>
          <td>{{ $buku->judul }}</td>
          <td>{{ $buku->kategori?->nama_kategori ?? '-' }}</td>
          <td>{{ $buku->penulis }}</td>
          <td>{{ $buku->penerbit }}</td>
          <td style="text-align:center;">{{ $buku->tahun_terbit }}</td>
          <td style="text-align:center;" class="{{ $buku->stok > 0 ? 'stok-ada' : 'stok-habis' }}">
            {{ $buku->stok }}
          </td>
        </tr>
      @empty
        <tr class="empty">
          <td colspan="8">Belum ada data buku.</td>
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