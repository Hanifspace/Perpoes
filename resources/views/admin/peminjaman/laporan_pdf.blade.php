<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Bukti Peminjaman</title>
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

    .box {
      border: 1px solid #e2e8f0;
      border-radius: 8px;
      overflow: hidden;
      margin-top: 4px;
    }
    .box-header {
      background-color: #1d4ed8;
      padding: 10px 16px;
      font-size: 10px;
      font-weight: bold;
      color: #ffffff;
      letter-spacing: 0.05em;
      text-transform: uppercase;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }
    tr {
      border-bottom: 1px solid #f1f5f9;
    }
    tr:last-child {
      border-bottom: none;
    }
    tr:nth-child(even) {
      background-color: #f8fafc;
    }
    td {
      padding: 9px 16px;
      vertical-align: top;
      font-size: 11px;
      color: #334155;
    }
    .label {
      width: 180px;
      font-weight: bold;
      color: #64748b;
      font-size: 10px;
      text-transform: uppercase;
      letter-spacing: 0.04em;
    }
    .separator {
      width: 12px;
      color: #94a3b8;
    }

    .badge {
      display: inline-block;
      padding: 2px 10px;
      border-radius: 20px;
      font-size: 10px;
      font-weight: bold;
    }
    .badge-dipinjam             { background: #fef3c7; color: #92400e; }
    .badge-dikembalikan         { background: #d1fae5; color: #065f46; }
    .badge-menunggu             { background: #e0e7ff; color: #3730a3; }
    .badge-menunggu_pengembalian{ background: #dbeafe; color: #1e40af; }
    .badge-default              { background: #f1f5f9; color: #64748b; }

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
        <h1>Bukti Peminjaman Buku</h1>
        <p class="subtitle">Perpoestakaan</p>
      </div>
      <div class="meta-right">
        <div>Dicetak pada</div>
        <div>{{ now()->format('d M Y') }}</div>
      </div>
    </div>
  </div>

  {{-- Detail --}}
  <div class="box">
    <div class="box-header">Detail Peminjaman</div>
    <table>
      <tr>
        <td class="label">Nama Peminjam</td>
        <td class="separator">:</td>
        <td>{{ $pinjam->user->nama_lengkap }}</td>
      </tr>
      <tr>
        <td class="label">Alamat Peminjam</td>
        <td class="separator">:</td>
        <td>{{ $pinjam->user->alamat }}</td>
      </tr>
      <tr>
        <td class="label">Judul Buku</td>
        <td class="separator">:</td>
        <td>{{ $pinjam->buku->judul }}</td>
      </tr>
      <tr>
        <td class="label">Kode Buku</td>
        <td class="separator">:</td>
        <td style="font-family: monospace;">{{ $pinjam->buku->kode_buku }}</td>
      </tr>
      <tr>
        <td class="label">Tanggal Peminjaman</td>
        <td class="separator">:</td>
        <td>{{ \Carbon\Carbon::parse($pinjam->tanggal_peminjaman)->format('d M Y') }}</td>
      </tr>
      <tr>
        <td class="label">Tanggal Pengembalian</td>
        <td class="separator">:</td>
        <td>{{ \Carbon\Carbon::parse($pinjam->tanggal_pengembalian)->format('d M Y') }}</td>
      </tr>
      <tr>
        <td class="label">Status</td>
        <td class="separator">:</td>
        <td>
          @php
            $status = $pinjam->status;
            $badgeClass = match($status) {
              'dipinjam'              => 'badge-dipinjam',
              'dikembalikan'          => 'badge-dikembalikan',
              'menunggu'              => 'badge-menunggu',
              'menunggu_pengembalian' => 'badge-menunggu_pengembalian',
              default                 => 'badge-default',
            };
          @endphp
          <span class="badge {{ $badgeClass }}">{{ ucfirst(str_replace('_', ' ', $status)) }}</span>
        </td>
      </tr>
    </table>
  </div>

  {{-- Footer --}}
  <div class="footer">
    <span>Perpoestakaan &copy; {{ date('Y') }}</span>
    <span>Dokumen ini digenerate otomatis oleh sistem</span>
  </div>

</body>
</html>