@include('nav')

<div class="w-full px-4 py-6">
  <div class="flex items-end justify-between gap-4 mb-6">
    <div>
      <h1 class="text-2xl font-semibold text-slate-900">Buku Favorit</h1>
      <p class="text-slate-500 text-sm">Buku-buku yang sudah kamu pilih sebagai favorit.</p>
    </div>
  </div>

  @if (session('success'))
    <div class="mb-4 rounded-lg border border-green-200 bg-green-50 px-4 py-2 text-green-700 text-sm">
      {{ session('success') }}
    </div>
  @endif

  {{-- Grid Cards: 2 kolom mobile → 3 tablet → 4 lg → 6 xl --}}
  <div class="grid gap-4 grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6">
    @forelse ($bukus as $buku)
      @php
        $coverUrl = $buku->cover
          ? asset('storage/' . $buku->cover)
          : 'https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?auto=format&fit=crop&w=400&q=70';
        $kategori = $buku->kategori?->nama_kategori ?? 'Tanpa Kategori';
        $stok     = (int) $buku->stok;
      @endphp

      <article class="group flex flex-col overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm transition hover:-translate-y-0.5 hover:shadow-md">

        {{-- Cover (portrait 2:3 ratio) --}}
        <div class="relative w-full" style="padding-bottom: 150%;">
          <img src="{{ $coverUrl }}"
               alt="Cover {{ $buku->judul }}"
               class="absolute inset-0 h-full w-full object-cover">

          {{-- Stok badge --}}
          <span class="absolute left-2 top-2 inline-flex items-center gap-1 rounded-full px-2 py-0.5 text-[10px] font-bold text-white shadow
            {{ $stok > 0 ? 'bg-emerald-600/90' : 'bg-rose-600/90' }}">
            <span class="h-1.5 w-1.5 rounded-full bg-white/80"></span>
            {{ $stok > 0 ? $stok : '0' }}
          </span>

          {{-- Tombol Hapus Favorit --}}
          <form action="{{ route('user.favorit.destroy', $buku->id) }}" method="POST"
                class="absolute right-2 top-2">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-white/90 shadow transition hover:scale-110 active:scale-95"
                    title="Hapus dari favorit">
              <i class="fas fa-heart text-sm text-rose-500"></i>
            </button>
          </form>

          {{-- Gradient bottom overlay --}}
          <div class="pointer-events-none absolute inset-x-0 bottom-0 h-16 bg-gradient-to-t from-black/40 to-transparent"></div>
        </div>

        {{-- Info --}}
        <div class="flex flex-col flex-1 p-3">
          {{-- Kategori --}}
          <span class="mb-1 inline-flex w-fit items-center gap-1 rounded-full bg-indigo-50 px-2 py-0.5 text-[10px] font-semibold text-indigo-700">
            <i class="fas fa-tag text-[9px]"></i>
            {{ $kategori }}
          </span>

          {{-- Judul --}}
          <h3 class="text-sm font-bold leading-snug text-slate-900 group-hover:text-indigo-700 line-clamp-2 mt-0.5">
            {{ $buku->judul }}
          </h3>

          {{-- Penulis --}}
          <p class="mt-0.5 text-[11px] text-slate-500 truncate">
            {{ $buku->penulis }}
          </p>

          {{-- Tahun + stok row --}}
          <div class="mt-2 flex items-center justify-between text-[11px] text-slate-500">
            <span>{{ $buku->tahun_terbit }}</span>
            <span class="font-semibold {{ $stok > 0 ? 'text-emerald-600' : 'text-rose-600' }}">
              {{ $stok > 0 ? $stok . ' stok' : 'Habis' }}
            </span>
          </div>

          {{-- Tombol aksi --}}
          <div class="mt-3 flex flex-col gap-1.5">
            <a href="{{ route('user.pinjam.create', $buku->id) }}"
               class="inline-flex items-center justify-center gap-1.5 rounded-lg px-3 py-2 text-xs font-semibold text-white transition
                 {{ $stok > 0 ? 'bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800' : 'bg-slate-300 pointer-events-none' }}"
               {{ $stok > 0 ? '' : 'tabindex="-1" aria-disabled="true"' }}>
              <i class="fas fa-book-reader text-xs"></i>
              Pinjam
            </a>

            <a href="{{ route('user.pinjam.show', $buku->id) }}"
               class="inline-flex items-center justify-center gap-1.5 rounded-lg border border-slate-200 bg-white px-3 py-2 text-xs font-semibold text-slate-700 hover:bg-slate-50 transition">
              <i class="fas fa-info-circle text-xs"></i>
              Detail
            </a>
          </div>
        </div>

      </article>
    @empty
      <div class="col-span-full rounded-xl border border-slate-200 bg-white p-8 text-center text-slate-500">
        Belum ada buku favorit.
      </div>
    @endforelse
  </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">