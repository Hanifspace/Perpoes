{{-- resources/views/welcome.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PERPOESTAKAAN - Perpustakaan Digital Modern</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            100: '#dbeafe', 
                            200: '#bfdbfe',
                            300: '#93c5fd',
                            400: '#60a5fa',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a'
                        }
                    }
                }
            }
        }
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-primary-50 to-blue-100 min-h-screen">

  @include('navbar')

    {{-- Hero Section --}}
    <section id="beranda" class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-5xl font-bold text-gray-900 mb-6">
                    Selamat Datang di
                    <span class="text-primary-600">PERPOESTAKAAN</span>
                </h1>
                <p class="text-xl text-gray-600 mb-8 max-w-3xl mx-auto">
                    Perpustakaan digital modern yang menyediakan akses mudah ke ribuan koleksi buku, jurnal, dan sumber daya pembelajaran untuk mendukung perjalanan edukasi Anda.
                </p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <button class="bg-primary-600 hover:bg-primary-700 text-white px-8 py-3 rounded-lg font-semibold transition duration-300 transform hover:scale-105">
                        <i class="fas fa-search mr-2"></i>Jelajahi Koleksi
                    </button>
                    <button class="border border-primary-600 text-primary-600 hover:bg-primary-600 hover:text-white px-8 py-3 rounded-lg font-semibold transition duration-300">
                        <i class="fas fa-play mr-2"></i>Lihat Demo
                    </button>
                </div>
            </div>
        </div>
    </section>

    {{-- Features Section --}}
    <section id="tentang" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Mengapa Memilih PERPOESTAKAAN?</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Kami menyediakan platform perpustakaan yang lengkap dan modern untuk memenuhi kebutuhan belajar Anda</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center p-6 rounded-lg bg-primary-50 hover:bg-primary-100 transition duration-300">
                    <div class="bg-primary-600 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-books text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Koleksi Lengkap</h3>
                    <p class="text-gray-600">Lebih dari 50,000 buku digital, jurnal ilmiah, dan materi pembelajaran dari berbagai bidang ilmu</p>
                </div>

                <div class="text-center p-6 rounded-lg bg-primary-50 hover:bg-primary-100 transition duration-300">
                    <div class="bg-primary-600 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-clock text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Akses 24/7</h3>
                    <p class="text-gray-600">Akses perpustakaan kapan saja dan dimana saja dengan platform digital yang tersedia 24 jam</p>
                </div>

                <div class="text-center p-6 rounded-lg bg-primary-50 hover:bg-primary-100 transition duration-300">
                    <div class="bg-primary-600 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-search text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Pencarian Canggih</h3>
                    <p class="text-gray-600">Sistem pencarian yang powerful untuk menemukan buku dan referensi yang Anda butuhkan dengan mudah</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Collection Section --}}
    <section id="koleksi" class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Koleksi Kami</h2>
                <p class="text-gray-600">Jelajahi beragam koleksi yang tersedia di PERPOESTAKAAN</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300">
                    <div class="text-primary-600 text-4xl mb-4">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Buku Akademik</h3>
                    <p class="text-gray-600 mb-4">15,000+ buku akademik dari berbagai bidang ilmu</p>
                    <span class="text-primary-600 font-semibold">Lihat Koleksi →</span>
                </div>

                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300">
                    <div class="text-primary-600 text-4xl mb-4">
                        <i class="fas fa-newspaper"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Jurnal Ilmiah</h3>
                    <p class="text-gray-600 mb-4">8,500+ jurnal dan artikel penelitian terkini</p>
                    <span class="text-primary-600 font-semibold">Lihat Koleksi →</span>
                </div>

                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300">
                    <div class="text-primary-600 text-4xl mb-4">
                        <i class="fas fa-book"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">E-Book</h3>
                    <p class="text-gray-600 mb-4">25,000+ e-book dalam berbagai format</p>
                    <span class="text-primary-600 font-semibold">Lihat Koleksi →</span>
                </div>

                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition duration-300">
                    <div class="text-primary-600 text-4xl mb-4">
                        <i class="fas fa-video"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Media Digital</h3>
                    <p class="text-gray-600 mb-4">2,000+ video pembelajaran dan audiobook</p>
                    <span class="text-primary-600 font-semibold">Lihat Koleksi →</span>
                </div>
            </div>
        </div>
    </section>

    {{-- Services Section --}}
    <section id="layanan" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Layanan Kami</h2>
                <p class="text-gray-600">Berbagai layanan untuk mendukung aktivitas pembelajaran Anda</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="flex space-x-4">
                    <div class="flex-shrink-0">
                        <div class="bg-primary-100 w-12 h-12 rounded-lg flex items-center justify-center">
                            <i class="fas fa-bookmark text-primary-600"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-2">Peminjaman Digital</h3>
                        <p class="text-gray-600">Pinjam buku digital dengan mudah dan kembalikan otomatis sesuai jadwal</p>
                    </div>
                </div>

                <div class="flex space-x-4">
                    <div class="flex-shrink-0">
                        <div class="bg-primary-100 w-12 h-12 rounded-lg flex items-center justify-center">
                            <i class="fas fa-users text-primary-600"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-2">Ruang Belajar Virtual</h3>
                        <p class="text-gray-600">Bergabung dengan grup belajar online dan diskusi dengan sesama pelajar</p>
                    </div>
                </div>

                <div class="flex space-x-4">
                    <div class="flex-shrink-0">
                        <div class="bg-primary-100 w-12 h-12 rounded-lg flex items-center justify-center">
                            <i class="fas fa-question-circle text-primary-600"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-2">Bantuan Referensi</h3>
                        <p class="text-gray-600">Konsultasi dengan pustakawan ahli untuk bantuan penelitian dan referensi</p>
                    </div>
                </div>

                <div class="flex space-x-4">
                    <div class="flex-shrink-0">
                        <div class="bg-primary-100 w-12 h-12 rounded-lg flex items-center justify-center">
                            <i class="fas fa-mobile-alt text-primary-600"></i>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-2">Aplikasi Mobile</h3>
                        <p class="text-gray-600">Akses perpustakaan melalui aplikasi mobile yang user-friendly</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-16 bg-primary-600">
        <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-white mb-4">Mulai Perjalanan Belajar Anda</h2>
            <p class="text-primary-100 text-lg mb-8">Bergabunglah dengan ribuan pelajar yang telah merasakan manfaat PERPOESTAKAAN</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="/register" class="bg-white text-primary-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition duration-300">
                    Daftar Sekarang
                </a>
                <a href="#koleksi" class="border border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-primary-700 transition duration-300">
                    Jelajahi Koleksi
                </a>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer id="kontak" class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <i class="fas fa-book-open text-primary-400 text-2xl"></i>
                        <span class="text-2xl font-bold">PERPOESTAKAAN</span>
                    </div>
                    <p class="text-gray-400 mb-4">Perpustakaan digital modern untuk generasi masa depan</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-primary-400 transition duration-300">
                            <i class="fab fa-facebook text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-primary-400 transition duration-300">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-primary-400 transition duration-300">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-4">Menu</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#beranda" class="hover:text-white transition duration-300">Beranda</a></li>
                        <li><a href="#tentang" class="hover:text-white transition duration-300">Tentang</a></li>
                        <li><a href="#koleksi" class="hover:text-white transition duration-300">Koleksi</a></li>
                        <li><a href="#layanan" class="hover:text-white transition duration-300">Layanan</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-4">Layanan</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="#" class="hover:text-white transition duration-300">Peminjaman Digital</a></li>
                        <li><a href="#" class="hover:text-white transition duration-300">Bantuan Referensi</a></li>
                        <li><a href="#" class="hover:text-white transition duration-300">Ruang Belajar</a></li>
                        <li><a href="#" class="hover:text-white transition duration-300">Tutorial</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-4">Kontak</h3>
                    <div class="space-y-2 text-gray-400">
                        <p><i class="fas fa-envelope mr-2"></i>info@perpoestakaan.ac.id</p>
                        <p><i class="fas fa-phone mr-2"></i>(021) 123-4567</p>
                        <p><i class="fas fa-map-marker-alt mr-2"></i>Jakarta, Indonesia</p>
                        <p><i class="fas fa-clock mr-2"></i>24/7 Online</p>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2026 PERPOESTAKAAN. All rights reserved.</p>
            </div>
        </div>
    </footer>

    {{-- Smooth Scrolling Script --}}
    <script>
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>

</body>
</html>
