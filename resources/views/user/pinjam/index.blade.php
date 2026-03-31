@include('nav')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lora:wght@500;600&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
  body { font-family: 'DM Sans', sans-serif; }
  .font-display { font-family: 'Lora', serif; }
  .card-cover { padding-bottom: 148%; }
  .line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }
</style>

<div class="min-h-screen bg-slate-50">
  <div class="max-w-7xl mx-auto px-6 py-8">

    {{-- Header Banner --}}
    <div class="rounded-2xl bg-gradient-to-br from-blue-700 to-blue-900 px-8 py-8 mb-8 flex flex-col items-center text-center gap-5">
      <div>
        <p class="text-xs font-semibold tracking-widest text-blue-300 uppercase mb-2">Perpoestakaan</p>
        <h1 class="font-display text-3xl text-white leading-tight">Katalog Buku</h1>
        <p class="text-blue-200 text-sm mt-1.5">Temukan buku favorit Anda — lihat detail atau langsung pinjam.</p>
      </div>

      {{-- Search Bar --}}
      <form method="GET" action="{{ route('user.pinjam.index') }}" class="w-full max-w-md">
        <div class="relative">
          <span class="absolute inset-y-0 left-4 flex items-center text-slate-400 pointer-events-none">
            <i class="fas fa-search text-sm"></i>
          </span>
          <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari judul atau penulis..."
            class="w-full rounded-xl border-0 bg-white py-3 pl-11 pr-20 text-sm text-slate-700 shadow focus:outline-none focus:ring-2 focus:ring-blue-300 transition-all"
          >
          @if(request('search'))
            <a href="{{ route('user.pinjam.index') }}"
               class="absolute inset-y-0 right-4 flex items-center text-slate-400 hover:text-slate-600 transition-colors">
              <i class="fas fa-times text-sm"></i>
            </a>
          @else
            <button type="submit"
              class="absolute inset-y-0 right-2 my-1.5 px-4 rounded-lg bg-blue-700 text-white text-xs font-semibold hover:bg-blue-800 transition-colors">
              Cari
            </button>
          @endif
        </div>
      </form>
    </div>

    {{-- Success Alert --}}
    @if(session('success'))
      <div class="mb-6 flex items-center gap-3 rounded-xl border border-green-100 bg-green-50 px-4 py-3 text-sm text-green-700">
        <i class="fas fa-check-circle text-green-500 flex-shrink-0"></i>
        {{ session('success') }}
      </div>
    @endif

    {{-- Grid --}}
    <div class="grid gap-5 grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6">
      @forelse ($bukus as $buku)
        @php
          $coverUrl = $buku->cover
            ? asset('storage/' . $buku->cover)
            : 'https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?auto=format&fit=crop&w=400&q=70';
          $kategori    = $buku->kategori?->nama_kategori ?? 'Tanpa Kategori';
          $stok        = (int) $buku->stok;
          $avgRating   = $buku->ratings->count() > 0 ? round($buku->ratings->avg('rating'), 1) : null;
          $totalUlasan = $buku->ratings->count();
          $tersedia    = $stok > 0;
        @endphp

        <article class="group flex flex-col overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-sm hover:shadow-md transition-shadow duration-200">

          {{-- Cover --}}
          <div class="relative w-full card-cover">
            <img
              src="{{ $coverUrl }}"
              alt="Cover {{ $buku->judul }}"
              class="absolute inset-0 h-full w-full object-cover"
            >

            {{-- Overlay gelap bawah --}}
            <div class="pointer-events-none absolute inset-x-0 bottom-0 h-20 bg-gradient-to-t from-black/50 to-transparent"></div>

            {{-- Badge stok --}}
            <span class="absolute left-2.5 top-2.5 inline-flex items-center gap-1 rounded-full px-2 py-0.5 text-[10px] font-bold text-white
              {{ $tersedia ? 'bg-emerald-500' : 'bg-rose-500' }}">
              <span class="h-1.5 w-1.5 rounded-full bg-white/80"></span>
              {{ $tersedia ? $stok : '0' }}
            </span>

            {{-- Tombol Favorit --}}
            <form action="{{ route('user.favorit.store', $buku->id) }}" method="POST" class="absolute right-2.5 top-2.5">
              @csrf
              <button
                type="submit"
                title="Tambah ke favorit"
                class="inline-flex h-7 w-7 items-center justify-center rounded-lg bg-white/90 shadow-sm hover:bg-white transition-colors"
              >
                <i class="fas fa-heart text-xs {{ in_array($buku->id, $favoritIds) ? 'text-rose-500' : 'text-slate-300' }}"></i>
              </button>
            </form>
          </div>

          {{-- Info --}}
          <div class="flex flex-col flex-1 p-3.5">

            {{-- Kategori --}}
            <span class="inline-flex w-fit items-center gap-1 rounded-full bg-blue-50 px-2 py-0.5 text-[10px] font-semibold text-blue-600 mb-2">
              <i class="fas fa-tag text-[9px]"></i>
              {{ $kategori }}
            </span>

            {{-- Judul --}}
            <h3 class="font-display text-sm font-semibold leading-snug text-slate-900 group-hover:text-blue-700 line-clamp-2 transition-colors duration-150">
              {{ $buku->judul }}
            </h3>

            {{-- Penulis --}}
            <p class="mt-1 text-[11px] text-slate-400 truncate">{{ $buku->penulis }}</p>

            {{-- Rating --}}
            <div class="mt-2">
              @if($avgRating)
                <div class="flex items-center gap-1">
                  <span class="text-amber-400 text-[11px] leading-none tracking-tight">
                    @for($i = 1; $i <= 5; $i++)
                      {{ $i <= round($avgRating) ? '★' : '☆' }}
                    @endfor
                  </span>
                  <span class="text-[10px] font-semibold text-slate-600">{{ $avgRating }}</span>
                  <span class="text-[10px] text-slate-400">({{ $totalUlasan }})</span>
                </div>
              @else
                <span class="text-[10px] text-slate-300 italic">Belum ada rating</span>
              @endif
            </div>

            {{-- Tahun & Stok --}}
            <div class="mt-2 flex items-center justify-between text-[11px]">
              <span class="text-slate-400">{{ $buku->tahun_terbit }}</span>
              <span class="font-semibold {{ $tersedia ? 'text-emerald-600' : 'text-rose-500' }}">
                {{ $tersedia ? $stok . ' stok' : 'Habis' }}
              </span>
            </div>

            {{-- Spacer --}}
            <div class="flex-1"></div>

            {{-- Tombol Aksi --}}
            <div class="mt-3 flex flex-col gap-1.5">
              <a
                href="{{ $tersedia ? route('user.pinjam.create', $buku->id) : '#' }}"
                class="inline-flex items-center justify-center gap-1.5 rounded-xl py-2 text-xs font-semibold text-white transition-colors duration-150
                  {{ $tersedia ? 'bg-blue-700 hover:bg-blue-800' : 'bg-slate-200 text-slate-400 pointer-events-none' }}"
                @if(!$tersedia) tabindex="-1" aria-disabled="true" @endif
              >
                <i class="fas fa-book-reader text-xs"></i>
                Pinjam
              </a>

              <a
                href="{{ route('user.pinjam.show', $buku->id) }}"
                class="inline-flex items-center justify-center gap-1.5 rounded-xl border border-slate-200 py-2 text-xs font-semibold text-slate-600 hover:bg-slate-50 transition-colors duration-150"
              >
                <i class="fas fa-info-circle text-xs"></i>
                Detail
              </a>
            </div>

          </div>
        </article>

      @empty
        <div class="col-span-full rounded-2xl border border-dashed border-slate-200 bg-white p-12 text-center">
          <i class="fas fa-book-open text-3xl text-slate-200 mb-3 block"></i>
          <p class="text-sm text-slate-400">Belum ada buku yang tersedia.</p>
        </div>
      @endforelse
    </div>

  </div>
</div>