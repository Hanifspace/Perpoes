@extends('layouts.app')

@section('contents')
<div class="w-full max-w-5xl mx-auto px-6 py-6">

    {{-- Header --}}
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-semibold text-slate-800">Detail Buku</h1>
            <p class="text-sm text-slate-500">Informasi lengkap data buku</p>
        </div>

        <div class="flex items-center gap-2">
            <a href="{{ route('admin.buku.index') }}"
               class="px-3 py-2 rounded-md bg-slate-100 text-slate-700 hover:bg-slate-200 text-sm">
                Kembali
            </a>
            <a href="{{ route('admin.buku.edit', $buku->id) }}"
               class="px-3 py-2 rounded-md bg-slate-900 text-white hover:bg-slate-800 text-sm">
                Edit
            </a>
            <form action="{{ route('admin.buku.destroy', $buku->id) }}"
                  method="POST"
                  onsubmit="return confirm('Yakin mau hapus buku ini?')">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="px-3 py-2 rounded-md bg-red-600 text-white hover:bg-red-700 text-sm">
                    Hapus
                </button>
            </form>
        </div>
    </div>

    {{-- Flash --}}
    @if(session('success'))
        <div class="mb-5 flex items-center gap-3 rounded-xl border border-emerald-100 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
            <i class="fas fa-check-circle text-emerald-500 flex-shrink-0"></i>
            {{ session('success') }}
        </div>
    @endif

    {{-- Card Detail Buku --}}
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden mb-5">
        <div class="flex flex-col md:flex-row md:items-stretch">

            {{-- Cover --}}
            <div class="md:w-64 flex-shrink-0 border-b md:border-b-0 md:border-r border-slate-100 self-stretch">
                @if($buku->cover)
                    <img src="{{ asset('storage/' . $buku->cover) }}"
                         alt="Cover {{ $buku->judul }}"
                         class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full min-h-[260px] bg-slate-50 flex flex-col items-center justify-center gap-2">
                        <i class="fas fa-book text-4xl text-slate-200"></i>
                        <span class="text-xs text-slate-300">No Cover</span>
                    </div>
                @endif
            </div>

            {{-- Info --}}
            <div class="flex-1 p-6 md:p-8">

                {{-- Judul & Badge --}}
                <div class="mb-6">
                    <span class="inline-flex items-center gap-1 rounded-full bg-blue-50 px-2 py-0.5 text-[10px] font-semibold text-blue-600 mb-2">
                        <i class="fas fa-tag text-[9px]"></i>
                        {{ $buku->kategori?->nama_kategori ?? 'Tanpa Kategori' }}
                    </span>
                    <h2 class="text-xl font-semibold text-slate-900 leading-snug">{{ $buku->judul }}</h2>
                    <span class="inline-block mt-1.5 text-xs font-mono bg-slate-100 text-slate-500 px-2.5 py-0.5 rounded-lg">{{ $buku->kode_buku }}</span>
                </div>

                {{-- Grid Metadata --}}
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-x-6 gap-y-4 mb-6">
                    <div>
                        <p class="text-[10px] font-semibold uppercase tracking-wider text-slate-400 mb-0.5">Penulis</p>
                        <p class="text-sm text-slate-700">{{ $buku->penulis ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] font-semibold uppercase tracking-wider text-slate-400 mb-0.5">Penerbit</p>
                        <p class="text-sm text-slate-700">{{ $buku->penerbit ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] font-semibold uppercase tracking-wider text-slate-400 mb-0.5">Tahun Terbit</p>
                        <p class="text-sm text-slate-700">{{ $buku->tahun_terbit ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] font-semibold uppercase tracking-wider text-slate-400 mb-0.5">Stok</p>
                        <p class="text-sm font-semibold {{ $buku->stok > 0 ? 'text-emerald-600' : 'text-rose-500' }}">
                            <span class="inline-flex items-center gap-1.5">
                                <span class="w-1.5 h-1.5 rounded-full {{ $buku->stok > 0 ? 'bg-emerald-400' : 'bg-rose-400' }}"></span>
                                {{ $buku->stok > 0 ? $buku->stok . ' tersedia' : 'Habis' }}
                            </span>
                        </p>
                    </div>
                </div>

                {{-- Sinopsis --}}
                @if($buku->sinopsis)
                    <div class="pt-5 border-t border-slate-100">
                        <p class="text-[10px] font-semibold uppercase tracking-wider text-slate-400 mb-2">Sinopsis</p>
                        <p class="text-sm text-slate-600 leading-relaxed whitespace-pre-line">{{ $buku->sinopsis }}</p>
                    </div>
                @endif

                {{-- Timestamps --}}
                <div class="mt-6 pt-4 border-t border-slate-100 flex flex-wrap gap-x-5 gap-y-1">
                    <p class="text-xs text-slate-400">
                        Dibuat: <span class="text-slate-500 font-medium">{{ $buku->created_at?->format('d M Y') }}</span>
                    </p>
                    <p class="text-xs text-slate-400">
                        Diperbarui: <span class="text-slate-500 font-medium">{{ $buku->updated_at?->format('d M Y') }}</span>
                    </p>
                </div>

            </div>
        </div>
    </div>

    {{-- Rating & Ulasan --}}
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">

        {{-- Header --}}
        <div class="px-6 py-5 border-b border-slate-100 flex items-center justify-between">
            <div>
                <h3 class="text-base font-semibold text-slate-800">Rating & Ulasan</h3>
                <p class="text-xs text-slate-400 mt-0.5">
                    {{ $buku->ratings->count() }} ulasan ·
                    rata-rata
                    <span class="text-amber-500 font-semibold">{{ $buku->averageRating() }} ★</span>
                </p>
            </div>
        </div>

        {{-- List --}}
        <div class="divide-y divide-slate-50">
            @forelse($buku->ratings as $rating)
                <div class="px-6 py-4 flex gap-3">

                    {{-- Avatar --}}
                    <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center text-xs font-bold flex-shrink-0">
                        {{ strtoupper(substr($rating->user->name, 0, 1)) }}
                    </div>

                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-2 mb-1">
                            <span class="text-sm font-semibold text-slate-700">{{ $rating->user->name }}</span>
                            <span class="text-amber-400 text-xs tracking-tight">
                                @for($i = 1; $i <= 5; $i++)
                                    {{ $i <= $rating->rating ? '★' : '☆' }}
                                @endfor
                            </span>
                            <span class="text-[11px] text-slate-300">{{ $rating->created_at->format('d M Y') }}</span>

                            {{-- Tombol Hapus --}}
                            <form action="{{ route('admin.rating.destroy', $rating->id) }}"
                                  method="POST"
                                  class="ml-auto"
                                  onsubmit="return confirm('Yakin mau hapus ulasan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="text-xs text-red-400 hover:text-red-600 hover:underline transition-colors">
                                    Hapus
                                </button>
                            </form>
                        </div>

                        @if($rating->komentar)
                            <p class="text-sm text-slate-500 leading-relaxed">{{ $rating->komentar }}</p>
                        @else
                            <p class="text-xs text-slate-300 italic">Tidak ada komentar.</p>
                        @endif

                    </div>
                </div>
            @empty
                <div class="px-6 py-12 text-center">
                    <i class="fas fa-star text-3xl text-slate-200 mb-3 block"></i>
                    <p class="text-sm text-slate-400">Belum ada ulasan untuk buku ini.</p>
                </div>
            @endforelse
        </div>

    </div>

</div>
@endsection