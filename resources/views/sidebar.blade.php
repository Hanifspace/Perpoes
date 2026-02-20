<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpoestakaan - Admin Panel</title>

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

    <style>
        * {
            scroll-behavior: smooth;
        }

        .sidebar-link {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }

        .sidebar-link::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 0;
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            border-radius: 0 4px 4px 0;
            transition: height 0.3s ease;
        }

        .sidebar-link:hover::before {
            height: 24px;
        }

        .sidebar-link.active {
            background: linear-gradient(135deg, #eff6ff, #dbeafe);
            color: #1e40af;
        }

        .sidebar-link.active::before {
            height: 32px;
        }

        .sidebar-link i {
            transition: transform 0.3s ease;
        }

        .sidebar-link:hover i {
            transform: scale(1.1);
        }

        .navbar-gradient {
            background: linear-gradient(90deg, #ffffff 0%, #f8fafc 100%);
        }



        .profile-avatar {
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            transition: all 0.3s ease;
        }

        .profile-avatar:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 25px rgba(37, 99, 235, 0.2);
        }

        .menu-item {
            transition: all 0.2s ease;
        }

        .menu-item:hover {
            background: linear-gradient(135deg, #eff6ff, #dbeafe);
            transform: translateX(4px);
        }

        .dropdown-animation {
            animation: slideDown 0.2s ease-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-8px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .sidebar-mobile {
            transition: transform 0.3s ease;
        }

        .sidebar-backdrop {
            transition: opacity 0.3s ease;
        }

        .stat-card {
            transition: all 0.3s ease;
            border-top: 3px solid transparent;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }
    </style>

</head>
<body class="bg-gradient-to-br from-slate-50 via-blue-50 to-slate-50 text-slate-800">

<div class="min-h-screen flex">

    {{-- SIDEBAR --}}
    <aside class="w-64 bg-white border-r border-slate-200 shadow-sm hidden md:flex md:flex-col fixed h-screen">
        {{-- Brand --}}
        <div class="h-16 flex items-center gap-3 px-6 border-b border-slate-200 bg-gradient-to-r from-slate-50 to-white">
            <div class="h-10 w-10 rounded-lg bg-gradient-to-br from-blue-600 to-blue-700 text-white flex items-center justify-center shadow-md">
                <i class="fa-solid fa-book-open text-sm"></i>
            </div>
            <div class="leading-tight">
                <div class="font-bold text-slate-900 text-sm">Perpoestakaan</div>
                <div class="text-xs text-slate-500 font-medium hidden sm:block">Admin</div>
            </div>
        </div>

        {{-- Menu --}}
        <nav class="px-3 py-4 flex-1 overflow-y-auto scrollbar-thin scrollbar-thumb-slate-300 scrollbar-track-transparent">
            <ul class="space-y-2">
                    <a href="{{ route('admin.dashboard') }}"
                       class="sidebar-link active flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700">
                        <i class="fa-solid fa-gauge-high w-5 text-blue-600"></i>
                        <span class="font-medium">Dashboard</span>
                    </a>
                </li>
                @if (auth()->check() && auth()->user()->role === 'admin')
                <li>
                    <a href="{{ route('admin.petugas.index') }}"
                       class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:text-blue-700">
                        <i class="fa-solid fa-user-gear w-5 text-blue-600"></i>
                        <span class="font-medium">Manajemen Petugas</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.pengguna.index') }}"
                       class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:text-blue-700">
                        <i class="fa-solid fa-users w-5 text-blue-600"></i>
                        <span class="font-medium">Manajemen User</span>
                    </a>
                </li>
                @endif
                <li>
                    <a href="{{ route('admin.kategori.index') }}"
                       class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:text-blue-700">
                        <i class="fa-solid fa-layer-group w-5 text-blue-600"></i>
                        <span class="font-medium">Kategori Buku</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.buku.index') }}"
                       class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:text-blue-700">
                        <i class="fa-solid fa-book w-5 text-blue-600"></i>
                        <span class="font-medium">Data Buku</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                       class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:text-blue-700">
                        <i class="fa-solid fa-right-left w-5 text-blue-600"></i>
                        <span class="font-medium">Peminjaman &amp; Pengembalian</span>
                    </a>
                </li>

                <li>
                    <a href="#"
                       class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:text-blue-700">
                        <i class="fa-solid fa-file-lines w-5 text-blue-600"></i>
                        <span class="font-medium">Laporan Peminjaman</span>
                    </a>
                </li>

            </ul>
        </nav>

        {{-- Footer Sidebar --}}
        <div class="px-6 py-4 border-t border-slate-200 bg-gradient-to-t from-slate-50 to-transparent">
            <div class="text-xs text-slate-500 text-center">
                <div class="font-semibold">Perpoestakaan</div>
                <div>© {{ date('Y') }} - Admin Portal</div>
            </div>
        </div>
    </aside>

    {{-- MAIN --}}
    <div class="flex-1 md:ml-64 flex flex-col min-h-screen">

        {{-- NAVBAR --}}
        <header class="h-16 navbar-gradient border-b border-slate-200 flex items-center justify-between px-4 md:px-8 shadow-sm sticky top-0 z-40">
            {{-- Left: Mobile toggle + breadcrumb --}}
            <div class="flex items-center gap-4">
                {{-- Mobile menu button --}}
                <button class="md:hidden p-2.5 rounded-lg hover:bg-slate-100 transition-colors" type="button" onclick="toggleSidebarMobile()">
                    <i class="fa-solid fa-bars text-slate-700 text-lg"></i>
                </button>

                <div class="text-sm text-slate-500">
                    <span class="font-semibold text-slate-900">Admin</span>
                    <span class="mx-2 text-slate-300">/</span>
                    <span class="text-blue-600 font-semibold">Perpoestakaan</span>
                </div>
            </div>

            {{-- Right: Profile dropdown --}}
            <div class="relative">
                <button id="profileBtn" type="button"
                        class="flex items-center gap-2 px-3 py-1.5 rounded-lg hover:bg-slate-100 transition-colors"
                        onclick="toggleProfileDropdown()">
                    <div class="h-9 w-9 rounded-full profile-avatar text-white flex items-center justify-center shadow-md">
                        <i class="fa-solid fa-user text-xs"></i>
                    </div>
                    <div class="hidden lg:block text-left leading-tight">
                        <div class="text-xs font-semibold text-slate-900">
                            {{ auth()->user()->name ?? 'Administrator' }}
                        </div>
                        <div class="text-xs text-slate-500">Admin</div>
                    </div>
                    <i class="fa-solid fa-chevron-down text-slate-500 text-xs transition-transform" id="chevronIcon"></i>
                </button>

                <div id="profileMenu"
                     class="hidden absolute right-0 mt-3 w-56 bg-white border border-slate-200 rounded-xl shadow-lg overflow-hidden dropdown-animation">
                    
                    <div class="px-4 py-3 bg-gradient-to-r from-blue-50 to-slate-50 border-b border-slate-200">
                        <div class="text-sm font-semibold text-slate-900">{{ auth()->user()->name ?? 'Administrator' }}</div>
                        <div class="text-xs text-slate-500 mt-1">{{ auth()->user()->email ?? 'admin@perpoestakaan.com' }}</div>
                    </div>

                    <a href="#"
                       class="flex items-center gap-3 px-4 py-3 text-sm text-slate-700 hover:bg-blue-50 hover:text-blue-700 transition-colors border-t border-slate-200">
                        <i class="fa-solid fa-id-badge text-blue-600 w-4"></i>
                        <span>Lihat Profile</span>
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

        {{-- CONTENT --}}
        <main class="flex-1 p-4 md:p-8 overflow-y-auto">
            @yield('contents')
        </main>

    </div>
</div>

{{-- Mobile Sidebar Backdrop --}}
<div id="sidebarMobileBackdrop" class="hidden fixed inset-0 bg-black/30 md:hidden z-30 sidebar-backdrop" onclick="toggleSidebarMobile()"></div>

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
        if (!btn || !menu) return;

        if (!btn.contains(e.target) && !menu.contains(e.target)) {
            menu.classList.add('hidden');
            document.getElementById('chevronIcon').style.transform = 'rotate(0deg)';
        }
    });

    function toggleSidebarMobile() {
        const sidebar = document.querySelector('aside');
        const backdrop = document.getElementById('sidebarMobileBackdrop');

        sidebar.classList.toggle('-translate-x-full');
        backdrop.classList.toggle('hidden');
    }
</script>

</body>
</html>