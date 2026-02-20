
@include('nav')

  <!-- CONTENT -->
  <main class="max-w-6xl mx-auto p-4 md:p-8">
    <!-- Hero -->
    <section class="bg-white border border-slate-200 rounded-2xl shadow-sm p-6 md:p-8">
      <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
          <h1 class="text-xl md:text-2xl font-bold text-slate-900">
            Selamat datang di Perpoestakaan 👋
          </h1>
          <p class="text-slate-600 mt-2 text-sm md:text-base">
            Akses cepat ke fitur utama: pinjam buku, kelola favorit, dan cek riwayat peminjaman.
          </p>
        </div>
      </div>

      <!-- Quick stats -->
      <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mt-6">
        <div class="rounded-2xl border border-slate-200 bg-gradient-to-r from-slate-50 to-white p-4">
          <div class="text-xs text-slate-500 font-medium">Total Dipinjam</div>
          <div class="mt-2 flex items-center justify-between">
            <div class="text-2xl font-bold text-slate-900">0</div>
            <div class="h-10 w-10 rounded-xl bg-blue-50 text-blue-700 flex items-center justify-center">
              <i class="fa-solid fa-book"></i>
            </div>
          </div>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-gradient-to-r from-slate-50 to-white p-4">
          <div class="text-xs text-slate-500 font-medium">Favorit</div>
          <div class="mt-2 flex items-center justify-between">
            <div class="text-2xl font-bold text-slate-900">0</div>
            <div class="h-10 w-10 rounded-xl bg-blue-50 text-blue-700 flex items-center justify-center">
              <i class="fa-solid fa-heart"></i>
            </div>
          </div>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-gradient-to-r from-slate-50 to-white p-4">
          <div class="text-xs text-slate-500 font-medium">Status</div>
          <div class="mt-2 flex items-center justify-between">
            <div class="text-sm font-semibold text-emerald-700 bg-emerald-50 px-3 py-1 rounded-full">
              Aktif
            </div>
            <div class="h-10 w-10 rounded-xl bg-blue-50 text-blue-700 flex items-center justify-center">
              <i class="fa-solid fa-shield-halved"></i>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Feature cards -->
    <section class="mt-6">
      <div class="flex items-center justify-between">
        <h2 class="text-base md:text-lg font-bold text-slate-900">Menu Cepat</h2>
        <a href="#" class="text-sm font-semibold text-blue-700 hover:text-blue-800">Lihat semua</a>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mt-4">
        <!-- 1. Pinjam Buku -->
        <a href="{{ route('user.pinjam.index') }}" class="feature-card group bg-white border border-slate-200 rounded-2xl p-5 shadow-sm">
          <div class="flex items-start justify-between">
            <div class="h-12 w-12 rounded-2xl bg-blue-50 text-blue-700 flex items-center justify-center">
              <i class="fa-solid fa-hand-holding-heart text-lg"></i>
            </div>
            <div class="text-slate-400 group-hover:text-blue-600 transition-colors">
              <i class="fa-solid fa-arrow-right"></i>
            </div>
          </div>
          <div class="mt-4">
            <div class="font-bold text-slate-900">Pinjam Buku</div>
            <p class="text-sm text-slate-600 mt-1">
              Pilih buku dari katalog dan ajukan peminjaman.
            </p>
          </div>
          <div class="mt-4 text-xs text-slate-500 font-medium">
            Akses cepat peminjaman
          </div>
        </a>

        <!-- 2. Buku Favorit -->
        <a href="{{ route('user.favorit.index') }}" class="feature-card group bg-white border border-slate-200 rounded-2xl p-5 shadow-sm">
          <div class="flex items-start justify-between">
            <div class="h-12 w-12 rounded-2xl bg-blue-50 text-blue-700 flex items-center justify-center">
              <i class="fa-solid fa-heart text-lg"></i>
            </div>
            <div class="text-slate-400 group-hover:text-blue-600 transition-colors">
              <i class="fa-solid fa-arrow-right"></i>
            </div>
          </div>
          <div class="mt-4">
            <div class="font-bold text-slate-900">Buku Favorit</div>
            <p class="text-sm text-slate-600 mt-1">
              Simpan buku yang lu suka biar gampang dicari lagi.
            </p>
          </div>
          <div class="mt-4 text-xs text-slate-500 font-medium">
            Kelola wishlist
          </div>
        </a>

        <!-- 3. Riwayat Peminjaman -->
        <a href="{{ route('user.riwayat.index') }}" class="feature-card group bg-white border border-slate-200 rounded-2xl p-5 shadow-sm">
          <div class="flex items-start justify-between">
            <div class="h-12 w-12 rounded-2xl bg-blue-50 text-blue-700 flex items-center justify-center">
              <i class="fa-solid fa-clock-rotate-left text-lg"></i>
            </div>
            <div class="text-slate-400 group-hover:text-blue-600 transition-colors">
              <i class="fa-solid fa-arrow-right"></i>
            </div>
          </div>
          <div class="mt-4">
            <div class="font-bold text-slate-900">Riwayat Peminjaman</div>
            <p class="text-sm text-slate-600 mt-1">
              Lihat daftar buku yang pernah lu pinjam sebelumnya.
            </p>
          </div>
          <div class="mt-4 text-xs text-slate-500 font-medium">
            Tracking aktivitas
          </div>
        </a>
      </div>
    </section>

    <!-- Footer -->
    <footer class="mt-8 text-center text-xs text-slate-500">
      <div class="font-semibold">Perpoestakaan</div>
      <div>© 2026 - Portal Pengguna</div>
    </footer>
  </main>
