@include('nav')

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Peminjaman</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .card { transition: box-shadow .2s, transform .2s; }
        .card:hover { box-shadow: 0 6px 24px rgba(0,0,0,0.08); transform: translateY(-2px); }

        .badge-dipinjam  { background:#fef3c7; color:#92400e; border:1px solid #fcd34d; }
        .badge-dikembalikan { background:#d1fae5; color:#065f46; border:1px solid #a7f3d0; }
        .badge-default   { background:#f3f4f6; color:#6b7280; border:1px solid #e5e7eb; }

        .btn-outline {
            font-size:.7rem; font-weight:500; padding:.35rem 1rem;
            border-radius:.5rem; border:1.5px solid #d1c9b8;
            color:#6b7280; background:#fff; cursor:pointer;
            transition: background .15s, border-color .15s;
        }
        .btn-outline:hover { background:#f5f0e8; border-color:#b8ae9c; }
        .btn-outline:disabled { border-color:#e5e7eb; color:#d1d5db; background:#fafafa; cursor:not-allowed; }

        .btn-primary {
            font-size:.7rem; font-weight:500; padding:.35rem 1rem;
            border-radius:.5rem; background:#224cb4; color:#fff;
            border:none; cursor:pointer; transition: background .15s;
        }
        .btn-primary:hover { background:#1a3d96; }
        .btn-primary:disabled { background:#93aedd; cursor:not-allowed; }
    </style>
</head>
<body class="min-h-screen py-10 px-4" style="background:#f5f3ef; font-family:'DM Sans',sans-serif;">

<div class="max-w-2xl mx-auto">

    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-2xl font-semibold text-stone-800">Riwayat Peminjaman</h1>
        <p class="text-stone-400 text-sm mt-0.5">Daftar buku yang pernah kamu pinjam</p>
    </div>

    @forelse ($bukus as $buku)
    <div class="card bg-white rounded-2xl border border-stone-200 p-5 mb-3 flex gap-4">

        <!-- Cover -->
        <div class="rounded-xl flex-shrink-0 w-[68px] h-24 overflow-hidden bg-stone-100">
            <img src="{{ asset('storage/' . $buku->buku->cover) }}"
                 alt="{{ $buku->buku->judul }}"
                 class="w-full h-full object-cover">
        </div>

        <!-- Content -->
        <div class="flex-1 min-w-0 flex flex-col justify-between">

            <!-- Top row: title + badge -->
            <div>
                <div class="flex items-start justify-between gap-2 mb-2">
                    <h2 class="font-semibold text-stone-800 text-sm leading-snug">{{ $buku->buku->judul }}</h2>
                    <span class="text-[11px] font-medium px-2.5 py-0.5 rounded-full whitespace-nowrap flex-shrink-0
                        @if($buku->status == 'dipinjam') badge-dipinjam
                        @elseif($buku->status == 'dikembalikan') badge-dikembalikan
                        @else badge-default @endif">
                        {{ ucfirst($buku->status) }}
                    </span>
                </div>

                <!-- Meta info -->
                <div class="flex flex-wrap gap-x-3 gap-y-0.5 text-xs text-stone-500 mb-2">
                    <span>{{ $buku->buku->penulis }}</span>
                    <span class="text-stone-300">·</span>
                    <span>{{ $buku->buku->kategori->nama_kategori }}</span>
                    <span class="text-stone-300">·</span>
                    <span>{{ $buku->buku->tahun_terbit }}</span>
                </div>

                <!-- Dates -->
                <div class="flex gap-4 text-xs text-stone-400">
                    <span>Pinjam: <span class="text-stone-600 font-medium">{{ $buku->tanggal_peminjaman }}</span></span>
                    <span>Kembali: <span class="text-stone-600 font-medium">{{ $buku->tanggal_pengembalian }}</span></span>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex gap-2 mt-3">
                @if($buku->status == 'dipinjam')
                <a href="{{ route('user.riwayat.bukti.peminjaman', $buku->id) }}" target="_blank"
                    class="btn-outline inline-block">Bukti Peminjaman</a>
                    
                    <form action="{{ route('user.riwayat.ajukan.pengembalian', $buku->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn-primary">Ajukan Pengembalian</button>
                    </form>
                    @endif
                    
                    @if($buku->status == 'menunggu_pengembalian')
                    <span class="btn-outline" style="cursor:default;">Menunggu Konfirmasi...</span>
                @endif

                @if($buku->status == 'dikembalikan')
                <a href="#" target="_blank"
                    class="btn-outline inline-block">Beri Rating</a>
                
                @endif
            </div>
        </div>
    </div>

    @empty
        <div class="text-center py-16 text-stone-400 text-sm">
            <p>Belum ada buku yang dipinjam.</p>
        </div>
    @endforelse

</div>
</body>
</html>