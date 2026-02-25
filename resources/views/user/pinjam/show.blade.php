@include('nav')

<div class="w-full max-w-4xl mx-auto px-6 py-10">

    {{-- Header --}}
    <div class="mb-4    ">
        <h1 class="text-xl font-semibold text-slate-800 tracking-tight">Detail Buku</h1>
        <p class="text-sm text-slate-400 mt-0.5">Informasi lengkap data buku</p>
    </div>

    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
        <div class="flex flex-col md:flex-row gap-0">

            {{-- Cover --}}
            <div class="md:w-56 flex-shrink-0 bg-slate-50 border-b md:border-b-0 md:border-r border-slate-100 flex items-start justify-center p-6">
                @if($buku->cover)
                    <img src="{{ asset('storage/' . $buku->cover) }}"
                         alt="Cover {{ $buku->judul }}"
                         class="w-36 h-52 object-cover rounded-lg shadow-md ring-1 ring-slate-200" />
                @else
                    <div class="w-36 h-52 rounded-lg border-2 border-dashed border-slate-200 bg-white flex flex-col items-center justify-center gap-2">
                        <svg class="w-8 h-8 text-slate-300" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.966 8.966 0 00-6 2.292m0-14.25v14.25"/>
                        </svg>
                        <span class="text-xs text-slate-300">No Cover</span>
                    </div>
                @endif
            </div>

            {{-- Info --}}
            <div class="flex-1 p-6 md:p-8">

                {{-- Judul & Kode --}}
                <div class="mb-6">
                    <h2 class="text-lg font-semibold text-slate-800 leading-snug">{{ $buku->judul }}</h2>
                    <span class="inline-block mt-1.5 text-xs font-mono bg-slate-100 text-slate-500 px-2 py-0.5 rounded">{{ $buku->kode_buku }}</span>
                </div>

                {{-- Grid metadata --}}
                <div class="grid grid-cols-2 sm:grid-cols-3 gap-x-6 gap-y-4 mb-6">

                    <div>
                        <p class="text-[11px] font-medium uppercase tracking-wider text-slate-400 mb-0.5">Penulis</p>
                        <p class="text-sm text-slate-700">{{ $buku->penulis ?? '-' }}</p>
                    </div>

                    <div>
                        <p class="text-[11px] font-medium uppercase tracking-wider text-slate-400 mb-0.5">Penerbit</p>
                        <p class="text-sm text-slate-700">{{ $buku->penerbit ?? '-' }}</p>
                    </div>

                    <div>
                        <p class="text-[11px] font-medium uppercase tracking-wider text-slate-400 mb-0.5">Tahun Terbit</p>
                        <p class="text-sm text-slate-700">{{ $buku->tahun_terbit ?? '-' }}</p>
                    </div>

                    <div>
                        <p class="text-[11px] font-medium uppercase tracking-wider text-slate-400 mb-0.5">Kategori</p>
                        <p class="text-sm text-slate-700">{{ $buku->kategori?->nama_kategori ?? '-' }}</p>
                    </div>

                    <div>
                        <p class="text-[11px] font-medium uppercase tracking-wider text-slate-400 mb-0.5">Stok</p>
                        <p class="text-sm text-slate-700">
                            <span class="inline-flex items-center gap-1">
                                <span class="w-1.5 h-1.5 rounded-full {{ $buku->stok > 0 ? 'bg-emerald-400' : 'bg-rose-400' }}"></span>
                                {{ $buku->stok }} 
                            </span>
                        </p>
                    </div>

                </div>

                {{-- Sinopsis --}}
                @if($buku->sinopsis)
                <div class="pt-5 border-t border-slate-100">
                    <p class="text-[11px] font-medium uppercase tracking-wider text-slate-400 mb-2">Sinopsis</p>
                    <p class="text-sm text-slate-600 leading-relaxed whitespace-pre-line">{{ $buku->sinopsis }}</p>
                </div>
                @endif

                {{-- Timestamps --}}
                <div class="mt-6 pt-4 border-t border-slate-100 flex flex-wrap gap-x-5 gap-y-1">
                    <p class="text-xs text-slate-400">
                        Dibuat: <span class="text-slate-500">{{ $buku->created_at?->format('d M Y') }}</span>
                    </p>
                    <p class="text-xs text-slate-400">
                        Diperbarui: <span class="text-slate-500">{{ $buku->updated_at?->format('d M Y') }}</span>
                    </p>
                </div>

            </div>
        </div>
    </div>
</div>