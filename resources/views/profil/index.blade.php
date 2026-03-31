@include('nav')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lora:wght@500;600&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
  body { font-family: 'DM Sans', sans-serif; }
  .font-display { font-family: 'Lora', serif; }
</style>

<div class="min-h-screen bg-slate-50">
  <div class="max-w-5xl mx-auto px-6 py-8">

    {{-- Header Banner --}}
    <div class="rounded-2xl bg-gradient-to-br from-blue-700 to-blue-900 px-8 py-8 mb-8 flex flex-col items-center text-center gap-2">
      <p class="text-xs font-semibold tracking-widest text-blue-300 uppercase">Perpoestakaan</p>
      <h1 class="font-display text-3xl text-white leading-tight">Profil Saya</h1>
      <p class="text-blue-200 text-sm mt-0.5">Kelola informasi akun kamu.</p>
    </div>

    {{-- Flash Messages --}}
    @if(session('success'))
      <div class="mb-5 flex items-center gap-3 rounded-xl border border-emerald-100 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
        <i class="fas fa-check-circle text-emerald-500 flex-shrink-0"></i>
        {{ session('success') }}
      </div>
    @endif
    @if(session('error'))
      <div class="mb-5 flex items-center gap-3 rounded-xl border border-red-100 bg-red-50 px-4 py-3 text-sm text-red-600">
        <i class="fas fa-exclamation-circle text-red-400 flex-shrink-0"></i>
        {{ session('error') }}
      </div>
    @endif

    <div class="flex flex-col md:flex-row gap-5 items-start">

      {{-- Kolom Kiri --}}
      <div class="flex flex-col gap-4 w-full md:w-64 flex-shrink-0">

        {{-- Avatar & Role --}}
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-5 flex flex-col items-center text-center gap-3">
          <div class="w-16 h-16 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center text-2xl font-bold">
            {{ strtoupper(substr($user->name, 0, 1)) }}
          </div>
          <div>
            <p class="font-semibold text-slate-800 text-sm">{{ $user->name }}</p>
            <p class="text-xs text-slate-400 mt-0.5">{{ $user->email }}</p>
            <span class="inline-flex items-center gap-1 mt-2 text-[11px] font-semibold px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-100">
              <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span>
              {{ ucfirst($user->role) }}
            </span>
          </div>
        </div>

        {{-- Hapus Akun --}}
        <div class="bg-white rounded-2xl border border-red-100 shadow-sm p-5">
          <h2 class="text-sm font-semibold text-red-600 mb-1">Hapus Akun</h2>
          <p class="text-xs text-slate-400 mb-4 leading-relaxed">Akun yang dihapus tidak dapat dipulihkan kembali.</p>
          <form action="{{ route('profil.destroy') }}" method="POST"
                onsubmit="return confirm('Yakin mau hapus akun ini? Tindakan ini tidak bisa dibatalkan.')">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="w-full py-2.5 rounded-xl bg-red-600 hover:bg-red-700 text-white text-xs font-semibold transition-colors">
              <i class="fas fa-trash text-xs mr-1.5"></i>
              Hapus Akun Saya
            </button>
          </form>
        </div>

      </div>

      {{-- Kolom Kanan: Form --}}
      <div class="flex-1 bg-white rounded-2xl border border-slate-100 shadow-sm p-6">
        <h2 class="text-sm font-semibold text-slate-700 mb-5">Informasi Akun</h2>

        <form action="{{ route('profil.update') }}" method="POST">
          @csrf
          @method('PUT')

          {{-- Nama Lengkap + Username --}}
          <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
              <label class="block text-xs font-semibold text-slate-600 mb-1.5">Nama Lengkap</label>
              <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $user->nama_lengkap) }}"
                class="w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 transition-colors">
              @error('nama_lengkap')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
              <label class="block text-xs font-semibold text-slate-600 mb-1.5">Username</label>
              <input type="text" name="name" value="{{ old('name', $user->name) }}"
                class="w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 transition-colors">
              @error('name')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
            </div>
          </div>

          {{-- Email + Alamat --}}
          <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
              <label class="block text-xs font-semibold text-slate-600 mb-1.5">Email</label>
              <div class="relative">
                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                  class="w-full rounded-xl border border-slate-200 px-4 py-2.5 pr-10 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 transition-colors">
                <i class="fas fa-envelope absolute right-3 top-3 text-slate-300 text-xs"></i>
              </div>
              @error('email')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
              <label class="block text-xs font-semibold text-slate-600 mb-1.5">Alamat</label>
              <input type="text" name="alamat" value="{{ old('alamat', $user->alamat) }}"
                class="w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 transition-colors">
              @error('alamat')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
            </div>
          </div>

          {{-- Password + Konfirmasi --}}
          <div class="grid grid-cols-2 gap-4 mb-6">
            <div>
              <label class="block text-xs font-semibold text-slate-600 mb-1.5">
                Password Baru <span class="text-slate-400 font-normal">(opsional)</span>
              </label>
              <input type="password" name="password" placeholder="••••••••"
                class="w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 transition-colors">
              @error('password')<p class="text-xs text-red-500 mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
              <label class="block text-xs font-semibold text-slate-600 mb-1.5">Konfirmasi Password</label>
              <input type="password" name="password_confirmation" placeholder="••••••••"
                class="w-full rounded-xl border border-slate-200 px-4 py-2.5 text-sm text-slate-700 focus:outline-none focus:ring-2 focus:ring-blue-100 focus:border-blue-400 transition-colors">
            </div>
          </div>

          {{-- Submit --}}
          <button type="submit"
            class="w-full py-3 rounded-xl bg-blue-700 hover:bg-blue-800 text-white text-sm font-semibold transition-colors">
            <i class="fas fa-save text-xs mr-1.5"></i>
            Simpan Perubahan
          </button>

        </form>
      </div>

    </div>

  </div>
</div>