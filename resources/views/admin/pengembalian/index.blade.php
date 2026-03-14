@extends('layouts.app')

@section('contents')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap');

    * { box-sizing: border-box; }

    .peminjaman-wrapper {
        font-family: 'Plus Jakarta Sans', sans-serif;
        padding: 2rem;
        background: #f4f6fb;
        min-height: 100vh;
    }

    .peminjaman-header { margin-bottom: 1.5rem; }
    .peminjaman-header h2 {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1a1f36;
        margin: 0 0 0.25rem;
    }
    .peminjaman-header p { color: #6b7280; font-size: 0.875rem; margin: 0; }

    .table-card {
        background: #fff;
        border-radius: 16px;
        box-shadow: 0 2px 12px rgba(0,0,0,0.06);
        overflow: hidden;
    }

    .peminjaman-table { width: 100%; border-collapse: collapse; }

    .peminjaman-table thead tr { background: #1a1f36; color: #fff; }
    .peminjaman-table thead th {
        padding: 0.9rem 1.2rem;
        font-size: 0.78rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        text-align: left;
        white-space: nowrap;
    }

    .peminjaman-table tbody tr { border-bottom: 1px solid #f0f2f7; transition: background 0.15s; }
    .peminjaman-table tbody tr:hover { background: #f8f9fe; }
    .peminjaman-table tbody tr:last-child { border-bottom: none; }

    .peminjaman-table td {
        padding: 0.85rem 1.2rem;
        font-size: 0.875rem;
        color: #374151;
        vertical-align: middle;
    }

    .td-no { color: #9ca3af; font-weight: 600; font-size: 0.8rem; width: 50px; }
    .td-name { font-weight: 600; color: #1a1f36; }
    .td-kode {
        font-family: monospace;
        background: #f3f4f6;
        padding: 0.2rem 0.5rem;
        border-radius: 6px;
        font-size: 0.8rem;
        display: inline-block;
    }
    .td-date { color: #6b7280; font-size: 0.82rem; }

    /* ─── STATUS BADGE ─── */
    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.3rem;
        padding: 0.28rem 0.75rem;
        border-radius: 999px;
        font-size: 0.75rem;
        font-weight: 600;
        white-space: nowrap;
    }
    .badge-menunggu     { background: #fff7ed; color: #c2410c; border: 1.5px solid #fed7aa; }
    .badge-dipinjam     { background: #eff6ff; color: #1d4ed8; border: 1.5px solid #bfdbfe; }
    .badge-dikembalikan { background: #f0fdf4; color: #15803d; border: 1.5px solid #bbf7d0; }
    .badge-ditolak      { background: #fff1f2; color: #be123c; border: 1.5px solid #fecdd3; }

    /* ─── TOMBOL APPROVE / REJECT ─── */
    .aksi-menunggu { display: flex; align-items: center; gap: 0.5rem; }

    .btn-approve, .btn-reject {
        width: 34px;
        height: 34px;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1rem;
        font-weight: 700;
        transition: transform 0.15s, box-shadow 0.15s, background 0.15s;
        flex-shrink: 0;
    }

    .btn-approve {
        background: #dcfce7;
        color: #15803d;
        box-shadow: 0 1px 4px rgba(21,128,61,0.15);
    }
    .btn-approve:hover {
        background: #16a34a;
        color: #fff;
        transform: scale(1.12);
        box-shadow: 0 4px 12px rgba(21,128,61,0.35);
    }

    .btn-reject {
        background: #fee2e2;
        color: #dc2626;
        box-shadow: 0 1px 4px rgba(220,38,38,0.15);
    }
    .btn-reject:hover {
        background: #dc2626;
        color: #fff;
        transform: scale(1.12);
        box-shadow: 0 4px 12px rgba(220,38,38,0.35);
    }

    /* ─── DROPDOWN STATUS ─── */
    .status-form { display: flex; align-items: center; gap: 0.5rem; }

    .status-select-wrapper { position: relative; display: inline-block; }

    .status-select {
        appearance: none;
        -webkit-appearance: none;
        border: none;
        border-radius: 999px;
        padding: 0.35rem 2rem 0.35rem 0.85rem;
        font-size: 0.78rem;
        font-weight: 600;
        font-family: 'Plus Jakarta Sans', sans-serif;
        cursor: pointer;
        outline: none;
        transition: box-shadow 0.2s, transform 0.1s;
    }
    .status-select:hover { box-shadow: 0 2px 8px rgba(0,0,0,0.15); transform: scale(1.02); }
    .status-select:focus { box-shadow: 0 0 0 3px rgba(99,102,241,0.2); }

    .status-select-wrapper::after {
        content: '▾';
        position: absolute;
        right: 0.6rem;
        top: 50%;
        transform: translateY(-50%);
        font-size: 0.7rem;
        pointer-events: none;
    }

    /* Warna per nilai dropdown */
    .status-select.status-dipinjam,
    .status-select-wrapper.status-dipinjam::after { color: #1d4ed8; }
    .status-select.status-dipinjam { background: #eff6ff; border: 1.5px solid #bfdbfe; }

    .status-select.status-dikembalikan,
    .status-select-wrapper.status-dikembalikan::after { color: #15803d; }
    .status-select.status-dikembalikan { background: #f0fdf4; border: 1.5px solid #bbf7d0; }

    .status-select.status-ditolak,
    .status-select-wrapper.status-ditolak::after { color: #be123c; }
    .status-select.status-ditolak { background: #fff1f2; border: 1.5px solid #fecdd3; }

    .btn-update {
        background: #1a1f36;
        color: #fff;
        border: none;
        border-radius: 8px;
        padding: 0.38rem 0.85rem;
        font-size: 0.78rem;
        font-weight: 600;
        font-family: 'Plus Jakarta Sans', sans-serif;
        cursor: pointer;
        transition: background 0.2s, transform 0.1s;
        white-space: nowrap;
    }
    .btn-update:hover { background: #3730a3; transform: translateY(-1px); }

    .btn-laporan {
        background: #f0fdf4;
        color: #15803d;
        border: 1.5px solid #bbf7d0;
        border-radius: 8px;
        padding: 0.35rem 0.85rem;
        font-size: 0.78rem;
        font-weight: 600;
        font-family: 'Plus Jakarta Sans', sans-serif;
        cursor: pointer;
        white-space: nowrap;
        transition: background 0.2s, color 0.2s, transform 0.1s;
    }
    .btn-laporan:hover {
        background: #16a34a;
        color: #fff;
        border-color: #16a34a;
        transform: translateY(-1px);
    }

    .empty-state { text-align: center; padding: 3rem; color: #9ca3af; }
</style>

    <div class="peminjaman-wrapper">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-2xl font-bold text-slate-900">Data Pengembalian Buku</h2>
                <p class="text-sm text-slate-600">Kelola dan perbarui status pengembalian buku perpustakaan</p>
            </div>            
                <div class="flex items-center gap-2">
                    <!-- Form search -->
                    <form action="{{ route('admin.pengembalian.index') }}" method="GET" class="flex items-center gap-2">
                        <input
                            type="text"
                            name="q"
                            value="{{ request('q') }}"
                            placeholder="Cari nama peminjam/judul buku/kode buku..."
                            class="w-64 rounded-lg border border-slate-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-slate-300"
                        />
                        <button
                            type="submit"
                            class="px-3 py-2 rounded-lg bg-slate-200 text-slate-800 hover:bg-slate-300 text-sm"
                        >
                            Cari
                        </button>
                        @if(request('q'))
                        <a
                            href="{{ route('admin.pengembalian.index') }}"
                            class="px-3 py-2 rounded-lg bg-slate-100 text-slate-700 hover:bg-slate-200 text-sm"
                        >
                            Reset
                        </a>
                        @endif
                    </form>

                    <a href="{{ route('admin.pengembalian.export', ['q' => request('q')]) }}"
                    class="px-4 py-2 rounded-lg bg-emerald-600 text-white hover:bg-emerald-700 text-sm">
                    Export PDF
                    </a>
                </div>
            </div>
    <div class="table-card">
        <table class="peminjaman-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Peminjam</th>
                    <th>Judul Buku</th>
                    <th>Kode Buku</th>
                    <th>Tgl Pinjam</th>
                    <th>Tgl Kembali</th>
                    <th>Status & Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pengembalian as $index => $pinjam)
                <tr>
                    <td class="td-no">{{ $index + 1 }}</td>
                    <td class="td-name">{{ $pinjam->user->name }}</td>
                    <td>{{ $pinjam->buku->judul }}</td>
                    <td><span class="td-kode">{{ $pinjam->buku->kode_buku }}</span></td>
                    <td class="td-date">{{ \Carbon\Carbon::parse($pinjam->tanggal_peminjaman)->format('d M Y') }}</td>
                    <td class="td-date">{{ \Carbon\Carbon::parse($pinjam->tanggal_pengembalian)->format('d M Y') }}</td>

                    {{-- Kolom Status & Aksi (digabung) --}}
                    @php $status = strtolower($pinjam->status); @endphp
                    <td>
                        @if($status === 'menunggu')
                            <div class="aksi-menunggu">
                                <span class="status-badge badge-menunggu">⏳ Menunggu</span>

                                <form action="{{ route('peminjaman.update', $pinjam->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="dipinjam">
                                    <input type="hidden" name="user_id" value="{{ $pinjam->user->id }}">
                                    <input type="hidden" name="buku_id" value="{{ $pinjam->buku->id }}">
                                    <input type="hidden" name="tanggal_peminjaman" value="{{ $pinjam->tanggal_peminjaman }}">
                                    <input type="hidden" name="tanggal_pengembalian" value="{{ $pinjam->tanggal_pengembalian }}">
                                    <button type="submit" class="btn-approve" title="Setujui">✓</button>
                                </form>

                                <form action="{{ route('peminjaman.update', $pinjam->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="ditolak">
                                    <input type="hidden" name="user_id" value="{{ $pinjam->user->id }}">
                                    <input type="hidden" name="buku_id" value="{{ $pinjam->buku->id }}">
                                    <input type="hidden" name="tanggal_peminjaman" value="{{ $pinjam->tanggal_peminjaman }}">
                                    <input type="hidden" name="tanggal_pengembalian" value="{{ $pinjam->tanggal_pengembalian }}">
                                    <button type="submit" class="btn-reject" title="Tolak">✕</button>
                                </form>
                            </div>

                        @elseif($status === 'dikembalikan')
                            {{-- Status final: badge + tombol lihat laporan --}}
                            <div style="display:flex; align-items:center; gap:0.5rem;">
                                <span class="status-badge badge-dikembalikan">✅ Dikembalikan</span>
                                <a href="{{ route('peminjaman.laporan', $pinjam->id) }}" class="btn-laporan">
                                    📄 Lihat Laporan
                                </a>
                            </div>

                        @else
                            <form action="{{ route('peminjaman.update', $pinjam->id) }}" method="POST" class="status-form">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="user_id" value="{{ $pinjam->user->id }}">
                                <input type="hidden" name="buku_id" value="{{ $pinjam->buku->id }}">
                                <input type="hidden" name="tanggal_peminjaman" value="{{ $pinjam->tanggal_peminjaman }}">
                                <input type="hidden" name="tanggal_pengembalian" value="{{ $pinjam->tanggal_pengembalian }}">

                                <div class="status-select-wrapper status-{{ $status }}">
                                    <select name="status" class="status-select status-{{ $status }}" onchange="updateSelectStyle(this)">
                                        <option value="dipinjam"     {{ $status === 'dipinjam'     ? 'selected' : '' }}>📖 Dipinjam</option>
                                        <option value="dikembalikan" {{ $status === 'dikembalikan' ? 'selected' : '' }}>✅ Dikembalikan</option>
                                        <option value="ditolak"      {{ $status === 'ditolak'      ? 'selected' : '' }}>❌ Ditolak</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn-update">Simpan</button>
                            </form>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="empty-state">Belum ada data Pengembalian.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
        <div class="mt-4">
        {{ $pengembalian->links() }}
    </div>
</div>

<script>
    // Update warna dropdown secara live saat pilihan berubah
    function updateSelectStyle(select) {
        const wrapper = select.parentElement;
        const allClasses = ['status-dipinjam', 'status-dikembalikan', 'status-ditolak', 'status-menunggu'];

        allClasses.forEach(c => {
            select.classList.remove(c);
            wrapper.classList.remove(c);
        });

        const newClass = 'status-' + select.value;
        select.classList.add(newClass);
        wrapper.classList.add(newClass);
    }
</script>

@endsection