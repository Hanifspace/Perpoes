@extends('layouts.app')

@section('contents')

<table class="min-w-full table-auto border-collapse">
    <thead>
        <tr class="bg-gray-100">
            <th class="px-6 py-3 text-left">No</th>
            <th class="px-6 py-3 text-left">Nama</th>
            <th class="px-6 py-3 text-left">Buku</th>
            <th class="px-6 py-3 text-left">Kode Buku</th>
            <th class="px-6 py-3 text-left">Tanggal Peminjaman</th>
            <th class="px-6 py-3 text-left">Tanggal Pengembalian</th>
            <th class="px-6 py-3 text-left">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($peminjaman as $index => $pinjam)
            <tr>
                <td class="px-6 py-3">{{ $index + 1 }}</td>
                <td class="px-6 py-3">{{ $pinjam->user->name }}</td>
                <td class="px-6 py-3">{{ $pinjam->buku->judul }}</td>
                <td class="px-6 py-3">{{ $pinjam->buku->kode_buku }}</td>
                <td class="px-6 py-3">{{ $pinjam->tanggal_peminjaman }}</td>
                <td class="px-6 py-3">{{ $pinjam->tanggal_pengembalian }}</td>
                <td class="px-6 py-3">
                    <form action="#" method="POST">
                        @csrf
                        @method('PUT')

                        <button type="submit" name="status" value="disetujui" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Setujui</button>
                        <button type="submit" name="status" value="ditolak" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Tolak</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection