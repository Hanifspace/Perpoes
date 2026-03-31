{{-- resources/views/welcome.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PERPOESTAKAAN</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700;900&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --ink: #1e3a8a;
            --cream: #eff6ff;
            --warm: #dbeafe;
            --accent: #2563eb;
            --accent-light: #3b82f6;
            --muted: #64748b;
            --border: #bfdbfe;
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: #f0f7ff;
            color: #1e3a8a;
            overflow-x: hidden;
        }

        .font-display { font-family: 'Playfair Display', serif; }

        /* ── NAVBAR ── */
        nav {
            background: var(--cream);
            border-bottom: 1px solid var(--border);
            position: sticky;
            top: 0;
            z-index: 50;
        }

        .nav-link {
            font-size: 0.85rem;
            font-weight: 500;
            color: var(--muted);
            text-decoration: none;
            letter-spacing: 0.03em;
            transition: color 0.2s;
        }
        .nav-link:hover { color: var(--ink); }

        .btn-primary {
            background: var(--ink);
            color: var(--cream);
            padding: 0.55rem 1.4rem;
            border-radius: 4px;
            font-size: 0.82rem;
            font-weight: 600;
            text-decoration: none;
            letter-spacing: 0.04em;
            transition: background 0.2s, transform 0.15s;
            display: inline-block;
        }
        .btn-primary:hover { background: var(--accent); transform: translateY(-1px); }

        .btn-ghost {
            color: var(--ink);
            padding: 0.55rem 1.2rem;
            border-radius: 4px;
            font-size: 0.82rem;
            font-weight: 500;
            text-decoration: none;
            border: 1px solid var(--border);
            transition: border-color 0.2s, background 0.2s;
            display: inline-block;
        }
        .btn-ghost:hover { border-color: var(--ink); background: var(--warm); }

        /* ── HERO ── */
        .hero {
            min-height: 88vh;
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: center;
            gap: 4rem;
            padding: 5rem 0;
            position: relative;
        }

        .hero::before {
            content: '';
            position: absolute;
            right: -80px;
            top: 60px;
            width: 420px;
            height: 420px;
            border-radius: 50%;
            background: radial-gradient(circle, #f0e8d8 0%, transparent 70%);
            pointer-events: none;
        }

        .hero-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--accent);
            margin-bottom: 1.5rem;
        }
        .hero-eyebrow::before {
            content: '';
            display: block;
            width: 28px;
            height: 1.5px;
            background: var(--accent);
        }

        .hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2.8rem, 5vw, 4.2rem);
            font-weight: 900;
            line-height: 1.08;
            letter-spacing: -0.02em;
            color: var(--ink);
            margin-bottom: 1.5rem;
        }

        .hero h1 em {
            font-style: italic;
            color: var(--accent);
        }

        .hero p {
            font-size: 1rem;
            line-height: 1.75;
            color: var(--muted);
            max-width: 420px;
            margin-bottom: 2.5rem;
        }

        .hero-visual {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .book-stack {
            position: relative;
            width: 280px;
            height: 340px;
        }

        .book-card {
            position: absolute;
            border-radius: 8px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.12);
        }

        .book-card-1 {
            width: 180px;
            height: 240px;
            background: linear-gradient(135deg, #1e3a8a, #1e40af);
            top: 20px;
            left: 20px;
            transform: rotate(-6deg);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .book-card-2 {
            width: 180px;
            height: 240px;
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            top: 60px;
            left: 70px;
            transform: rotate(3deg);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .book-card-3 {
            width: 160px;
            height: 210px;
            background: linear-gradient(135deg, #eff6ff, #dbeafe);
            top: 100px;
            left: 110px;
            transform: rotate(-1deg);
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid var(--border);
        }

        .book-spine {
            width: 4px;
            height: 70%;
            background: rgba(255,255,255,0.2);
            border-radius: 2px;
        }

        .stat-pill {
            position: absolute;
            background: white;
            border-radius: 10px;
            padding: 0.85rem 1.2rem;
            box-shadow: 0 8px 30px rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 0.82rem;
            font-weight: 600;
            white-space: nowrap;
        }

        .stat-pill-icon {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
        }

        /* ── DIVIDER ── */
        .section-divider {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin: 1rem 0;
        }
        .section-divider::before,
        .section-divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--border);
        }

        /* ── SECTIONS ── */
        section { padding: 5rem 0; }

        .section-label {
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: var(--accent);
            margin-bottom: 0.75rem;
        }

        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2rem, 3.5vw, 2.8rem);
            font-weight: 700;
            line-height: 1.15;
            color: var(--ink);
        }

        /* ── FEATURE CARDS ── */
        .feature-card {
            padding: 2rem;
            border: 1px solid var(--border);
            border-radius: 12px;
            background: white;
            transition: transform 0.2s, box-shadow 0.2s, border-color 0.2s;
            position: relative;
            overflow: hidden;
        }
        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--accent);
            transform: scaleX(0);
            transition: transform 0.3s;
            transform-origin: left;
        }
        .feature-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 40px rgba(0,0,0,0.08);
            border-color: transparent;
        }
        .feature-card:hover::before { transform: scaleX(1); }

        .feature-icon {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            background: #dbeafe;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: #2563eb;
            margin-bottom: 1.25rem;
        }

        /* ── COLLECTION GRID ── */
        .collection-card {
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 1.75rem;
            background: white;
            cursor: default;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .collection-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 32px rgba(0,0,0,0.07);
        }

        .collection-number {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            font-weight: 900;
            color: var(--accent);
            line-height: 1;
            margin-bottom: 0.25rem;
        }

        /* ── SERVICES ── */
        .service-row {
            display: flex;
            gap: 1.25rem;
            padding: 1.5rem 0;
            border-bottom: 1px solid var(--border);
            align-items: flex-start;
        }
        .service-row:first-child { border-top: 1px solid var(--border); }

        .service-num {
            font-family: 'Playfair Display', serif;
            font-size: 1.1rem;
            color: var(--accent);
            font-weight: 700;
            min-width: 28px;
            padding-top: 2px;
        }

        /* ── CTA ── */
        .cta-section {
            background: linear-gradient(135deg, #1e3a8a, #1d4ed8);
            color: #eff6ff;
            border-radius: 20px;
            padding: 5rem 4rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .cta-section::before {
            content: '';
            position: absolute;
            top: -60px;
            right: -60px;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(96,165,250,0.25) 0%, transparent 70%);
        }
        .cta-section::after {
            content: '';
            position: absolute;
            bottom: -80px;
            left: -40px;
            width: 250px;
            height: 250px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(96,165,250,0.15) 0%, transparent 70%);
        }

        .btn-cta {
            background: var(--accent);
            color: white;
            padding: 0.85rem 2rem;
            border-radius: 6px;
            font-size: 0.9rem;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            transition: background 0.2s, transform 0.15s;
            letter-spacing: 0.03em;
        }
        .btn-cta:hover { background: var(--accent-light); transform: translateY(-2px); }

        .btn-cta-outline {
            border: 1.5px solid rgba(255,255,255,0.3);
            color: rgba(255,255,255,0.85);
            padding: 0.85rem 2rem;
            border-radius: 6px;
            font-size: 0.9rem;
            font-weight: 500;
            text-decoration: none;
            display: inline-block;
            transition: border-color 0.2s, color 0.2s;
        }
        .btn-cta-outline:hover { border-color: white; color: white; }

        /* ── FOOTER ── */
        footer {
            background: #1e3a8a;
            color: rgba(255,255,255,0.5);
            padding: 4rem 0 2rem;
        }

        .footer-logo {
            font-family: 'Playfair Display', serif;
            font-size: 1.4rem;
            font-weight: 700;
            color: white;
            margin-bottom: 0.75rem;
        }

        .footer-link {
            display: block;
            font-size: 0.85rem;
            color: rgba(255,255,255,0.45);
            text-decoration: none;
            margin-bottom: 0.6rem;
            transition: color 0.2s;
        }
        .footer-link:hover { color: white; }

        /* ── MOBILE MENU ── */
        #mobile-menu {
            display: none;
        }
        #mobile-menu.open {
            display: block;
        }

        /* ── ANIMATIONS ── */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(24px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .fade-up { animation: fadeUp 0.6s ease both; }
        .delay-1 { animation-delay: 0.1s; }
        .delay-2 { animation-delay: 0.2s; }
        .delay-3 { animation-delay: 0.35s; }

        @media (max-width: 768px) {
            .hero {
                grid-template-columns: 1fr;
                min-height: auto;
                padding: 3rem 0;
            }
            .hero-visual { display: none; }
            .cta-section { padding: 3rem 1.5rem; }
        }
    </style>
</head>
<body>

{{-- ══════════════════════════════════════
     NAVBAR
══════════════════════════════════════ --}}
<nav>
    <div class="max-w-6xl mx-auto px-6">
        <div class="flex items-center justify-between h-16">

            {{-- Logo --}}
            <a href="#beranda" class="font-display text-xl font-bold text-[var(--ink)] tracking-tight" style="text-decoration:none;">
                PERPOESTAKAAN
            </a>

            {{-- Desktop Nav --}}
            <div class="hidden md:flex items-center gap-8">
                <a href="#beranda"  class="nav-link">Beranda</a>
                <a href="#tentang"  class="nav-link">Tentang</a>
                <a href="#koleksi"  class="nav-link">Koleksi</a>
                <a href="#layanan"  class="nav-link">Layanan</a>
                <a href="#kontak"   class="nav-link">Kontak</a>
            </div>

            {{-- Auth --}}
            <div class="hidden md:flex items-center gap-3">
                <a href="{{ route('login') }}"    class="btn-ghost">Masuk</a>
                <a href="{{ route('register') }}" class="btn-primary">Daftar</a>
            </div>

            {{-- Mobile toggle --}}
            <button id="menu-toggle" class="md:hidden text-[var(--muted)]" onclick="toggleMenu()">
                <i class="fas fa-bars text-lg"></i>
            </button>
        </div>
    </div>
</nav>


{{-- ══════════════════════════════════════
     HERO
══════════════════════════════════════ --}}
<section id="beranda" style="background:var(--cream);">
    <div class="max-w-6xl mx-auto px-6">
        <div class="hero">
            {{-- Left --}}
            <div>
                <div class="hero-eyebrow fade-up">Perpustakaan Digital</div>
                <h1 class="fade-up delay-1">
                    Temukan buku<br>yang <em>mengubah</em><br>cara pandangmu.
                </h1>
                <p class="fade-up delay-2">
                    Ribuan koleksi buku tersedia untuk dipinjam kapan saja. Mulai dari fiksi klasik hingga jurnal ilmiah terkini — semua ada di sini.
                </p>
                <div class="flex items-center gap-3 flex-wrap fade-up delay-3">
                    <a href="{{ route('register') }}" class="btn-primary">
                        Mulai Sekarang
                    </a>
                    <a href="{{ route('login') }}" class="btn-ghost">
                        Lihat Koleksi
                    </a>
                </div>
                <div class="flex items-center gap-6 mt-8 fade-up delay-3" style="color:var(--muted); font-size:0.82rem;">
                    <span><strong style="color:var(--ink); font-size:1.1rem;">50rb+</strong><br>Buku Tersedia</span>
                    <div style="width:1px; height:32px; background:var(--border);"></div>
                    <span><strong style="color:var(--ink); font-size:1.1rem;">24/7</strong><br>Akses Kapan Saja</span>
                    <div style="width:1px; height:32px; background:var(--border);"></div>
                    <span><strong style="color:var(--ink); font-size:1.1rem;">Gratis</strong><br>Untuk Semua</span>
                </div>
            </div>

            {{-- Right: Visual --}}
            <div class="hero-visual">
                <div class="book-stack">
                    <div class="book-card book-card-1">
                        <div class="book-spine"></div>
                    </div>
                    <div class="book-card book-card-2">
                        <div class="book-spine"></div>
                    </div>
                    <div class="book-card book-card-3" style="color:var(--muted);">
                        <i class="fas fa-book-open" style="font-size:2rem; color:var(--accent); opacity:0.4;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ══════════════════════════════════════
     TENTANG / FEATURES
══════════════════════════════════════ --}}
<section id="tentang" style="background:var(--warm);">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-12">
            <div class="section-label">Mengapa Kami</div>
            <h2 class="section-title">Lebih dari sekadar<br>perpustakaan biasa</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-layer-group"></i></div>
                <h3 class="font-semibold text-lg mb-2" style="color:var(--ink);">Koleksi Lengkap</h3>
                <p style="color:var(--muted); font-size:0.9rem; line-height:1.7;">
                    Lebih dari 50.000 judul dari berbagai genre dan bidang ilmu — dari sastra hingga sains, semuanya bisa diakses dengan mudah.
                </p>
            </div>

            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-shield-alt"></i></div>
                <h3 class="font-semibold text-lg mb-2" style="color:var(--ink);">Aman & Terpercaya</h3>
                <p style="color:var(--muted); font-size:0.9rem; line-height:1.7;">
                    Data kamu terlindungi. Sistem peminjaman transparan dengan riwayat yang bisa diakses kapan saja tanpa kerumitan.
                </p>
            </div>

            <div class="feature-card">
                <div class="feature-icon"><i class="fas fa-bolt"></i></div>
                <h3 class="font-semibold text-lg mb-2" style="color:var(--ink);">Proses Cepat</h3>
                <p style="color:var(--muted); font-size:0.9rem; line-height:1.7;">
                    Ajukan peminjaman dalam hitungan detik. Tidak perlu antri, tidak perlu ribet — semuanya digital dan instan.
                </p>
            </div>
        </div>
    </div>
