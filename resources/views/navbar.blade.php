{{-- resources/views/partials/navbar.blade.php --}}

<style>
    :root {
        --ink: #1e3a8a;
        --cream: #eff6ff;
        --warm: #dbeafe;
        --accent: #2563eb;
        --muted: #64748b;
        --border: #bfdbfe;
    }

    .font-display { font-family: 'Playfair Display', serif; }

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

    #mobile-menu { display: none; }
    #mobile-menu.open { display: block; }
</style>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

<nav>
    <div class="max-w-6xl mx-auto px-6">
        <div class="flex items-center justify-between h-16">

            <a href="#beranda" class="font-display text-xl font-bold text-[var(--ink)] tracking-tight" style="text-decoration:none;">
                PERPOESTAKAAN
            </a>

            <div class="hidden md:flex items-center gap-8">
                <a href="{{ route ('welcome') }}" class="nav-link">Beranda</a>
            </div>

            <div class="hidden md:flex items-center gap-3">
                <a href="{{ route('login') }}"    class="btn-ghost">Masuk</a>
                <a href="{{ route('register') }}" class="btn-primary">Daftar</a>
            </div>

            <button id="menu-toggle" class="md:hidden text-[var(--muted)]" onclick="toggleMenu()">
                <i class="fas fa-bars text-lg"></i>
            </button>
        </div>
    </div>
</nav>

<script>
    function toggleMenu() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('open');
    }
</script>