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

    {{-- Navbar --}}
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                {{-- Logo --}}
                <div class="flex items-center space-x-2">
                    <i class="fas fa-book-open text-primary-600 text-2xl"></i>
                    <span class="text-2xl font-bold text-primary-700">PERPOESTAKAAN</span>
                </div>

                {{-- Navigation Menu --}}
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#beranda" class="text-gray-700 hover:text-primary-600 transition duration-300">Beranda</a>
                    <a href="#tentang" class="text-gray-700 hover:text-primary-600 transition duration-300">Tentang</a>
                    <a href="#koleksi" class="text-gray-700 hover:text-primary-600 transition duration-300">Koleksi</a>
                    <a href="#layanan" class="text-gray-700 hover:text-primary-600 transition duration-300">Layanan</a>
                    <a href="#kontak" class="text-gray-700 hover:text-primary-600 transition duration-300">Kontak</a>
                </div>

                {{-- Auth Buttons --}}
                <div class="flex items-center space-x-4">
                    <a href="{{ route('login') }}" class="text-primary-600 hover:text-primary-700 font-medium transition duration-300">
                        <i class="fas fa-sign-in-alt mr-2"></i>Login
                    </a>
                    <a href="{{ route('register') }}" class="bg-primary-600 hover:bg-primary-700 text-white px-4 py-2 rounded-lg font-medium transition duration-300">
                        <i class="fas fa-user-plus mr-2"></i>Register
                    </a>
                </div>

                {{-- Mobile Menu Button --}}
                <div class="md:hidden">
                    <button class="text-gray-700 hover:text-primary-600">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>