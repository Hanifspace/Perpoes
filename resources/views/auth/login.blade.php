@include('navbar')
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Masuk</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    input[type="password"]::-ms-reveal,
    input[type="password"]::-ms-clear {
      display: none;
    }
  </style>
</head>
<body>
  <div x-data="{ showPassword: false }" class="min-h-screen bg-gray-100 flex items-center justify-center p-8">
    <div class="w-full max-w-md">
      <div class="bg-white rounded-2xl shadow-xl p-8">

        <!-- Logo -->
        <div class="text-center mb-8">
          <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-100 rounded-full mb-4">
            <i class="fas fa-sign-in-alt fa-lg text-blue-700"></i>
          </div>
          <h2 class="text-2xl font-bold text-gray-800">Selamat Datang!</h2>
          <p class="text-gray-600 mt-2">Silakan masuk untuk melanjutkan</p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- LOGIN FORM -->
        <form method="POST" action="{{ route('login') }}">
          @csrf

          <!-- Alamat Email -->
          <div class="mb-6">
            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Alamat Email</label>
            <div class="relative">
              <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autofocus
                autocomplete="username"
                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:border-transparent transition-colors"
                placeholder="anda@contoh.com"
              />
              <i class="fas fa-envelope absolute right-3 top-4 text-gray-400"></i>
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
          </div>

          <!-- Kata Sandi -->
          <div class="mb-6">
            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Kata Sandi</label>
            <div class="relative">
              <input
                id="password"
                :type="showPassword ? 'text' : 'password'"
                name="password"
                required
                autocomplete="current-password"
                class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:border-transparent transition-colors"
                placeholder="••••••••"
              />
              <button
                type="button"
                class="absolute right-3 top-3 text-gray-400 hover:text-gray-600"
                @click="showPassword = !showPassword"
              >
                <i :class="showPassword ? 'fas fa-eye-slash' : 'fas fa-eye'"></i>
              </button>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
          </div>

          <!-- Tombol Masuk -->
          <button
            type="submit"
            class="w-full bg-blue-700 hover:bg-blue-800 text-white py-3 rounded-lg font-semibold transition-colors"
          >
            {{ __('Masuk') }}
          </button>

          <!-- Switch ke Register -->
          <p class="mt-6 text-center text-gray-600">
            Belum punya akun?
            <a href="{{ route('register') }}" class="ml-1 font-semibold text-blue-700 hover:text-blue-800">
              Daftar sekarang
            </a>
          </p>
        </form>

      </div>
    </div>
  </div>
</body>
</html>