<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Laporan Peminjaman Buku</title>
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
    .no {
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

    .badge {
      display: inline-block;
      padding: 2px 8px;
      border-radius: 20px;
      font-size: 10px;
      font-weight: bold;
    }
    .badge-dipinjam        { background: #fef3c7; color: #92400e; }
    .badge-dikembalikan    { background: #d1fae5; color: #065f46; }
    .badge-menunggu        { background: #e0e7ff; color: #3730a3; }
    .badge-menunggu_pengembalian { background: #dbeafe; color: #1e40af; }
    .badge-default         { background: #f1f5f9; color: #64748b; }

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
        <h1>Laporan Peminjaman Buku</h1>
        <p class="subtitle">Perpoestakaan</p>
      </div>
      <div class="meta-right">
        <div>Dicetak pada</div>
        <div>{{ now()->format('d M Y') }}</div>
      </div>
    </div>
  </div>

  {{-- Tabel --}}
  <table>
    <thead>
      <tr>
        <th style="width:36px; text-align:center;">No</th>
        <th style="width:100px;">Nama Peminjam</th>
        <th>Judul Buku</th>
        <th style="width:70px;">Kode Buku</th>
        <th style="width:75px;">Tgl Pinjam</th>
        <th style="width:75px;">Tgl Kembali</th>
        <th style="width:90px;">Status</th>
      </tr>
    </thead>
    <tbody>
      @forelse($peminjaman as $index => $pinjam)
        <tr>
          <td class="no">{{ $index + 1 }}</td>
          <td>{{ $pinjam->user->nama_lengkap }}</td>
          <td>{{ $pinjam->buku->judul }}</td>
          <td style="font-family: monospace;">{{ $pinjam->buku->kode_buku }}</td>
          <td>{{ \Carbon\Carbon::parse($pinjam->tanggal_peminjaman)->format('d M Y') }}</td>
          <td>{{ \Carbon\Carbon::parse($pinjam->tanggal_pengembalian)->format('d M Y') }}</td>
          <td>
            @php
              $status = $pinjam->status;
              $badgeClass = match($status) {
                'dipinjam'             => 'badge-dipinjam',
                'dikembalikan'         => 'badge-dikembalikan',
                'menunggu'             => 'badge-menunggu',
                'menunggu_pengembalian'=> 'badge-menunggu_pengembalian',
                default                => 'badge-default',
              };
            @endphp
            <span class="badge {{ $badgeClass }}">{{ ucfirst(str_replace('_', ' ', $status)) }}</span>
          </td>
        </tr>
      @empty
        <tr class="empty">
          <td colspan="7">Belum ada data peminjaman.</td>
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