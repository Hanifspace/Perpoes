@include('nav')

<div class="w-full px-6 py-6">
    <h1 class="text-2xl font-semibold">Form Peminjaman Buku</h1>

    {{-- Nama Buku yang Dipinjam --}}
    <div class="mt-6 mb-6">
        <div class="p-5 bg-white shadow-lg rounded-lg">
            <h3 class="text-xl font-semibold text-slate-800">{{ $buku->judul }}</h3>
            <p class="mt-1 text-sm text-slate-600">Pengarang: <span class="font-semibold text-slate-800">{{ $buku->penulis }}</span></p>
        </div>
    </div>

    {{-- Form --}}
    <form action="{{ route('user.pinjam.store') }}" method="POST" class="mt-6">
        @csrf
        <div class="space-y-4">
            {{-- Tanggal Peminjaman --}}
            <div>
                <label for="tanggal_peminjaman" class="block text-sm font-semibold text-slate-700">Tanggal Peminjaman</label>
                <input type="date" id="tanggal_peminjaman" name="tanggal_peminjaman" value="{{ now()->toDateString() }}" class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" disabled>
            </div>

            {{-- Tanggal Pengembalian --}}
            <div>
                <label for="tanggal_pengembalian" class="block text-sm font-semibold text-slate-700">Tanggal Pengembalian</label>
                <input type="date" id="tanggal_pengembalian" name="tanggal_pengembalian" class="mt-1 block w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>

            {{-- Submit Button --}}
            <div>
                <button type="submit" class="w-full px-4 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    Pinjam Buku
                </button>
            </div>
        </div>
    </form>
</div>
