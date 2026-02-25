@extends('layouts.app')

@section('contents')
<div class="w-full px-6 py-6">

    {{-- Header --}}
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">Daftar Pengguna</h1>

        <div class="flex items-center gap-3">
            {{-- Search --}}
            <form action="{{ route('admin.pengguna.index') }}" method="GET" class="flex items-center gap-2">
                <input
                    type="text"
                    name="q"
                    value="{{ request('q') }}"
                    placeholder="Cari nama/username/email..."
                    class="w-64 rounded-lg border border-slate-300 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-slate-300"/>
                <button
                    type="submit"
                    class="px-3 py-2 rounded-lg bg-slate-200 text-slate-800 hover:bg-slate-300 text-sm">
                    Cari
                </button>

                @if(request('q'))
                    <a
                        href="{{ route('admin.pengguna.index') }}"
                        class="px-3 py-2 rounded-lg bg-slate-100 text-slate-700 hover:bg-slate-200 text-sm">
                        Reset
                    </a>
                @endif
            </form>
        </div>
    </div>

    {{-- Table --}}
    <div class="bg-white rounded-xl shadow-sm ring-1 ring-slate-200">
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="bg-slate-100 text-slate-700">
                    <tr>
                        <th class="text-left font-semibold px-4 py-3 w-12">No</th>
                        <th class="text-left font-semibold px-4 py-3">Nama Lengkap</th>
                        <th class="text-left font-semibold px-4 py-3">Username</th>
                        <th class="text-left font-semibold px-4 py-3">Email</th>
                        <th class="text-left font-semibold px-4 py-3">Alamat</th>
                        <th class="text-center font-semibold px-4 py-3">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-200">
                    @forelse ($nama as $user)
                    <tr class="hover:bg-slate-50">
                        <td class="px-4 py-3 text-slate-600">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-4 py-3 font-medium">{{ $user->nama_lengkap }}</td>
                        <td class="px-4 py-3">{{ $user->name }}</td>
                        <td class="px-4 py-3">{{ $user->email }}</td>
                        <td class="px-4 py-3">{{ $user->alamat }}</td>
                        <td class="px-4 py-3">
                            <div class="flex justify-end">
                                <form action="{{ route('admin.pengguna.destroy', $user->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin mau hapus user ini?')">
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
                        <td colspan="6" class="px-4 py-6 text-center text-slate-500">
                            Belum ada data pengguna.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
