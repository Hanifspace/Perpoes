@extends('layouts.app')

@section('contents')
<div class="w-full px-6 py-6">

    {{-- Header --}}
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">Data Buku</h1>

        <a href="{{ route('admin.buku.create') }}"
           class="px-4 py-2 rounded-lg bg-slate-900 text-white hover:bg-slate-800 text-sm">
            + Tambah Buku
        </a>
    </div>

    {{-- Flash Message --}}
    @if (session('success'))
        <div class="mb-4 rounded-lg border border-green-200 bg-green-50 px-4 py-2 text-green-700 text-sm">
            {{ session('success') }}
        </div>
    @endif

    {{-- Table --}}
    <div class="bg-white rounded-xl shadow-sm ring-1 ring-slate-200">
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="bg-slate-100 text-slate-700">
                    <tr>
                        <th class="text-left font-semibold px-4 py-3 w-12">No</th>
                        <th class="text-left font-semibold px-4 py-3">Cover</th>
                        <th class="text-left font-semibold px-4 py-3">Kode Buku</th>
                        <th class="text-left font-semibold px-4 py-3">Judul</th>
                        <th class="text-left font-semibold px-4 py-3">Kategori</th>
                        <th class="text-left font-semibold px-4 py-3">Penulis</th>
                        <th class="text-left font-semibold px-4 py-3">Penerbit</th>
                        <th class="text-left font-semibold px-4 py-3">Tahun</th>
                        <th class="text-left font-semibold px-4 py-3">Stok</th>
                        <th class="text-left font-semibold px-16 py-3">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-200">
                    @forelse ($bukus as $buku)
                    <tr class="hover:bg-slate-50">
                        {{-- No --}}
                        <td class="px-4 py-3 text-slate-600">
                            {{ $loop->iteration }}
                        </td>

                        {{-- Cover --}}
                        <td class="px-4 py-3">
                            @if($buku->cover)
                                <img
                                    src="{{ asset('storage/' . $buku->cover) }}"
                                    alt="cover"
                                    class="w-10 h-14 object-cover rounded border border-slate-200"
                                />
                            @else
                                <div class="w-10 h-14 rounded border border-dashed border-slate-300 bg-slate-50"></div>
                            @endif
                        </td>

                        <td class="px-4 py-3 font-medium">{{ $buku->kode_buku }}</td>
                        <td class="px-4 py-3">{{ $buku->judul }}</td>
                        <td class="px-4 py-3">{{ $buku->kategori?->nama_kategori }}</td>
                        <td class="px-4 py-3">{{ $buku->penulis }}</td>
                        <td class="px-4 py-3">{{ $buku->penerbit }}</td>
                        <td class="px-4 py-3">{{ $buku->tahun_terbit }}</td>
                        <td class="px-4 py-3">{{ $buku->stok }}</td>
                        
                        <td class="px-4 py-3">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('admin.buku.show', $buku->id) }}"
                                   class="px-3 py-1.5 rounded-lg bg-slate-200 text-slate-800 hover:bg-slate-300">
                                    Detail
                                </a>

                                <a href="{{ route('admin.buku.edit', $buku->id) }}"
                                   class="px-3 py-1.5 rounded-lg bg-slate-900 text-white hover:bg-slate-800">
                                    Edit
                                </a>

                                <form action="{{ route('admin.buku.destroy', $buku->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin mau hapus buku ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="px-3 py-1.5 rounded-lg bg-red-600 text-white hover:bg-red-700">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10" class="px-4 py-6 text-center text-slate-500">
                            Belum ada data buku.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
