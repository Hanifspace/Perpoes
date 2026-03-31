@extends('layouts.app')

@section('contents')
<div class="p-6 space-y-6">

  {{-- Header --}}
  <div class="flex flex-col gap-2 md:flex-row md:items-center md:justify-between">
    <div>
      <h2 class="text-2xl font-bold text-slate-900">Selamat Datang, {{ auth()->user()->name }}</h2>
      <p class="text-slate-600">Ringkasan sistem dan aktivitas terbaru perpustakaan.</p>
    </div>

    <div class="flex flex-wrap gap-2">
      <a href="{{ route('admin.buku.create') }}"
         class="inline-flex items-center gap-2 rounded-xl bg-blue-600 px-4 py-2 text-white shadow-sm hover:bg-blue-700">
        <i class="fa-solid fa-plus"></i>
        Tambah Buku
      </a>
      <a href="{{ route('admin.kategori.create') }}"
         class="inline-flex items-center gap-2 rounded-xl bg-slate-900 px-4 py-2 text-white shadow-sm hover:bg-slate-800">
        <i class="fa-solid fa-tag"></i>
        Tambah Kategori
      </a>
    </div>
  </div>

  {{-- KPI Cards --}}
  <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 xl:grid-cols-4">
    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
      <div class="flex items-center gap-3">
        <div class="h-11 w-11 rounded-xl bg-blue-600/10 text-blue-600 flex items-center justify-center">
          <i class="fa-solid fa-book"></i>
        </div>
        <div>
          <p class="text-sm text-slate-500">Jumlah Buku</p>
          <p class="text-2xl font-bold text-slate-900">{{ $bookCount }}</p>
        </div>
      </div>
      <div class="mt-4">
        <a href="{{ route('admin.buku.index') }}" class="text-sm text-blue-600 hover:underline">Lihat daftar buku →</a>
      </div>
    </div>

    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
      <div class="flex items-center gap-3">
        <div class="h-11 w-11 rounded-xl bg-indigo-600/10 text-indigo-600 flex items-center justify-center">
          <i class="fa-solid fa-layer-group"></i>
        </div>
        <div>
          <p class="text-sm text-slate-500">Jumlah Kategori</p>
          <p class="text-2xl font-bold text-slate-900">{{ $kategoriCount }}</p>
        </div>
      </div>
      <div class="mt-4">
        <a href="{{ route('admin.kategori.index') }}" class="text-sm text-blue-600 hover:underline">Kelola kategori →</a>
      </div>
    </div>

    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
      <div class="flex items-center gap-3">
        <div class="h-11 w-11 rounded-xl bg-emerald-600/10 text-emerald-600 flex items-center justify-center">
          <i class="fa-solid fa-user-shield"></i>
        </div>
        <div>
          <p class="text-sm text-slate-500">Jumlah Petugas</p>
          <p class="text-2xl font-bold text-slate-900">{{ $petugasCount }}</p>
        </div>
      </div>
      <div class="mt-4">
        <a href="{{ route('admin.petugas.index') }}" class="text-sm text-blue-600 hover:underline">Lihat petugas →</a>
      </div>
    </div>

    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
      <div class="flex items-center gap-3">
        <div class="h-11 w-11 rounded-xl bg-amber-600/10 text-amber-600 flex items-center justify-center">
          <i class="fa-solid fa-users"></i>
        </div>
        <div>
          <p class="text-sm text-slate-500">Jumlah Pengguna</p>
          <p class="text-2xl font-bold text-slate-900">{{ $penggunaCount }}</p>
        </div>
      </div>
      <div class="mt-4">
        <a href="{{ route('admin.pengguna.index') }}" class="text-sm text-blue-600 hover:underline">Kelola pengguna →</a>
      </div>
    </div>
  </div>

  {{-- Section bawah --}}
  <div class="grid grid-cols-1 gap-4 xl:grid-cols-2">

    {{-- Quick Actions --}}
    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
      <h3 class="text-base font-semibold text-slate-900">Quick Actions</h3>
      <p class="mt-1 text-sm text-slate-600">Akses cepat untuk pekerjaan yang sering dilakukan.</p>

      <div class="mt-4 grid grid-cols-1 gap-2">
        <a href="{{ route('admin.buku.create') }}"
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

        <a href="{{ route('admin.kategori.create') }}"
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

        <a href="{{ route('admin.petugas.create') }}"
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

    {{-- Tips & Info --}}
    <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm flex flex-col">
      <h3 class="text-base font-semibold text-slate-900">Tips Pengelolaan</h3>
      <p class="mt-1 text-sm text-slate-600">Panduan singkat untuk menjaga koleksi tetap teratur.</p>

      <div class="mt-4 flex flex-col gap-3 flex-1">

        <div class="flex gap-3 p-3 rounded-xl bg-blue-50 border border-blue-100">
          <div class="h-8 w-8 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center flex-shrink-0">
            <i class="fa-solid fa-book text-sm"></i>
          </div>
          <div>
            <p class="text-sm font-medium text-slate-800">Perbarui stok rutin</p>
            <p class="text-xs text-slate-500 mt-0.5">Pastikan stok buku selalu akurat agar pengguna tahu ketersediaan.</p>
          </div>
        </div>

        <div class="flex gap-3 p-3 rounded-xl bg-indigo-50 border border-indigo-100">
          <div class="h-8 w-8 rounded-lg bg-indigo-100 text-indigo-600 flex items-center justify-center flex-shrink-0">
            <i class="fa-solid fa-layer-group text-sm"></i>
          </div>
          <div>
            <p class="text-sm font-medium text-slate-800">Kategorikan dengan benar</p>
            <p class="text-xs text-slate-500 mt-0.5">Kategori yang tepat memudahkan pengguna menemukan buku yang dicari.</p>
          </div>
        </div>

        <div class="flex gap-3 p-3 rounded-xl bg-emerald-50 border border-emerald-100">
          <div class="h-8 w-8 rounded-lg bg-emerald-100 text-emerald-600 flex items-center justify-center flex-shrink-0">
            <i class="fa-solid fa-image text-sm"></i>
          </div>
          <div>
            <p class="text-sm font-medium text-slate-800">Upload cover buku</p>
            <p class="text-xs text-slate-500 mt-0.5">Buku dengan cover lebih menarik perhatian dan meningkatkan minat baca.</p>
          </div>
        </div>

        <div class="flex gap-3 p-3 rounded-xl bg-amber-50 border border-amber-100">
          <div class="h-8 w-8 rounded-lg bg-amber-100 text-amber-600 flex items-center justify-center flex-shrink-0">
            <i class="fa-solid fa-star text-sm"></i>
          </div>
          <div>
            <p class="text-sm font-medium text-slate-800">Pantau ulasan pengguna</p>
            <p class="text-xs text-slate-500 mt-0.5">Ulasan membantu mengetahui kualitas koleksi dan kepuasan pembaca.</p>
          </div>
        </div>

      </div>
    </div>

  </div>

</div>
@endsection