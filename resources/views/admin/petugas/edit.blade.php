@extends('layouts.app')

@section('contents')
<div class="w-full max-w-4xl mx-auto px-6 py-5">

    {{-- Header --}}
    <div class="flex items-center justify-between mb-3">
        <div>
            <h1 class="text-xl font-semibold text-slate-800">Edit Petugas</h1>
            <p class="text-sm text-slate-500">Perbarui data petugas</p>
        </div>
        <a href="{{ route('admin.petugas.index') }}"
           class="px-3 py-2 rounded-md bg-slate-100 text-slate-700 hover:bg-slate-200 text-sm">
            Kembali
        </a>
    </div>

    {{-- Pesan Error --}}
    @if ($errors->any())
        <div class="mb-3 rounded-lg border border-red-200 bg-red-50 px-4 py-2 text-red-700 text-sm">
            <ul class="list-disc pl-5 space-y-0.5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Card --}}
    <div class="bg-white rounded-lg border border-slate-200">
        <form action="{{ route('admin.petugas.update', $petugas->id) }}" method="POST" class="p-4">
            @csrf
            @method('PUT')

            {{-- Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-3">

                {{-- Nama Lengkap --}}
                <div>
                    <label class="text-xs font-medium text-slate-600">Nama Lengkap</label>
                    <input
                        type="text"
                        name="nama_lengkap"
                        value="{{ old('nama_lengkap', $petugas->nama_lengkap) }}"
                        required
                        class="mt-1 block w-full h-10 px-3 rounded-md
                               border border-slate-300 bg-white
                               text-sm text-slate-900
                               focus:border-slate-800 focus:ring focus:ring-slate-800/20"
                    >
                </div>

                {{-- Username --}}
                <div>
                    <label class="text-xs font-medium text-slate-600">Username</label>
                    <input
                        type="text"
                        name="name"
                        value="{{ old('name', $petugas->name) }}"
                        required
                        class="mt-1 block w-full h-10 px-3 rounded-md
                               border border-slate-300 bg-white
                               text-sm text-slate-900
                               focus:border-slate-800 focus:ring focus:ring-slate-800/20"
                    >
                </div>

                {{-- Email --}}
                <div>
                    <label class="text-xs font-medium text-slate-600">Email</label>
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email', $petugas->email) }}"
                        required
                        class="mt-1 block w-full h-10 px-3 rounded-md
                               border border-slate-300 bg-white
                               text-sm text-slate-900
                               focus:border-slate-800 focus:ring focus:ring-slate-800/20"
                    >
                </div>

                {{-- Password --}}
                <div>
                    <label class="text-xs font-medium text-slate-600">Password</label>
                    <input
                        type="password"
                        name="password"
                        placeholder="Kosongkan jika tidak ingin mengganti"
                        class="mt-1 block w-full h-10 px-3 rounded-md
                               border border-slate-300 bg-white
                               text-sm text-slate-900
                               focus:border-slate-800 focus:ring focus:ring-slate-800/20"
                    >
                </div>

                {{-- Alamat --}}
                <div class="md:col-span-2">
                    <label class="text-xs font-medium text-slate-600">Alamat</label>
                    <textarea
                        name="alamat"
                        rows="2"
                        class="mt-1 block w-full px-3 py-2 rounded-md
                               border border-slate-300 bg-white
                               text-sm text-slate-900
                               focus:border-slate-800 focus:ring focus:ring-slate-800/20"
                    >{{ old('alamat', $petugas->alamat) }}</textarea>
                </div>

            </div>

            {{-- Action --}}
            <div class="flex justify-end gap-2 mt-4 pt-3 border-t border-slate-200">
                <a href="{{ route('admin.petugas.index') }}"
                   class="px-4 py-2 rounded-md bg-slate-100 text-slate-700 text-sm hover:bg-slate-200">
                    Batal
                </a>
                <button type="submit"
                        class="px-4 py-2 rounded-md bg-slate-900 text-white text-sm hover:bg-slate-800">
                    Update
                </button>
            </div>

        </form>
    </div>

</div>
@endsection
