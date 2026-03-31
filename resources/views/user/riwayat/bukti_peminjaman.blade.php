<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Bukti Peminjaman</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
      font-family: DejaVu Sans, sans-serif;
      font-size: 11px;
      color: #1e1a16;
      background: #fff;
      width: 210mm;
      min-height: 297mm;
    }

    .top-accent { height: 5px; background: linear-gradient(90deg, #1d4ed8 0%, #93c5fd 50%, #1d4ed8 100%); }

    .header {
      background: #1d4ed8;
      padding: 20px 36px;
      display: flex;
      align-items: center;
      gap: 16px;
    }
    .header-name { font-size: 16px; font-weight: bold; color: #fff; }
    .header-sub  { font-size: 10px; color: rgba(255,255,255,0.55); margin-top: 3px; }
    .header-badge { margin-left: auto; text-align: right; }
    .badge-label {
      display: inline-block;
      background: rgba(255,255,255,0.15);
      border: 1px solid rgba(255,255,255,0.3);
      color: #ffffff;
      font-size: 9px; font-weight: bold;
      letter-spacing: 1.5px; text-transform: uppercase;
      padding: 4px 10px; border-radius: 3px;
    }
    .badge-num { font-size: 10px; color: rgba(255,255,255,0.45); margin-top: 4px; }

    .address-bar {
      background: #eff6ff;
      border-bottom: 1px solid #bfdbfe;
      padding: 7px 36px;
      font-size: 10px;
      color: #3b82f6;
    }

    .title-section { padding: 18px 36px 14px; border-bottom: 1px solid #dbeafe; }
    .title-main { font-size: 20px; font-weight: bold; color: #1d4ed8; }
    .title-sub  { font-size: 11px; color: #94a3b8; margin-top: 4px; }
    .blue-line  { width: 40px; height: 3px; background: #1d4ed8; margin-top: 10px; border-radius: 2px; }

    .content { padding: 16px 36px; }

    .section-label {
      font-size: 9px; font-weight: bold;
      letter-spacing: 2px; text-transform: uppercase;
      color: #1d4ed8; margin-bottom: 10px;
      display: flex; align-items: center; gap: 8px;
    }
    .section-label::after { content: ''; flex: 1; height: 1px; background: #dbeafe; }

    .info-grid {
      border: 1px solid #dbeafe;
      border-radius: 6px;
      overflow: hidden;
      margin-bottom: 14px;
    }
    .info-row { display: flex; border-bottom: 1px solid #dbeafe; }
    .info-row:last-child { border-bottom: none; }
    .info-cell { padding: 10px 16px; flex: 1; border-right: 1px solid #dbeafe; }
    .info-cell:last-child { border-right: none; }
    .info-cell.full { flex: none; width: 100%; }
    .info-row:nth-child(even) { background-color: #f8fafc; }

    .info-cell-label { font-size: 9px; font-weight: bold; letter-spacing: 1px; text-transform: uppercase; color: #94a3b8; margin-bottom: 4px; }
    .info-cell-value { font-size: 12px; font-weight: 600; color: #1e293b; }
    .info-cell-value.mono { font-family: 'Courier New', monospace; font-size: 11px; letter-spacing: 0.5px; }

    .status-badge {
      display: inline-flex; align-items: center; gap: 5px;
      padding: 4px 12px; border-radius: 20px;
      font-size: 11px; font-weight: bold;
      background: #fef3c7; color: #92400e; border: 1px solid #fcd34d;
    }
    .status-dot { width: 6px; height: 6px; border-radius: 50%; background: currentColor; }

    .terms-box {
      background: #eff6ff;
      border: 1px solid #bfdbfe;
      border-radius: 6px;
      padding: 12px 16px;
      margin-bottom: 14px;
    }
    .terms-title {
      font-size: 9px; font-weight: bold;
      letter-spacing: 1px; text-transform: uppercase;
      color: #1d4ed8; margin-bottom: 8px;
    }
    .terms-list { list-style: none; }
    .terms-list li {
      font-size: 10px; color: #334155;
      padding-left: 14px; position: relative;
      margin-bottom: 4px; line-height: 1.4;
    }
    .terms-list li::before { content: '▸'; position: absolute; left: 0; color: #1d4ed8; font-size: 9px; top: 1px; }

    .footer {
      background: #1d4ed8;
      padding: 10px 36px;
      display: flex; align-items: center; justify-content: space-between;
      margin-top: 14px;
    }
    .footer-left  { font-size: 9px; color: rgba(255,255,255,0.55); }
    .footer-left span { color: #ffffff; font-weight: 600; }
    .footer-right { font-size: 9px; color: rgba(255,255,255,0.4); }

    .bottom-accent { height: 3px; background: linear-gradient(90deg, #93c5fd 0%, #1d4ed8 100%); }
  </style>
</head>
<body>

  <div class="top-accent"></div>

  <div class="header">
    <div>
      <div class="header-name">Perpoestakaan</div>
      <div class="header-sub">Jakarta — DKI Jakarta</div>
    </div>
    <div class="header-badge">
      <div class="badge-label">Bukti Resmi</div>
      <div class="badge-num">No. {{ $pinjam->id ?? '-' }}</div>
    </div>
  </div>

  <div class="address-bar">
    Jl. Salemba Raya No. 28A, Kenari, Senen, Jakarta Pusat 10430 &nbsp;·&nbsp; Telp: (021) 3922-920 &nbsp;·&nbsp; Senin–Jumat, 08.00–16.00 WIB &nbsp;·&nbsp; perpusnas.go.id
  </div>

  <div class="title-section">
    <div class="title-main">Bukti Peminjaman Buku</div>
    <div class="title-sub">Dokumen ini merupakan bukti sah peminjaman buku perpustakaan</div>
    <div class="blue-line"></div>
  </div>

  <div class="content">

    <div class="section-label">Informasi Peminjam &amp; Koleksi</div>

    <div class="info-grid">
      <div class="info-row">
        <div class="info-cell full">
          <div class="info-cell-label">Nama Lengkap Peminjam</div>
          <div class="info-cell-value">{{ $pinjam->user->nama_lengkap ?? '-' }}</div>
        </div>
      </div>
      <div class="info-row">
        <div class="info-cell">
          <div class="info-cell-label">Judul Buku</div>
          <div class="info-cell-value">{{ $pinjam->buku->judul ?? '-' }}</div>
        </div>
        <div class="info-cell">
          <div class="info-cell-label">Kode Buku</div>
          <div class="info-cell-value mono">{{ $pinjam->buku->kode_buku ?? '-' }}</div>
        </div>
      </div>
      <div class="info-row">
        <div class="info-cell">
          <div class="info-cell-label">Tanggal Peminjaman</div>
          <div class="info-cell-value">{{ \Carbon\Carbon::parse($pinjam->tanggal_peminjaman)->format('d M Y') }}</div>
        </div>
        <div class="info-cell">
          <div class="info-cell-label">Batas Pengembalian</div>
          <div class="info-cell-value">{{ $pinjam->tanggal_pengembalian ? \Carbon\Carbon::parse($pinjam->tanggal_pengembalian)->format('d M Y') : '-' }}</div>
        </div>
      </div>
      <div class="info-row">
        <div class="info-cell full">
          <div class="info-cell-label">Status</div>
          <div class="info-cell-value">
            <span class="status-badge">
              <span class="status-dot"></span>
              {{ ucfirst(str_replace('_', ' ', $pinjam->status)) }}
            </span>
          </div>
        </div>
      </div>
    </div>

    <div class="section-label">Syarat &amp; Ketentuan</div>

    <div class="terms-box">
      <div class="terms-title">Peraturan Peminjaman Koleksi Perpustakaan</div>
      <ul class="terms-list">
        <li>Peminjam bertanggung jawab penuh atas kerusakan atau kehilangan koleksi yang dipinjam.</li>
        <li>Koleksi hilang atau rusak parah wajib diganti dengan buku yang sama atau senilai harga buku.</li>
        <li>Bukti peminjaman ini wajib dibawa saat pengembalian buku.</li>
      </ul>
    </div>
  </div>
</body>
</html>