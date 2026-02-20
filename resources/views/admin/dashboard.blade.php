@extends('layouts.app')

@section('contents')
<div class="p-6 space-y-6">

  {{-- Header --}}
  <div class="flex flex-col gap-2 md:flex-row md:items-center md:justify-between">
    <div>
      <h2 class="text-2xl font-bold text-slate-900">Dashboard Admin</h2>
      <p class="text-slate-600">Ringkasan sistem dan aktivitas terbaru perpustakaan.</p>
    </div>

    <div class="flex flex-wrap gap-2">
      <a href="#"
         class="inline-flex items-center gap-2 rounded-xl bg-blue-600 px-4 py-2 text-white shadow-sm hover:bg-blue-700">
        <i class="fa-solid fa-plus"></i>
        Tambah Buku
      </a>
      <a href="#"
         class="inline-flex items-center gap-2 rounded-xl bg-slate-900 px-4 py-2 text-white shadow-sm hover:bg-slate-800">
        <i class="fa-solid fa-tag"></i>
        Tambah Kategori
      </a>
    </div>
  </div>

  {{-- KPI Cards (Dummy angka) --}}
  <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">
    {{-- Buku --}}
    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
      <div class="flex items-center justify-between">
        <div class="flex items-center gap-3">
          <div class="h-11 w-11 rounded-xl bg-blue-600/10 text-blue-600 flex items-center justify-center">
            <i class="fa-solid fa-book"></i>
          </div>
          <div>
            <p class="text-sm text-slate-500">Jumlah Buku</p>
            <p class="text-2xl font-bold text-slate-900">128</p>
          </div>
        </div>
        <span class="text-xs rounded-full bg-slate-100 px-2 py-1 text-slate-600">Koleksi</span>
      </div>
      <div class="mt-4">
        <a href="#" class="text-sm text-blue-600 hover:underline">Lihat daftar buku →</a>
      </div>
    </div>

    {{-- Kategori --}}
    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
      <div class="flex items-center justify-between">
        <div class="flex items-center gap-3">
          <div class="h-11 w-11 rounded-xl bg-indigo-600/10 text-indigo-600 flex items-center justify-center">
            <i class="fa-solid fa-layer-group"></i>
          </div>
          <div>
            <p class="text-sm text-slate-500">Jumlah Kategori</p>
            <p class="text-2xl font-bold text-slate-900">12</p>
          </div>
        </div>
        <span class="text-xs rounded-full bg-slate-100 px-2 py-1 text-slate-600">Metadata</span>
      </div>
      <div class="mt-4">
        <a href="#" class="text-sm text-blue-600 hover:underline">Kelola kategori →</a>
      </div>
    </div>

    {{-- Petugas --}}
    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
      <div class="flex items-center justify-between">
        <div class="flex items-center gap-3">
          <div class="h-11 w-11 rounded-xl bg-emerald-600/10 text-emerald-600 flex items-center justify-center">
            <i class="fa-solid fa-user-shield"></i>
          </div>
          <div>
            <p class="text-sm text-slate-500">Jumlah Petugas</p>
            <p class="text-2xl font-bold text-slate-900">6</p>
          </div>
        </div>
        <span class="text-xs rounded-full bg-slate-100 px-2 py-1 text-slate-600">Staff</span>
      </div>
      <div class="mt-4">
        <a href="#" class="text-sm text-blue-600 hover:underline">Lihat petugas →</a>
      </div>
    </div>

    {{-- Pengguna --}}
    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
      <div class="flex items-center justify-between">
        <div class="flex items-center gap-3">
          <div class="h-11 w-11 rounded-xl bg-amber-600/10 text-amber-600 flex items-center justify-center">
            <i class="fa-solid fa-users"></i>
          </div>
          <div>
            <p class="text-sm text-slate-500">Jumlah Pengguna</p>
            <p class="text-2xl font-bold text-slate-900">342</p>
          </div>
        </div>
        <span class="text-xs rounded-full bg-slate-100 px-2 py-1 text-slate-600">Member</span>
      </div>
      <div class="mt-4">
        <a href="#" class="text-sm text-blue-600 hover:underline">Kelola pengguna →</a>
      </div>
    </div>
  </div>

  {{-- Section bawah --}}
  <div class="grid grid-cols-1 gap-4 xl:grid-cols-3">

    {{-- Quick Actions --}}
    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
      <h3 class="text-base font-semibold text-slate-900">Quick Actions</h3>
      <p class="mt-1 text-sm text-slate-600">Akses cepat untuk pekerjaan yang sering dilakukan.</p>

      <div class="mt-4 grid grid-cols-1 gap-2">
        <a href="#"
           class="flex items-center justify-between rounded-xl border border-slate-200 px-4 py-3 hover:bg-slate-50">
          <div class="flex items-center gap-3">
            <span class="h-9 w-9 rounded-lg bg-blue-600/10 text-blue-600 flex items-center justify-center">
              <i class="fa-solid fa-book-medical"></i>
            </span>
            <div>
              <p class="text-sm font-medium text-slate-900">Tambah buku baru</p>
              <p class="text-xs text-slate-500">Input data buku & cover</p>
            </div>
          </div>
          <i class="fa-solid fa-chevron-right text-slate-400"></i>
        </a>

        <a href="#"
           class="flex items-center justify-between rounded-xl border border-slate-200 px-4 py-3 hover:bg-slate-50">
          <div class="flex items-center gap-3">
            <span class="h-9 w-9 rounded-lg bg-indigo-600/10 text-indigo-600 flex items-center justify-center">
              <i class="fa-solid fa-tag"></i>
            </span>
            <div>
              <p class="text-sm font-medium text-slate-900">Tambah kategori</p>
              <p class="text-xs text-slate-500">Rapihin klasifikasi koleksi</p>
            </div>
          </div>
          <i class="fa-solid fa-chevron-right text-slate-400"></i>
        </a>

        <a href="#"
           class="flex items-center justify-between rounded-xl border border-slate-200 px-4 py-3 hover:bg-slate-50">
          <div class="flex items-center gap-3">
            <span class="h-9 w-9 rounded-lg bg-emerald-600/10 text-emerald-600 flex items-center justify-center">
              <i class="fa-solid fa-user-plus"></i>
            </span>
            <div>
              <p class="text-sm font-medium text-slate-900">Tambah petugas</p>
              <p class="text-xs text-slate-500">Buat akun staff baru</p>
            </div>
          </div>
          <i class="fa-solid fa-chevron-right text-slate-400"></i>
        </a>

        <a href="#"
           class="flex items-center justify-between rounded-xl border border-slate-200 px-4 py-3 hover:bg-slate-50">
          <div class="flex items-center gap-3">
            <span class="h-9 w-9 rounded-lg bg-amber-600/10 text-amber-600 flex items-center justify-center">
              <i class="fa-solid fa-chart-line"></i>
            </span>
            <div>
              <p class="text-sm font-medium text-slate-900">Lihat laporan</p>
              <p class="text-xs text-slate-500">Statistik & ringkasan</p>
            </div>
          </div>
          <i class="fa-solid fa-chevron-right text-slate-400"></i>
        </a>
      </div>
    </div>

    {{-- Aktivitas Terbaru (Dummy list) --}}
    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm xl:col-span-2">
      <div class="flex items-center justify-between">
        <div>
          <h3 class="text-base font-semibold text-slate-900">Aktivitas Terbaru</h3>
          <p class="mt-1 text-sm text-slate-600">Contoh tampilan daftar aktivitas (dummy).</p>
        </div>
        <span class="text-xs rounded-full bg-slate-100 px-2 py-1 text-slate-600">Dummy</span>
      </div>

      <div class="mt-4 grid grid-cols-1 gap-4 md:grid-cols-2">

        {{-- Buku terbaru --}}
        <div class="rounded-xl border border-slate-200 p-4">
          <div class="flex items-center justify-between">
            <p class="text-sm font-semibold text-slate-900">Buku Terbaru</p>
            <i class="fa-solid fa-clock text-slate-400"></i>
          </div>

          <div class="mt-3 space-y-3">
            @php
              $dummyBooks = [
                ['judul' => 'Atomic Habits', 'waktu' => '2 jam lalu'],
                ['judul' => 'Clean Code', 'waktu' => 'kemarin'],
                ['judul' => 'Laskar Pelangi', 'waktu' => '3 hari lalu'],
              ];
            @endphp

            @foreach($dummyBooks as $b)
              <div class="flex items-start gap-3">
                <div class="mt-1 h-8 w-8 rounded-lg bg-blue-600/10 text-blue-600 flex items-center justify-center">
                  <i class="fa-solid fa-book"></i>
                </div>
                <div class="min-w-0">
                  <p class="text-sm font-medium text-slate-900 truncate">{{ $b['judul'] }}</p>
                  <p class="text-xs text-slate-500">{{ $b['waktu'] }}</p>
                </div>
              </div>
            @endforeach
          </div>

          <div class="mt-4">
            <a href="#" class="text-sm text-blue-600 hover:underline">Lihat semua →</a>
          </div>
        </div>

        {{-- Pengguna terbaru --}}
        <div class="rounded-xl border border-slate-200 p-4">
          <div class="flex items-center justify-between">
            <p class="text-sm font-semibold text-slate-900">Pengguna Terbaru</p>
            <i class="fa-solid fa-user-plus text-slate-400"></i>
          </div>

          <div class="mt-3 space-y-3">
            @php
              $dummyUsers = [
                ['nama' => 'Rizky Ramadhan', 'waktu' => '30 menit lalu'],
                ['nama' => 'Aulia Putri', 'waktu' => 'hari ini'],
                ['nama' => 'Dimas Pratama', 'waktu' => '2 hari lalu'],
              ];
            @endphp

            @foreach($dummyUsers as $u)
              <div class="flex items-start gap-3">
                <div class="mt-1 h-8 w-8 rounded-lg bg-amber-600/10 text-amber-600 flex items-center justify-center">
                  <i class="fa-solid fa-user"></i>
                </div>
                <div class="min-w-0">
                  <p class="text-sm font-medium text-slate-900 truncate">{{ $u['nama'] }}</p>
                  <p class="text-xs text-slate-500">{{ $u['waktu'] }}</p>
                </div>
              </div>
            @endforeach
          </div>

          <div class="mt-4">
            <a href="#" class="text-sm text-blue-600 hover:underline">Kelola pengguna →</a>
          </div>
        </div>

      </div>

      {{-- Statistik ringkas (Dummy badges) --}}
      <div class="mt-4 rounded-xl bg-slate-50 border border-slate-200 p-4">
        <div class="flex flex-wrap items-center justify-between gap-3">
          <div>
            <p class="text-sm font-semibold text-slate-900">Statistik Ringkas</p>
            <p class="text-xs text-slate-600">Badge ringkas biar dashboard ga kosong.</p>
          </div>
          <div class="flex flex-wrap gap-2">
            <span class="text-xs rounded-full bg-white border border-slate-200 px-3 py-1 text-slate-700">
              Buku aktif: 120
            </span>
            <span class="text-xs rounded-full bg-white border border-slate-200 px-3 py-1 text-slate-700">
              Buku dipinjam: 34
            </span>
            <span class="text-xs rounded-full bg-white border border-slate-200 px-3 py-1 text-slate-700">
              Kategori terpakai: 11
            </span>
            <span class="text-xs rounded-full bg-white border border-slate-200 px-3 py-1 text-slate-700">
              Pengguna baru (7 hari): 18
            </span>
          </div>
        </div>
      </div>

    </div>
  </div>

</div>
@endsection
