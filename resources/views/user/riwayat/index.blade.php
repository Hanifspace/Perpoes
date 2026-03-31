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
  <div class="max-w-3xl mx-auto px-6 py-8">

    {{-- Header Banner --}}
    <div class="rounded-2xl bg-gradient-to-br from-blue-700 to-blue-900 px-8 py-8 mb-8 flex flex-col items-center text-center gap-2">
      <p class="text-xs font-semibold tracking-widest text-blue-300 uppercase">Perpoestakaan</p>
      <h1 class="font-display text-3xl text-white leading-tight">Riwayat Peminjaman</h1>
      <p class="text-blue-200 text-sm mt-0.5">Daftar buku yang pernah kamu pinjam.</p>
    </div>

    {{-- List --}}
    <div class="flex flex-col gap-4">
      @forelse ($bukus as $buku)

        @php
          $status = $buku->status;
        @endphp

        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5 flex gap-4">

          {{-- Cover --}}
          <div class="flex-shrink-0 w-16 h-[88px] rounded-xl overflow-hidden bg-slate-100">
            <img
              src="{{ asset('storage/' . $buku->buku->cover) }}"
              alt="{{ $buku->buku->judul }}"
              class="w-full h-full object-cover"
            >
          </div>

          {{-- Content --}}
          <div class="flex-1 min-w-0 flex flex-col justify-between">

            {{-- Top: judul + badge --}}
            <div>
              <div class="flex items-start justify-between gap-3 mb-1.5">
                <h2 class="font-display text-sm font-semibold text-slate-900 leading-snug line-clamp-2">
                  {{ $buku->buku->judul }}
                </h2>

                {{-- Status Badge --}}
                @if($status == 'dipinjam')
                  <span class="flex-shrink-0 inline-flex items-center gap-1 rounded-full bg-amber-50 border border-amber-200 px-2.5 py-0.5 text-[11px] font-semibold text-amber-700">
                    <span class="h-1.5 w-1.5 rounded-full bg-amber-400"></span>
                    Dipinjam
                  </span>
                @elseif($status == 'dikembalikan')
                  <span class="flex-shrink-0 inline-flex items-center gap-1 rounded-full bg-emerald-50 border border-emerald-200 px-2.5 py-0.5 text-[11px] font-semibold text-emerald-700">
                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-400"></span>
                    Dikembalikan
                  </span>
                @elseif($status == 'menunggu_pengembalian')
                  <span class="flex-shrink-0 inline-flex items-center gap-1 rounded-full bg-blue-50 border border-blue-200 px-2.5 py-0.5 text-[11px] font-semibold text-blue-600">
                    <span class="h-1.5 w-1.5 rounded-full bg-blue-400"></span>
                    Menunggu
                  </span>
                @else
                  <span class="flex-shrink-0 inline-flex items-center gap-1 rounded-full bg-slate-100 border border-slate-200 px-2.5 py-0.5 text-[11px] font-semibold text-slate-500">
                    <span class="h-1.5 w-1.5 rounded-full bg-slate-400"></span>
                    {{ ucfirst($status) }}
                  </span>
                @endif
              </div>

              {{-- Meta --}}
              <div class="flex flex-wrap items-center gap-x-2 gap-y-0.5 text-[11px] text-slate-400 mb-2.5">
                <span>{{ $buku->buku->penulis }}</span>
                <span class="text-slate-200">·</span>
                <span>{{ $buku->buku->kategori->nama_kategori }}</span>
                <span class="text-slate-200">·</span>
                <span>{{ $buku->buku->tahun_terbit }}</span>
              </div>

              {{-- Tanggal --}}
              <div class="flex flex-wrap gap-4 text-[11px]">
                <span class="text-slate-400">
                  Pinjam:
                  <span class="font-semibold text-slate-600 ml-0.5">{{ $buku->tanggal_peminjaman }}</span>
                </span>
                <span class="text-slate-400">
                  Kembali:
                  <span class="font-semibold text-slate-600 ml-0.5">{{ $buku->tanggal_pengembalian }}</span>
                </span>
              </div>
            </div>

            {{-- Actions --}}
            <div class="flex flex-wrap gap-2 mt-3">
              @if($status == 'dipinjam')
                <a
                  href="{{ route('user.riwayat.bukti.peminjaman', $buku->id) }}"
                  target="_blank"
                  class="inline-flex items-center gap-1.5 rounded-xl border border-slate-200 px-3 py-1.5 text-xs font-semibold text-slate-600 hover:bg-slate-50 transition-colors"
                >
                  <i class="fas fa-file-alt text-xs"></i>
                  Bukti Peminjaman
                </a>
                <form action="{{ route('user.riwayat.ajukan.pengembalian', $buku->id) }}" method="POST">
                  @csrf
                  @method('PUT')
                  <button
                    type="submit"
                    class="inline-flex items-center gap-1.5 rounded-xl bg-blue-700 hover:bg-blue-800 px-3 py-1.5 text-xs font-semibold text-white transition-colors"
                  >
                    <i class="fas fa-undo text-xs"></i>
                    Ajukan Pengembalian
                  </button>
                </form>
              @endif

              @if($status == 'menunggu_pengembalian')
                <span class="inline-flex items-center gap-1.5 rounded-xl border border-slate-200 px-3 py-1.5 text-xs font-semibold text-slate-400 cursor-default">
                  <i class="fas fa-clock text-xs"></i>
                  Menunggu Konfirmasi...
                </span>
              @endif

              @if($status == 'dikembalikan')
                <a
                  href="{{ route('user.rating.index', $buku->buku_id) }}"
                  class="inline-flex items-center gap-1.5 rounded-xl border border-slate-200 px-3 py-1.5 text-xs font-semibold text-slate-600 hover:bg-slate-50 transition-colors"
                >
                  <i class="fas fa-star text-xs text-amber-400"></i>
                  Beri Rating
                </a>
              @endif
            </div>

          </div>
        </div>

      @empty
        <div class="rounded-2xl border border-dashed border-slate-200 bg-white p-12 text-center">
          <i class="fas fa-book-open text-3xl text-slate-200 mb-3 block"></i>
          <p class="text-sm text-slate-400">Belum ada buku yang dipinjam.</p>
        </div>
      @endforelse
    </div>

  </div>
</div>