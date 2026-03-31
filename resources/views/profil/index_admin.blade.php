@extends('layouts.app')

@section('contents')
<div class="w-full max-w-5xl mx-auto px-6 py-6">

    {{-- Header --}}
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-slate-800">Profile Saya</h1>
        <p class="text-slate-400 text-sm mt-0.5">Kelola informasi akun kamu</p>
    </div>

    {{-- Flash messages --}}
    @if(session('success'))
        <div class="mb-4 text-sm text-emerald-700 bg-emerald-50 border border-emerald-200 rounded-xl px-4 py-3">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="mb-4 text-sm text-red-700 bg-red-50 border border-red-200 rounded-xl px-4 py-3">
            {{ session('error') }}
        </div>
    @endif

    <div class="flex gap-5 items-start">

        {{-- Kolom Kiri: Avatar, Role, Hapus Akun --}}
        <div class="flex flex-col gap-4 w-64 flex-shrink-0">

            {{-- Avatar & Role --}}
            <div class="bg-white rounded-xl shadow-sm ring-1 ring-slate-200 p-5 flex flex-col items-center text-center gap-3">
                <div class="w-16 h-16 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center text-2xl font-bold">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
                <div>
                    <p class="font-semibold text-slate-800 text-sm">{{ $user->name }}</p>
                    <p class="text-xs text-slate-400 mt-0.5">{{ $user->email }}</p>
                    <span class="inline-block mt-2 text-[11px] font-medium px-2.5 py-0.5 rounded-full
                        @if($user->role === 'admin') bg-purple-100 text-purple-700
                        @else bg-blue-100 text-blue-700 @endif">
                        {{ ucfirst($user->role) }}
                    </span>
                </div>
            </div>

            {{-- Hapus Akun (petugas only) --}}
            @if($user->role === 'petugas')
            <div class="bg-white rounded-xl shadow-sm ring-1 ring-red-100 p-5">
                <h2 class="text-sm font-semibold text-red-600 mb-1">Hapus Akun</h2>
                <p class="text-xs text-slate-400 mb-4 leading-relaxed">Akun yang dihapus tidak dapat dipulihkan kembali.</p>
                <form action="{{ route('profil.destroy') }}" method="POST"
                      onsubmit="return confirm('Yakin mau hapus akun ini? Tindakan ini tidak bisa dibatalkan.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="w-full py-2 rounded-lg bg-red-600 text-white text-xs font-medium hover:bg-red-700 transition">
                        Hapus Akun Saya
                    </button>
                </form>
            </div>
            @endif

        </div>

        {{-- Kolom Kanan: Form Edit --}}
        <div class="flex-1 bg-white rounded-xl shadow-sm ring-1 ring-slate-200 p-6">
            <h2 class="text-sm font-semibold text-slate-700 mb-5">Informasi Akun</h2>

            <form action="{{ route('profil.update') }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Baris 1: Nama Lengkap + Username --}}
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-xs font-medium text-slate-600 mb-1">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $user->nama_lengkap) }}"
                            class="w-full rounded-lg border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-400 transition">
                        @error('nama_lengkap')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-slate-600 mb-1">Username</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}"
                            class="w-full rounded-lg border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-400 transition">
                        @error('name')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>

                {{-- Baris 2: Email + Alamat --}}
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-xs font-medium text-slate-600 mb-1">Email</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}"
                            class="w-full rounded-lg border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-400 transition">
                        @error('email')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-slate-600 mb-1">Alamat</label>
                        <input type="text" name="alamat" value="{{ old('alamat', $user->alamat) }}"
                            class="w-full rounded-lg border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-400 transition">
                        @error('alamat')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>

                {{-- Baris 3: Password + Konfirmasi --}}
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div>
                        <label class="block text-xs font-medium text-slate-600 mb-1">
                            Password Baru <span class="text-slate-400 font-normal">(opsional)</span>
                        </label>
                        <input type="password" name="password" placeholder="••••••••"
                            class="w-full rounded-lg border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-400 transition">
                        @error('password')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-slate-600 mb-1">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" placeholder="••••••••"
                            class="w-full rounded-lg border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-200 focus:border-blue-400 transition">
                    </div>
                </div>

                <button type="submit"
                    class="w-full py-2.5 rounded-lg bg-slate-900 text-white text-sm font-medium hover:bg-slate-800 transition">
                    Simpan Perubahan
                </button>
            </form>
        </div>

    </div>
</div>
@endsection