</section>



{{-- ══════════════════════════════════════
     LAYANAN
══════════════════════════════════════ --}}
<section id="layanan" style="background:var(--warm);">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-start">
            <div>
                <div class="section-label">Layanan</div>
                <h2 class="section-title mb-6">Semua yang kamu<br>butuhkan.</h2>
                <p style="color:var(--muted); font-size:0.95rem; line-height:1.8;">
                    Kami merancang setiap layanan agar terasa mudah dan menyenangkan — bukan membebani. Fokus kamu belajar, urusan sisanya biar kami yang handle.
                </p>
            </div>

            <div>
                <div class="service-row">
                    <span class="service-num">01</span>
                    <div>
                        <h3 class="font-semibold mb-1" style="color:var(--ink);">Peminjaman Digital</h3>
                        <p style="color:var(--muted); font-size:0.875rem; line-height:1.7;">Ajukan peminjaman online, konfirmasi otomatis, dan pantau status langsung dari dashboard kamu.</p>
                    </div>
                </div>
                <div class="service-row">
                    <span class="service-num">02</span>
                    <div>
                        <h3 class="font-semibold mb-1" style="color:var(--ink);">Riwayat Peminjaman</h3>
                        <p style="color:var(--muted); font-size:0.875rem; line-height:1.7;">Semua catatan peminjaman tersimpan rapi. Laporan bisa dilihat dan diunduh kapan saja.</p>
                    </div>
                </div>
                <div class="service-row">
                    <span class="service-num">03</span>
                    <div>
                        <h3 class="font-semibold mb-1" style="color:var(--ink);">Favorit & Rekomendasi</h3>
                        <p style="color:var(--muted); font-size:0.875rem; line-height:1.7;">Simpan buku favorit dan dapatkan rekomendasi berdasarkan koleksi yang pernah kamu pinjam.</p>
                    </div>
                </div>
                <div class="service-row">
                    <span class="service-num">04</span>
                    <div>
                        <h3 class="font-semibold mb-1" style="color:var(--ink);">Rating & Ulasan</h3>
                        <p style="color:var(--muted); font-size:0.875rem; line-height:1.7;">Bagikan pendapat kamu tentang buku yang sudah dibaca dan bantu pembaca lain menemukan bacaan terbaik.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ══════════════════════════════════════
     CTA
