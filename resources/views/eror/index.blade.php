<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Akses Ditolak</title>

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Font Awesome (optional) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

</head>

<body class="min-h-screen bg-gradient-to-br from-slate-50 via-red-50 to-slate-50 text-slate-800">
  <main class="min-h-screen flex items-center justify-center p-6">
    <div class="w-full max-w-xl">
      <div class="bg-white rounded-2xl shadow-sm ring-1 ring-slate-200 overflow-hidden">
        <div class="px-6 py-5 bg-gradient-to-r from-red-50 to-slate-50 border-b border-slate-200">
          <div class="flex items-start gap-4">
            <div class="h-12 w-12 rounded-xl bg-red-600/10 text-red-600 flex items-center justify-center">
              <i class="fa-solid fa-ban text-lg"></i>
            </div>
            <div>
              <h1 class="text-xl font-bold text-slate-900">Anda tidak memiliki akses</h1>
              <p class="text-sm text-slate-600 mt-1">
                Maaf, akun Anda tidak diizinkan membuka halaman ini.
              </p>
            </div>
          </div>
        </div>

        <div class="px-6 py-6 space-y-4">
          <div class="rounded-xl border border-slate-200 bg-slate-50 p-4">
            <p class="text-sm text-slate-700 leading-relaxed">
              Silakan kembali ke halaman sebelumnya atau kembali ke dashboard.
              Jika Anda merasa ini kesalahan, hubungi administrator.
            </p>
          </div>

          <div class="flex flex-col sm:flex-row gap-2 sm:justify-end">
            <button type="button"
                    onclick="history.back()"
                    class="inline-flex items-center justify-center gap-2 px-4 py-2 rounded-xl bg-white border border-slate-200 text-slate-700 hover:bg-slate-50">
              <i class="fa-solid fa-arrow-left"></i>
              Kembali
            </button>

            <!-- Kalau kamu punya route dashboard, ganti href ini -->
            <a href="/admin/dashboard"
               class="inline-flex items-center justify-center gap-2 px-4 py-2 rounded-xl bg-slate-900 text-white hover:bg-slate-800">
              <i class="fa-solid fa-house"></i>
              Ke Dashboard
            </a>
          </div>
        </div>
      </div>

      <p class="text-xs text-slate-500 mt-3 text-center">Kode: 403 • Perpoestakaan</p>
    </div>
  </main>
</body>
</html>
