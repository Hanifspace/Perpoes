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

        .top-accent { height: 5px; background: linear-gradient(90deg, #1a2744 0%, #c9a84c 50%, #1a2744 100%); }

        .header {
            background: #1a2744;
            padding: 20px 36px;
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .header-icon {
            width: 44px; height: 44px;
            background: rgba(201,168,76,0.15);
            border: 1px solid rgba(201,168,76,0.4);
            border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }

        .header-icon svg { width: 22px; height: 22px; fill: #c9a84c; }

        .header-name { font-size: 16px; font-weight: bold; color: #fff; }
        .header-sub { font-size: 10px; color: rgba(255,255,255,0.5); margin-top: 3px; }

        .header-badge { margin-left: auto; text-align: right; }

        .badge-label {
            display: inline-block;
            background: rgba(201,168,76,0.15);
            border: 1px solid rgba(201,168,76,0.35);
            color: #e8c97a;
            font-size: 9px; font-weight: bold;
            letter-spacing: 1.5px; text-transform: uppercase;
            padding: 4px 10px; border-radius: 3px;
        }

        .badge-num { font-size: 10px; color: rgba(255,255,255,0.35); margin-top: 4px; }

        .address-bar {
            background: #f0ede8;
            border-bottom: 1px solid #ddd8cc;
            padding: 7px 36px;
            font-size: 10px; color: #9e9689;
        }

        .title-section { padding: 18px 36px 14px; border-bottom: 1px solid #ddd8cc; }
        .title-main { font-size: 20px; font-weight: bold; color: #1a2744; }
        .title-sub { font-size: 11px; color: #9e9689; margin-top: 4px; }
        .gold-line { width: 40px; height: 3px; background: #c9a84c; margin-top: 10px; border-radius: 2px; }

        .content { padding: 16px 36px; }

        .section-label {
            font-size: 9px; font-weight: bold;
            letter-spacing: 2px; text-transform: uppercase;
            color: #c9a84c; margin-bottom: 10px;
            display: flex; align-items: center; gap: 8px;
        }
        .section-label::after { content: ''; flex: 1; height: 1px; background: #ddd8cc; }

        .info-grid {
            border: 1px solid #ddd8cc;
            border-radius: 6px;
            overflow: hidden;
            margin-bottom: 14px;
        }

        .info-row { display: flex; border-bottom: 1px solid #ddd8cc; }
        .info-row:last-child { border-bottom: none; }

        .info-cell { padding: 10px 16px; flex: 1; border-right: 1px solid #ddd8cc; }
        .info-cell:last-child { border-right: none; }
        .info-cell.full { flex: none; width: 100%; }

        .info-cell-label { font-size: 9px; font-weight: bold; letter-spacing: 1px; text-transform: uppercase; color: #9e9689; margin-bottom: 4px; }
        .info-cell-value { font-size: 12px; font-weight: 600; color: #1e1a16; }
        .info-cell-value.mono { font-family: 'Courier New', monospace; font-size: 11px; letter-spacing: 0.5px; }

        .status-badge {
            display: inline-flex; align-items: center; gap: 5px;
            padding: 4px 12px; border-radius: 20px;
            font-size: 11px; font-weight: bold;
            background: #fff3e0; color: #e65100; border: 1px solid #ffcc80;
        }
        .status-dot { width: 6px; height: 6px; border-radius: 50%; background: currentColor; }

        .terms-box {
            background: #f7f5f0;
            border: 1px solid #ddd8cc;
            border-radius: 6px;
            padding: 12px 16px;
            margin-bottom: 14px;
        }

        .terms-title {
            font-size: 9px; font-weight: bold;
            letter-spacing: 1px; text-transform: uppercase;
            color: #1a2744; margin-bottom: 8px;
        }

        .terms-list { list-style: none; }
        .terms-list li {
            font-size: 10px; color: #555;
            padding-left: 14px; position: relative;
            margin-bottom: 4px; line-height: 1.4;
        }
        .terms-list li::before { content: '▸'; position: absolute; left: 0; color: #c9a84c; font-size: 9px; top: 1px; }

        .sig-section {
            display: flex; gap: 24px;
            padding-top: 12px;
            border-top: 1px dashed #ddd8cc;
        }

        .sig-box { flex: 1; text-align: center; }
        .sig-role { font-size: 10px; color: #9e9689; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 40px; }
        .sig-line { border-top: 1px solid #ddd8cc; padding-top: 6px; }
        .sig-name { font-size: 11px; font-weight: bold; color: #1e1a16; }
        .sig-title { font-size: 9px; color: #9e9689; margin-top: 2px; }

        .footer {
            background: #1a2744;
            padding: 10px 36px;
            display: flex; align-items: center; justify-content: space-between;
            margin-top: 14px;
        }

        .footer-left { font-size: 9px; color: rgba(255,255,255,0.45); }
        .footer-left span { color: #e8c97a; font-weight: 600; }
        .footer-right { font-size: 9px; color: rgba(255,255,255,0.3); }

        .bottom-accent { height: 3px; background: linear-gradient(90deg, #c9a84c 0%, #1a2744 100%); }
    </style>
</head>
<body>

    <div class="top-accent"></div>

    <div class="header">
        <div>
            <div class="header-name">Perpoestakaan</div>
            <div class="header-sub">Kota Bogor — Jawa Barat</div>
        </div>
        <div class="header-badge">
            <div class="badge-label">Bukti Resmi</div>
            <div class="badge-num">No. {{ $pinjam->id ?? 'BK-2025-0042' }}</div>
        </div>
    </div>

    <div class="address-bar">
        Jl. Juanda No. 14, Bogor Tengah, Kota Bogor 16121 &nbsp;·&nbsp; Telp: (0251) 8323-456 &nbsp;·&nbsp; Senin–Jumat, 08.00–16.00 WIB &nbsp;·&nbsp; perpustakaan.bogorkota.go.id
    </div>

    <div class="title-section">
        <div class="title-main">Bukti Peminjaman Buku</div>
        <div class="title-sub">Dokumen ini merupakan bukti sah peminjaman buku perpustakaan</div>
        <div class="gold-line"></div>
    </div>

    <div class="content">

        <div class="section-label">Informasi Peminjam &amp; Koleksi</div>

        <div class="info-grid">
            <div class="info-row">
                <div class="info-cell full">
                    <div class="info-cell-label">Nama Lengkap Peminjam</div>
                    <div class="info-cell-value">{{ $pinjam->user->name ?? '-' }}</div>
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
                            {{ ucfirst($pinjam->status) }}
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
                <li>Bukti peminjaman ini wajib dibawa saat peminjaman buku.</li>
            </ul>
        </div>

    </div>

    <div class="footer">
        <div class="footer-left">Dicetak pada <span>{{ now()->format('d M Y, H:i') }} WIB</span></div>
        <div class="footer-right">Dokumen ini sah tanpa tanda tangan basah</div>
    </div>
    <div class="bottom-accent"></div>

</body>
</html>