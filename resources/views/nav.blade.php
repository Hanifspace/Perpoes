<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Perpoestakaan - Dashboard Pengguna</title>

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

  <style>
    * { scroll-behavior: smooth; }

    .navbar-gradient {
      background: linear-gradient(90deg, #ffffff 0%, #f8fafc 100%);
    }

    .menu-link {
      transition: all .2s ease;
      position: relative;
    }
    .menu-link:hover {
      color: #1d4ed8;
    }
    .menu-link.active {
      color: #1d4ed8;
      font-weight: 600;
    }
    .menu-link.active::after {
      content: "";
      position: absolute;
      left: 0;
      bottom: -10px;
      width: 100%;
      height: 3px;
      border-radius: 999px;
      background: linear-gradient(135deg, #2563eb, #3b82f6);
    }

    .profile-avatar {
      background: linear-gradient(135deg, #2563eb, #3b82f6);
      transition: all 0.3s ease;
    }
    .profile-avatar:hover {
      transform: scale(1.05);
      box-shadow: 0 10px 25px rgba(37, 99, 235, 0.2);
    }

    .dropdown-animation {
      animation: slideDown 0.2s ease-out;
    }
    @keyframes slideDown {
      from { opacity: 0; transform: translateY(-8px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    .feature-card {
      transition: all 0.25s ease;
      border-top: 3px solid transparent;
    }
    .feature-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.10);
      border-top-color: rgba(37, 99, 235, 0.8);
    }
  </style>
</head>

<body class="bg-gradient-to-br from-slate-50 via-blue-50 to-slate-50 text-slate-800">

  <!-- NAVBAR -->
  <header class="h-16 navbar-gradient border-b border-slate-200 flex items-center justify-between px-4 md:px-8 shadow-sm sticky top-0 z-40">
    <!-- Left: Brand + menu -->
    <div class="flex items-center gap-6">
      <!-- Brand -->
      <a href="#" class="flex items-center gap-3">
        <div class="h-10 w-10 rounded-lg bg-gradient-to-br from-blue-600 to-blue-700 text-white flex items-center justify-center shadow-md">
          <i class="fa-solid fa-book-open text-sm"></i>
        </div>
        <div class="leading-tight">
          <div class="font-bold text-slate-900 text-sm">Perpoestakaan</div>
          <div class="text-xs text-slate-500 font-medium hidden sm:block">Dashboard Pengguna</div>
        </div>
      </a>

      <!-- Menu (4 items) -->
      <nav class="hidden md:flex items-center gap-6 text-sm text-slate-600">
        <a href="{{ route('user.dashboard') }}" class="menu-link active">Dashboard</a>
        <a href="{{ route('user.pinjam.index') }}" class="menu-link">Katalog Buku</a>
        <a href="{{ route('user.favorit.index') }}" class="menu-link">Favorit</a>
        <a href="{{ route('user.riwayat.index') }}" class="menu-link">Riwayat</a>
      </nav>
    </div>

    <!-- Right: Profile dropdown -->
    <div class="relative">
      <button id="profileBtn" type="button"
              class="flex items-center gap-2 px-3 py-1.5 rounded-lg hover:bg-slate-100 transition-colors"
              onclick="toggleProfileDropdown()">
        <div class="h-9 w-9 rounded-full profile-avatar text-white flex items-center justify-center shadow-md">
          <i class="fa-solid fa-user text-xs"></i>
        </div>
        <div class="hidden lg:block text-left leading-tight">
          <div class="text-xs font-semibold text-slate-900">{{ auth()->user()->name }}</div>
          <div class="text-xs text-slate-500">{{ auth()->user()->role }}</div>
        </div>
        <i class="fa-solid fa-chevron-down text-slate-500 text-xs transition-transform" id="chevronIcon"></i>
      </button>

      <div id="profileMenu"
           class="hidden absolute right-0 mt-3 w-56 bg-white border border-slate-200 rounded-xl shadow-lg overflow-hidden dropdown-animation">
        <div class="px-4 py-3 bg-gradient-to-r from-blue-50 to-slate-50 border-b border-slate-200">
          <div class="text-sm font-semibold text-slate-900">Nama Pengguna</div>
          <div class="text-xs text-slate-500 mt-1">user@perpoestakaan.com</div>
        </div>

        <a href="#"
           class="flex items-center gap-3 px-4 py-3 text-sm text-slate-700 hover:bg-blue-50 hover:text-blue-700 transition-colors border-t border-slate-200">
          <i class="fa-solid fa-id-badge text-blue-600 w-4"></i>
          <span>Profil</span>
        </a>

        <a href="#"
           class="flex items-center gap-3 px-4 py-3 text-sm text-slate-700 hover:bg-blue-50 hover:text-blue-700 transition-colors border-t border-slate-200">
          <i class="fa-solid fa-gear text-blue-600 w-4"></i>
          <span>Pengaturan</span>
        </a>

                    <form action="{{ route('logout') }}" method="POST" class="border-t border-slate-200">
                        @csrf
                        <button type="submit"
                                class="w-full text-left flex items-center gap-3 px-4 py-3 text-sm text-red-600 hover:bg-red-50 transition-colors font-medium">
                            <i class="fa-solid fa-arrow-right-from-bracket w-4"></i>
                            <span>Keluar</span>
                        </button>
                    </form>
      </div>
    </div>
  </header>

  <!-- MOBILE MENU (4 items) -->
  <div class="md:hidden border-b border-slate-200 bg-white/70 backdrop-blur">
    <div class="px-4 py-3 flex items-center gap-4 text-sm text-slate-600 overflow-x-auto">
      <a href="#" class="menu-link active whitespace-nowrap">Dashboard</a>
      <a href="#" class="menu-link whitespace-nowrap">Katalog Buku</a>
      <a href="#" class="menu-link whitespace-nowrap">Favorit</a>
      <a href="#" class="menu-link whitespace-nowrap">Riwayat</a>
    </div>
  </div>

  
  <script>
    function toggleProfileDropdown() {
      const menu = document.getElementById('profileMenu');
      const chevron = document.getElementById('chevronIcon');

      menu.classList.toggle('hidden');
      chevron.style.transform = menu.classList.contains('hidden') ? 'rotate(0deg)' : 'rotate(180deg)';
    }

    // Tutup dropdown kalau klik di luar
    document.addEventListener('click', function (e) {
      const btn = document.getElementById('profileBtn');
      const menu = document.getElementById('profileMenu');
      const chevron = document.getElementById('chevronIcon');
      if (!btn || !menu) return;

      if (!btn.contains(e.target) && !menu.contains(e.target)) {
        menu.classList.add('hidden');
        if (chevron) chevron.style.transform = 'rotate(0deg)';
      }
    });
  </script>