══════════════════════════════════════ --}}
<section style="background:var(--cream);">
    <div class="max-w-6xl mx-auto px-6">
        <div class="cta-section">
            <div style="position:relative; z-index:1;">
                <div style="font-size:0.72rem; font-weight:700; letter-spacing:0.14em; text-transform:uppercase; color:#93c5fd; margin-bottom:1rem;">
                    Bergabung Sekarang
                </div>
                <h2 class="font-display" style="font-size:clamp(1.8rem,4vw,3rem); font-weight:800; color:white; margin-bottom:1rem; line-height:1.15;">
                    Mulai perjalanan<br>membacamu hari ini.
                </h2>
                <p style="color:rgba(255,255,255,0.55); font-size:0.95rem; max-width:400px; margin:0 auto 2.5rem; line-height:1.75;">
                    Daftar gratis dan akses ribuan koleksi buku dari mana saja, kapan saja.
                </p>
                <div class="flex items-center justify-center gap-3 flex-wrap">
                    <a href="{{ route('register') }}" class="btn-cta">Daftar Gratis</a>
                    <a href="{{ route('login') }}"    class="btn-cta-outline">Sudah punya akun?</a>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ══════════════════════════════════════
     FOOTER
══════════════════════════════════════ --}}
<footer id="kontak">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-10 pb-10 border-b" style="border-color:rgba(255,255,255,0.08);">

            <div class="md:col-span-1">
                <div class="footer-logo">PERPOESTAKAAN</div>
                <p style="font-size:0.85rem; line-height:1.75; margin-bottom:1.25rem;">
                    Perpustakaan digital modern untuk generasi yang haus akan ilmu pengetahuan.
                </p>
                <div class="flex gap-3">
                    <a href="#" style="color:rgba(255,255,255,0.35); transition:color 0.2s;" onmouseover="this.style.color='white'" onmouseout="this.style.color='rgba(255,255,255,0.35)'">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" style="color:rgba(255,255,255,0.35); transition:color 0.2s;" onmouseover="this.style.color='white'" onmouseout="this.style.color='rgba(255,255,255,0.35)'">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" style="color:rgba(255,255,255,0.35); transition:color 0.2s;" onmouseover="this.style.color='white'" onmouseout="this.style.color='rgba(255,255,255,0.35)'">
                        <i class="fab fa-facebook"></i>
                    </a>
                </div>
            </div>

            <div>
                <div style="font-size:0.72rem; font-weight:700; letter-spacing:0.1em; text-transform:uppercase; color:rgba(255,255,255,0.3); margin-bottom:1rem;">Menu</div>
                <a href="#beranda" class="footer-link">Beranda</a>
                <a href="#tentang" class="footer-link">Tentang</a>
                <a href="#koleksi" class="footer-link">Koleksi</a>
                <a href="#layanan" class="footer-link">Layanan</a>
            </div>

            <div>
                <div style="font-size:0.72rem; font-weight:700; letter-spacing:0.1em; text-transform:uppercase; color:rgba(255,255,255,0.3); margin-bottom:1rem;">Akun</div>
                <a href="{{ route('login') }}"    class="footer-link">Masuk</a>
                <a href="{{ route('register') }}" class="footer-link">Daftar</a>
            </div>

            <div>
                <div style="font-size:0.72rem; font-weight:700; letter-spacing:0.1em; text-transform:uppercase; color:rgba(255,255,255,0.3); margin-bottom:1rem;">Kontak</div>
                <p class="footer-link"><i class="fas fa-envelope mr-2"></i>info@perpoestakaan.ac.id</p>
                <p class="footer-link"><i class="fas fa-phone mr-2"></i>(021) 123-4567</p>
                <p class="footer-link"><i class="fas fa-map-marker-alt mr-2"></i>Jakarta, Indonesia</p>
            </div>
        </div>

        <div class="pt-6 flex flex-col md:flex-row items-center justify-between gap-2" style="font-size:0.78rem;">
            <span>&copy; 2026 PERPOESTAKAAN. All rights reserved.</span>
            <span>Dibuat dengan <i class="fas fa-heart" style="color:#60a5fa;"></i> untuk para pembaca</span>
        </div>
    </div>
</footer>


<script>
    // Mobile menu toggle
    function toggleMenu() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('open');
    }

    // Smooth scroll
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                const menu = document.getElementById('mobile-menu');
                if (menu.classList.contains('open')) menu.classList.remove('open');
            }
        });
    });
</script>

</body>
</html>