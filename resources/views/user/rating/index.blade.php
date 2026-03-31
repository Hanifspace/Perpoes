@include('nav')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lora:wght@500;600&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
  body { font-family: 'DM Sans', sans-serif; }
  .font-display { font-family: 'Lora', serif; }

  .star-group { display: flex; flex-direction: row-reverse; gap: .35rem; }
  .star-group input { display: none; }
  .star-group label {
    font-size: 2.2rem;
    color: #e2e8f0;
    cursor: pointer;
    transition: color .15s;
  }
  .star-group label:hover,
  .star-group label:hover ~ label,
  .star-group input:checked ~ label {
    color: #f59e0b;
  }
</style>

<div class="min-h-screen bg-slate-50">
  <div class="max-w-3xl mx-auto px-6 py-8">

    {{-- Header Banner --}}
    <div class="rounded-2xl bg-gradient-to-br from-blue-700 to-blue-900 px-8 py-8 mb-8 flex flex-col items-center text-center gap-2">
      <p class="text-xs font-semibold tracking-widest text-blue-300 uppercase">Perpoestakaan</p>
      <h1 class="font-display text-3xl text-white leading-tight">Beri Rating</h1>
      <p class="text-blue-200 text-sm mt-0.5">Bagikan pengalamanmu membaca buku ini.</p>
    </div>

    {{-- Tombol Kembali --}}
    <a href="{{ route('user.riwayat.index') }}"
       class="inline-flex items-center gap-1.5 text-xs font-semibold text-slate-500 hover:text-blue-700 transition-colors mb-5">
      <i class="fas fa-arrow-left text-xs"></i>
      Kembali ke Riwayat
    </a>

    {{-- Info Buku --}}
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-4 mb-4 flex gap-4">
      <div class="w-14 h-20 rounded-xl overflow-hidden flex-shrink-0 bg-slate-100">
        <img
          src="{{ asset('storage/' . $buku->cover) }}"
          alt="{{ $buku->judul }}"
          class="w-full h-full object-cover"
        >
      </div>
      <div class="flex flex-col justify-center">
        <span class="inline-flex w-fit items-center gap-1 rounded-full bg-blue-50 px-2 py-0.5 text-[10px] font-semibold text-blue-600 mb-1.5">
          <i class="fas fa-tag text-[9px]"></i>
          {{ $buku->kategori?->nama_kategori ?? 'Tanpa Kategori' }}
        </span>
        <p class="font-display font-semibold text-slate-900 text-sm leading-snug">{{ $buku->judul }}</p>
        <p class="text-[11px] text-slate-400 mt-0.5">{{ $buku->penulis }}</p>
      </div>
    </div>

    {{-- Form Rating --}}
    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6">

      {{-- Alert Success --}}
      @if(session('success'))
        <div class="mb-5 flex items-center gap-3 rounded-xl border border-green-100 bg-green-50 px-4 py-3 text-sm text-green-700">
          <i class="fas fa-check-circle text-green-500 flex-shrink-0"></i>
          {{ session('success') }}
        </div>
      @endif

      {{-- Alert Error --}}
      @if($errors->any())
        <div class="mb-5 flex items-center gap-3 rounded-xl border border-red-100 bg-red-50 px-4 py-3 text-sm text-red-600">
          <i class="fas fa-exclamation-circle text-red-400 flex-shrink-0"></i>
          {{ $errors->first() }}
        </div>
      @endif

      <form action="{{ route('user.rating.store', $buku->id) }}" method="POST">
        @csrf

        {{-- Bintang --}}
        <div class="mb-6">
          <p class="text-sm font-semibold text-slate-700 mb-3">Pilih Rating</p>
          <div class="star-group justify-start">
            @for($i = 5; $i >= 1; $i--)
              <input type="radio" name="rating" id="star{{ $i }}" value="{{ $i }}"
                {{ old('rating', $sudahRating?->rating) == $i ? 'checked' : '' }}>
              <label for="star{{ $i }}" title="{{ $i }} bintang">★</label>
            @endfor
          </div>
          @error('rating')
            <p class="text-xs text-red-500 mt-1.5">{{ $message }}</p>
          @enderror
        </div>

        {{-- Komentar --}}
        <div class="mb-6">
          <label class="text-sm font-semibold text-slate-700 mb-2 block">
            Komentar
            <span class="text-slate-400 font-normal">(opsional)</span>
          </label>
          <textarea
            name="komentar"
            rows="4"
            placeholder="Ceritakan pengalamanmu membaca buku ini..."
            class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm text-slate-700 resize-none focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 transition-colors"
          >{{ old('komentar', $sudahRating?->komentar) }}</textarea>
        </div>

        {{-- Submit --}}
        <button
          type="submit"
          class="w-full py-3 rounded-xl bg-blue-700 hover:bg-blue-800 text-white text-sm font-semibold transition-colors"
        >
          <i class="fas fa-star text-xs mr-1.5"></i>
          {{ $sudahRating ? 'Perbarui Rating' : 'Kirim Rating' }}
        </button>

      </form>
    </div>

  </div>
</div>