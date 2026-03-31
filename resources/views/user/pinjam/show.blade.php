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
  <div class="max-w-5xl mx-auto px-6 py-8">

    {{-- Header Banner --}}
    <div class="rounded-2xl bg-gradient-to-br from-blue-700 to-blue-900 px-8 py-8 mb-8 flex flex-col items-center text-center gap-2">
      <p class="text-xs font-semibold tracking-widest text-blue-300 uppercase">Perpustakaan Digital</p>
      <h1 class="font-display text-3xl text-white leading-tight">Detail Buku</h1>
      <p class="text-blue-200 text-sm mt-0.5">Informasi lengkap data buku.</p>
    </div>

    {{-- Tombol Kembali --}}
    <a href="{{ route('user.pinjam.index') }}"
       class="inline-flex items-center gap-1.5 text-xs font-semibold text-slate-500 hover:text-blue-700 transition-colors mb-5">
      <i class="fas fa-arrow-left text-xs"></i>
      Kembali ke Katalog
    </a>

    {{-- Card Detail Buku --}}
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden mb-5">
      <div class="flex flex-col md:flex-row">

        {{-- Cover --}}
        <div class="md:w-64 flex-shrink-0 border-b md:border-b-0 md:border-r border-slate-100 self-stretch">
          @if($buku->cover)
            <img src="{{ asset('storage/' . $buku->cover) }}"
                 alt="Cover {{ $buku->judul }}"
                 class="w-full h-full object-cover">
          @else
            <div class="w-full h-full min-h-[200px] bg-slate-50 flex flex-col items-center justify-center gap-2">
              <i class="fas fa-book text-4xl text-slate-200"></i>
              <span class="text-xs text-slate-300">No Cover</span>
            </div>
          @endif
        </div>

        {{-- Info --}}
        <div class="flex-1 p-6 md:p-8">

          {{-- Judul & Kode --}}
          <div class="mb-6">
            <span class="inline-flex items-center gap-1 rounded-full bg-blue-50 px-2 py-0.5 text-[10px] font-semibold text-blue-600 mb-2">
              <i class="fas fa-tag text-[9px]"></i>
              {{ $buku->kategori?->nama_kategori ?? 'Tanpa Kategori' }}
            </span>
            <h2 class="font-display text-xl font-semibold text-slate-900 leading-snug">{{ $buku->judul }}</h2>
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

      {{-- Header Rating --}}
        <div class="px-6 py-5 border-b border-slate-100 flex items-center justify-between">
        <div>
            <h3 class="font-display text-base font-semibold text-slate-800">Rating & Ulasan</h3>
            <p class="text-xs text-slate-400 mt-0.5">
            {{ $buku->ratings->count() }} ulasan ·
            rata-rata
            <span class="text-amber-500 font-semibold">{{ $buku->averageRating() }} ★</span>
            </p>
        </div>

        @if($pernahPinjam)
            <a href="{{ route('user.rating.index', $buku->id) }}"
            class="inline-flex items-center gap-1.5 rounded-xl bg-blue-700 hover:bg-blue-800 px-4 py-2 text-xs font-semibold text-white transition-colors">
            <i class="fas fa-star text-xs"></i>
            Tulis Ulasan
            </a>
        @endif
        </div>
      </div>

      {{-- List Ulasan --}}
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
              </div>

              @if($rating->komentar)
                <p class="text-sm text-slate-500 leading-relaxed">{{ $rating->komentar }}</p>
              @else
                <p class="text-xs text-slate-300 italic">Tidak ada komentar.</p>
              @endif

              <p class="text-[11px] text-slate-300 mt-1">{{ $rating->created_at->format('d M Y') }}</p>
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
</div>