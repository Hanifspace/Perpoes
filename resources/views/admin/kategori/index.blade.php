@extends('layouts.app')

@section('contents')
<div class="w-full px-6 py-6">

    {{-- Header --}}
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">Daftar Kategori</h1>

        <a href="{{ route('admin.kategori.create') }}"
           class="px-4 py-2 rounded-lg bg-slate-900 text-white hover:bg-slate-800 text-sm">
            + Tambah Kategori
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
                        <th class="text-left font-semibold px-4 py-3">Nama Kategori</th>

                        {{-- Aksi: teks rata kiri tapi sejajar ujung kiri tombol Edit --}}
                        <th class="px-4 py-3">
                            <div class="flex justify-end">
                                <span class="w-[140px] text-left font-semibold text-slate-700">Aksi</span>
                            </div>
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-200">
                    @forelse ($kategoris as $kategori)
                    <tr class="hover:bg-slate-50">
                        <td class="px-4 py-3 text-slate-600">{{ $loop->iteration }}</td>
                        <td class="px-4 py-3 font-medium">{{ $kategori->nama_kategori }}</td>

                        <td class="px-4 py-3">
                            <div class="flex justify-end">
                                <div class="w-[140px] flex gap-2">
                                    <a href="{{ route('admin.kategori.edit', $kategori->id) }}"
                                       class="px-3 py-1.5 rounded-lg bg-slate-900 text-white hover:bg-slate-800">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.kategori.destroy', $kategori->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin mau hapus kategori ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="px-3 py-1.5 rounded-lg bg-red-600 text-white hover:bg-red-700">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="px-4 py-6 text-center text-slate-500">
                            Belum ada kategori.
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>

</div>
@endsection
