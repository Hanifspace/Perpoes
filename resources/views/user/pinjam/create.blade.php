@include('nav')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lora:wght@500;600&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
  body { font-family: 'DM Sans', sans-serif; }
  .font-display { font-family: 'Lora', serif; }
  .line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }
</style>

<div class="min-h-screen bg-slate-50">
  <div class="max-w-5xl mx-auto px-6 py-8">

    {{-- Header Banner --}}
    <div class="rounded-2xl bg-gradient-to-br from-blue-700 to-blue-900 px-8 py-8 mb-8 flex flex-col items-center text-center gap-2">
      <p class="text-xs font-semibold tracking-widest text-blue-300 uppercase">Perpoestakaan</p>
      <h1 class="font-display text-3xl text-white leading-tight">Form Peminjaman</h1>
      <p class="text-blue-200 text-sm mt-0.5">Isi tanggal peminjaman dan pengembalian.</p>
    </div>

    {{-- Tombol Kembali --}}
    <a href="{{ route('user.pinjam.index') }}"
       class="inline-flex items-center gap-1.5 text-xs font-semibold text-slate-500 hover:text-blue-700 transition-colors mb-5">
      <i class="fas fa-arrow-left text-xs"></i>
      Kembali ke Katalog
    </a>

    {{-- Error --}}
    @if($errors->any())
      <div class="mb-5 rounded-xl border border-red-100 bg-red-50 px-4 py-3 text-sm text-red-600">
        @foreach($errors->all() as $error)
          <p class="flex items-center gap-2"><i class="fas fa-exclamation-circle text-red-400 flex-shrink-0"></i>{{ $error }}</p>
        @endforeach
      </div>
    @endif

    {{-- 2 Kolom: Info Buku | Form --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">

      {{-- Kolom Kiri: Info Buku --}}
      <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 flex flex-col gap-5">

        {{-- Cover + judul --}}
        <div class="flex gap-4">
          <div class="w-24 h-32 rounded-xl overflow-hidden flex-shrink-0 bg-slate-100">
            @if($buku->cover)
              <img src="{{ asset('storage/' . $buku->cover) }}"
                   alt="{{ $buku->judul }}"
                   class="w-full h-full object-cover">
            @else
              <div class="w-full h-full flex items-center justify-center text-slate-300 text-[10px]">No Cover</div>
            @endif
          </div>
          <div class="flex-1 min-w-0">
            <span class="inline-flex items-center gap-1 rounded-full bg-blue-50 px-2 py-0.5 text-[10px] font-semibold text-blue-600 mb-2">
              <i class="fas fa-tag text-[9px]"></i>
              {{ $buku->kategori?->nama_kategori ?? 'Tanpa Kategori' }}
            </span>
            <h2 class="font-display font-semibold text-slate-900 text-base leading-snug">{{ $buku->judul }}</h2>
            <p class="text-xs text-slate-400 mt-1">{{ $buku->penulis }}</p>
          </div>
        </div>

        {{-- Detail buku --}}
        <div class="grid grid-cols-2 gap-x-4 gap-y-2.5 text-xs border-t border-slate-50 pt-4">
          <div>
            <p class="text-slate-400 mb-0.5">Kode Buku</p>
            <p class="font-mono font-semibold text-slate-700">{{ $buku->kode_buku }}</p>
          </div>
          <div>
            <p class="text-slate-400 mb-0.5">Penerbit</p>
            <p class="font-medium text-slate-700 truncate">{{ $buku->penerbit }}</p>
          </div>
          <div>
            <p class="text-slate-400 mb-0.5">Tahun Terbit</p>
            <p class="font-medium text-slate-700">{{ $buku->tahun_terbit }}</p>
          </div>
          <div>
            <p class="text-slate-400 mb-0.5">Stok</p>
            <p class="font-semibold {{ $buku->stok > 0 ? 'text-emerald-600' : 'text-rose-500' }}">
              {{ $buku->stok }} tersedia
            </p>
          </div>
        </div>

        {{-- Sinopsis --}}
        @if($buku->sinopsis)
          <div class="border-t border-slate-50 pt-4">
            <p class="text-xs font-semibold text-slate-500 mb-1.5">Sinopsis</p>
            <p class="text-xs text-slate-400 leading-relaxed line-clamp-2">{{ $buku->sinopsis }}</p>
          </div>
        @endif

      </div>

      {{-- Kolom Kanan: Form --}}
      <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6">
        <h2 class="text-sm font-semibold text-slate-700 mb-5">Detail Peminjaman</h2>

        <form action="{{ route('user.pinjam.store') }}" method="POST">
          @csrf
          <input type="hidden" name="status" value="menunggu">
          <input type="hidden" name="user_id" value="{{ auth()->id() }}">
          <input type="hidden" name="buku_id" value="{{ $buku->id }}">

          {{-- Peminjam --}}
          <div class="mb-4">
            <label class="block text-xs font-semibold text-slate-600 mb-1.5">Peminjam</label>
            <input
              type="text"
              value="{{ auth()->user()->nama_lengkap }}"
              disabled
              class="w-full rounded-xl border border-slate-100 bg-slate-50 px-4 py-2.5 text-sm text-slate-400 cursor-not-allowed"
            >
          </div>

          {{-- Tanggal Peminjaman --}}
          <div class="mb-4">
            <label class="block text-xs font-semibold text-slate-600 mb-1.5">Tanggal Peminjaman</label>
            <input
              type="date"
              id="tanggal_peminjaman"
              name="tanggal_peminjaman"
              readonly
              required
              class="w-full rounded-xl border border-slate-100 bg-slate-50 px-4 py-2.5 text-sm text-slate-400 cursor-not-allowed"
            >
          </div>

          {{-- Tanggal Pengembalian --}}
          <div class="mb-6">
            <label class="block text-xs font-semibold text-slate-600 mb-1.5">Tanggal Pengembalian</label>
            <input
              type="date"
              id="tanggal_pengembalian"
              name="tanggal_pengembalian"
              required
              class="w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 transition-colors"
            >
            <p class="text-[11px] text-slate-400 mt-1.5">
              <i class="fas fa-info-circle mr-1"></i>
              Maksimal peminjaman 14 hari dari tanggal pinjam.
            </p>
          </div>

          {{-- Submit --}}
          <button
            type="submit"
            class="w-full py-3 rounded-xl bg-blue-700 hover:bg-blue-800 text-white text-sm font-semibold transition-colors"
          >
            <i class="fas fa-book-reader text-xs mr-1.5"></i>
            Ajukan Peminjaman
          </button>

        </form>
      </div>

    </div>

  </div>
</div>

<script>
  const today = new Date();
  const pad = n => String(n).padStart(2, '0');
  const todayStr = `${today.getFullYear()}-${pad(today.getMonth()+1)}-${pad(today.getDate())}`;

  const maxDate = new Date(today);
  maxDate.setDate(maxDate.getDate() + 14);
  const maxStr = `${maxDate.getFullYear()}-${pad(maxDate.getMonth()+1)}-${pad(maxDate.getDate())}`;

  document.getElementById('tanggal_peminjaman').value = todayStr;
  document.getElementById('tanggal_pengembalian').min = todayStr;
  document.getElementById('tanggal_pengembalian').max = maxStr;
</script>