@include('nav')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lora:wght@500;600&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
  body { font-family: 'DM Sans', sans-serif; }
  .font-display { font-family: 'Lora', serif; }
</style>

<div class="min-h-screen bg-slate-50">
  <main class="max-w-6xl mx-auto px-6 py-8">

    {{-- Header Banner --}}
    <div class="rounded-2xl bg-gradient-to-br from-blue-700 to-blue-900 px-8 py-8 mb-8">
      <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">

        {{-- Teks --}}
        <div>
          <p class="text-xs font-semibold tracking-widest text-blue-300 uppercase mb-2">Perpustakaan Digital</p>
          <h1 class="font-display text-3xl text-white leading-tight">Selamat Datang, {{ auth()->user()->nama_lengkap ?? '' }} 👋 </h1>
          <p class="text-blue-200 text-sm mt-1.5">Akses cepat ke fitur utama: pinjam buku, kelola favorit, dan cek riwayat.</p>
        </div>

        {{-- Quick Stats --}}
        <div class="flex gap-3 flex-shrink-0">
          <div class="rounded-xl bg-white/10 backdrop-blur px-5 py-3 text-center min-w-[80px]">
            <div class="text-sm font-bold text-emerald-300">Aktif</div>
            <div class="text-[11px] text-blue-200 mt-0.5 font-medium">Status</div>
          </div>
        </div>

      </div>
    </div>

    {{-- Menu Cepat --}}
    <section>
      <div class="flex items-center justify-between mb-4">
        <h2 class="font-display text-lg font-semibold text-slate-900">Menu Cepat</h2>
        <a href="#" class="text-sm font-semibold text-blue-700 hover:text-blue-800 transition-colors">Lihat semua</a>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

        {{-- Pinjam Buku --}}
        <a href="{{ route('user.pinjam.index') }}"
           class="group bg-white border border-slate-100 rounded-2xl p-5 shadow-sm hover:shadow-md transition-shadow duration-200">
          <div class="flex items-start justify-between">
            <div class="h-11 w-11 rounded-xl bg-blue-50 text-blue-700 flex items-center justify-center">
              <i class="fa-solid fa-hand-holding-heart text-base"></i>
            </div>
            <i class="fa-solid fa-arrow-right text-slate-300 group-hover:text-blue-600 transition-colors mt-1"></i>
          </div>
          <div class="mt-4">
            <div class="font-semibold text-slate-900">Pinjam Buku</div>
            <p class="text-sm text-slate-500 mt-1">Pilih buku dari katalog dan ajukan peminjaman.</p>
          </div>
          <div class="mt-4 text-[11px] text-slate-400 font-medium">Akses cepat peminjaman</div>
        </a>

        {{-- Buku Favorit --}}
        <a href="{{ route('user.favorit.index') }}"
           class="group bg-white border border-slate-100 rounded-2xl p-5 shadow-sm hover:shadow-md transition-shadow duration-200">
          <div class="flex items-start justify-between">
            <div class="h-11 w-11 rounded-xl bg-blue-50 text-blue-700 flex items-center justify-center">
              <i class="fa-solid fa-heart text-base"></i>
            </div>
            <i class="fa-solid fa-arrow-right text-slate-300 group-hover:text-blue-600 transition-colors mt-1"></i>
          </div>
          <div class="mt-4">
            <div class="font-semibold text-slate-900">Buku Favorit</div>
            <p class="text-sm text-slate-500 mt-1">Simpan buku yang kamu suka biar gampang dicari lagi.</p>
          </div>
          <div class="mt-4 text-[11px] text-slate-400 font-medium">Kelola wishlist</div>
        </a>

        {{-- Riwayat Peminjaman --}}
        <a href="{{ route('user.riwayat.index') }}"
           class="group bg-white border border-slate-100 rounded-2xl p-5 shadow-sm hover:shadow-md transition-shadow duration-200">
          <div class="flex items-start justify-between">
            <div class="h-11 w-11 rounded-xl bg-blue-50 text-blue-700 flex items-center justify-center">
              <i class="fa-solid fa-clock-rotate-left text-base"></i>
            </div>
            <i class="fa-solid fa-arrow-right text-slate-300 group-hover:text-blue-600 transition-colors mt-1"></i>
          </div>
          <div class="mt-4">
            <div class="font-semibold text-slate-900">Riwayat Peminjaman</div>
            <p class="text-sm text-slate-500 mt-1">Lihat daftar buku yang pernah kamu pinjam sebelumnya.</p>
          </div>
          <div class="mt-4 text-[11px] text-slate-400 font-medium">Tracking aktivitas</div>
        </a>

      </div>
    </section>

    {{-- Footer --}}
    <footer class="mt-10 text-center text-xs text-slate-400">
      <div class="font-semibold text-slate-500">Perpoestakaan</div>
      <div class="mt-0.5">© 2026 - Portal Pengguna</div>
    </footer>

  </main>
</div>