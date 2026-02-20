@extends('layouts.app')

@section('contents')
<div class="w-full max-w-5xl mx-auto px-6 py-6">

    <div class="flex items-center justify-between mb-4">
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

    <div class="bg-white rounded-xl shadow-sm ring-1 ring-slate-200 p-5">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <div class="md:col-span-1">
                @if($buku->cover)
                    <img src="{{ asset('storage/' . $buku->cover) }}"
                         alt="cover"
                         class="w-full max-w-xs h-auto object-cover rounded-lg border border-slate-200" />
                @else
                    <div class="w-full max-w-xs h-72 rounded-lg border border-dashed border-slate-300 bg-slate-50"></div>
                @endif
            </div>

            <div class="md:col-span-2">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4">

                    <div>
                        <p class="text-xs text-slate-500">Judul</p>
                        <p class="text-sm font-medium text-slate-800">{{ $buku->judul }}</p>
                    </div>

                    <div>
                        <p class="text-xs text-slate-500">Kode Buku</p>
                        <p class="text-sm font-medium text-slate-800">{{ $buku->kode_buku }}</p>
                    </div>

                    <div>
                        <p class="text-xs text-slate-500">Kategori</p>
                        <p class="text-sm font-medium text-slate-800">{{ $buku->kategori?->nama_kategori }}</p>
                    </div>

                    <div>
                        <p class="text-xs text-slate-500">Tahun Terbit</p>
                        <p class="text-sm font-medium text-slate-800">{{ $buku->tahun_terbit }}</p>
                    </div>

                    <div>
                        <p class="text-xs text-slate-500">Penulis</p>
                        <p class="text-sm font-medium text-slate-800">{{ $buku->penulis }}</p>
                    </div>

                    <div>
                        <p class="text-xs text-slate-500">Penerbit</p>
                        <p class="text-sm font-medium text-slate-800">{{ $buku->penerbit }}</p>
                    </div>

                    <div>
                        <p class="text-xs text-slate-500">Stok</p>
                        <p class="text-sm font-medium text-slate-800">{{ $buku->stok }}</p>
                    </div>

                </div>

                {{-- Deskripsi --}}
                <div class="mt-6 pt-4 border-t border-slate-200">
                    <p class="text-xs text-slate-500 mb-2">Deskripsi</p>
                    <p class="text-sm text-slate-800 whitespace-pre-line">
                        {{ $buku->sinopsis ?? '-' }}
                    </p>
                </div>

                <div class="mt-6 pt-4 border-t border-slate-200">
                    <p class="text-xs text-slate-500">
                        Dibuat: <span class="text-slate-700">{{ $buku->created_at?->format('d M Y,') }}</span> •
                        Diupdate: <span class="text-slate-700">{{ $buku->updated_at?->format('d M Y,') }}</span>
                    </p>
                </div>

            </div>

        </div>
    </div>

</div>
@endsection
