@extends('layouts.app')

@section('contents')
<div class="w-full px-6 py-6">

    {{-- Header --}}
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-semibold">Data Pengembalian Buku</h1>
            <p class="text-sm text-slate-500 mt-0.5">Kelola dan perbarui status pengembalian buku perpustakaan</p>
        </div>

        <div class="flex items-center gap-3">
            {{-- Search --}}
            <form action="{{ route('admin.pengembalian.index') }}" method="GET" class="flex items-center gap-2">
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari nama peminjam/judul buku/kode buku..."
                    class="w-72 rounded-lg border border-slate-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-slate-300"/>
                <button type="submit" class="px-3 py-2 rounded-lg bg-slate-200 text-slate-800 hover:bg-slate-300 text-sm">Cari</button>
                @if(request('q'))
                    <a href="{{ route('admin.pengembalian.index') }}" class="px-3 py-2 rounded-lg bg-slate-100 text-slate-700 hover:bg-slate-200 text-sm">Reset</a>
                @endif
            </form>

            {{-- Export PDF --}}
            <a href="{{ route('admin.pengembalian.export', ['q' => request('q')]) }}"
               class="px-4 py-2 rounded-lg bg-emerald-600 text-white hover:bg-emerald-700 text-sm">
                Export PDF
            </a>
        </div>
    </div>

    {{-- Flash --}}
    @if(session('success'))
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
                        <th class="text-left font-semibold px-4 py-3">Nama Peminjam</th>
                        <th class="text-left font-semibold px-4 py-3">Judul Buku</th>
                        <th class="text-left font-semibold px-4 py-3">Kode Buku</th>
                        <th class="text-left font-semibold px-4 py-3">Tgl Pinjam</th>
                        <th class="text-left font-semibold px-4 py-3">Tgl Kembali</th>
                        <th class="text-left font-semibold px-4 py-3">Status & Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    @forelse ($pengembalian as $index => $pinjam)
                    @php $status = strtolower($pinjam->status); @endphp
                    <tr class="hover:bg-slate-50">
                        <td class="px-4 py-3 text-slate-400 font-semibold">{{ $index + 1 }}</td>
                        <td class="px-4 py-3 font-semibold text-slate-800">{{ $pinjam->user->name }}</td>
                        <td class="px-4 py-3 text-slate-700">{{ $pinjam->buku->judul }}</td>
                        <td class="px-4 py-3">
                            <span class="font-mono bg-slate-100 px-2 py-0.5 rounded text-xs">{{ $pinjam->buku->kode_buku }}</span>
                        </td>
                        <td class="px-4 py-3 text-slate-500 text-xs">{{ \Carbon\Carbon::parse($pinjam->tanggal_peminjaman)->format('d M Y') }}</td>
                        <td class="px-4 py-3 text-slate-500 text-xs">{{ \Carbon\Carbon::parse($pinjam->tanggal_pengembalian)->format('d M Y') }}</td>

                        <td class="px-4 py-3">
                            @if($status === 'menunggu')
                                <div class="flex items-center gap-2">
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-semibold bg-orange-50 text-orange-600 border border-orange-200">
                                        ⏳ Menunggu
                                    </span>

                                    <form action="{{ route('peminjaman.update', $pinjam->id) }}" method="POST">
                                        @csrf @method('PUT')
                                        <input type="hidden" name="status" value="dipinjam">
                                        <input type="hidden" name="user_id" value="{{ $pinjam->user->id }}">
                                        <input type="hidden" name="buku_id" value="{{ $pinjam->buku->id }}">
                                        <input type="hidden" name="tanggal_peminjaman" value="{{ $pinjam->tanggal_peminjaman }}">
                                        <input type="hidden" name="tanggal_pengembalian" value="{{ $pinjam->tanggal_pengembalian }}">
                                        <button type="submit"
                                            class="w-8 h-8 rounded-lg bg-green-100 text-green-700 hover:bg-green-600 hover:text-white text-sm font-bold transition-colors"
                                            title="Setujui">✓</button>
                                    </form>

                                    <form action="{{ route('peminjaman.update', $pinjam->id) }}" method="POST">
                                        @csrf @method('PUT')
                                        <input type="hidden" name="status" value="ditolak">
                                        <input type="hidden" name="user_id" value="{{ $pinjam->user->id }}">
                                        <input type="hidden" name="buku_id" value="{{ $pinjam->buku->id }}">
                                        <input type="hidden" name="tanggal_peminjaman" value="{{ $pinjam->tanggal_peminjaman }}">
                                        <input type="hidden" name="tanggal_pengembalian" value="{{ $pinjam->tanggal_pengembalian }}">
                                        <button type="submit"
                                            class="w-8 h-8 rounded-lg bg-red-100 text-red-600 hover:bg-red-600 hover:text-white text-sm font-bold transition-colors"
                                            title="Tolak">✕</button>
                                    </form>
                                </div>

                            @elseif($status === 'dikembalikan')
                                <div class="flex items-center gap-2">
                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-semibold bg-green-50 text-green-700 border border-green-200">
                                        ✅ Dikembalikan
                                    </span>
                                    <a href="{{ route('peminjaman.laporan', $pinjam->id) }}"
                                       class="px-3 py-1.5 rounded-lg bg-slate-200 text-slate-800 hover:bg-slate-300 text-xs font-semibold">
                                        📄 Laporan
                                    </a>
                                </div>

                            @else
                                <form action="{{ route('peminjaman.update', $pinjam->id) }}" method="POST" class="flex items-center gap-2">
                                    @csrf @method('PUT')
                                    <input type="hidden" name="user_id" value="{{ $pinjam->user->id }}">
                                    <input type="hidden" name="buku_id" value="{{ $pinjam->buku->id }}">
                                    <input type="hidden" name="tanggal_peminjaman" value="{{ $pinjam->tanggal_peminjaman }}">
                                    <input type="hidden" name="tanggal_pengembalian" value="{{ $pinjam->tanggal_pengembalian }}">

                                    <select name="status" class="rounded-lg border border-slate-300 px-2 py-1.5 text-xs font-semibold focus:outline-none focus:ring-2 focus:ring-slate-300 cursor-pointer">
                                        <option value="dipinjam"     {{ $status === 'dipinjam'     ? 'selected' : '' }}>📖 Dipinjam</option>
                                        <option value="dikembalikan" {{ $status === 'dikembalikan' ? 'selected' : '' }}>✅ Dikembalikan</option>
                                        <option value="ditolak"      {{ $status === 'ditolak'      ? 'selected' : '' }}>❌ Ditolak</option>
                                    </select>

                                    <button type="submit"
                                        class="px-3 py-1.5 rounded-lg bg-slate-900 text-white hover:bg-slate-700 text-xs font-semibold transition-colors">
                                        Simpan
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-4 py-6 text-center text-slate-500">Belum ada data pengembalian.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection