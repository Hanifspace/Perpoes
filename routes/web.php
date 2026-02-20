<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\PinjamUserController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\FavoritController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ahay', function () {
    return view('sidebar');
});

Route::middleware(['auth', 'role:admin|petugas'])->group(function () {

//dashboard masing masing role
Route::get('/DashboardAhay', [AdminController::class, 'index'])->name('admin.dashboard'); 


//admin -petugas
Route::get('/manajemen', [UserController::class, 'index'])->name('admin.petugas.index'); 
Route::get('/manajemen/tambah', [UserController::class, 'create'])->name('admin.petugas.create');
Route::post('/manajemen/tambah', [UserController::class, 'store'])->name('admin.petugas.store');
Route::delete('/manajemen/{id}', [UserController::class, 'destroy'])->name('admin.petugas.destroy');
Route::get('/manajemen/{id}/edit', [UserController::class, 'edit'])->name('admin.petugas.edit');
Route::put('/manajemen/{id}', [UserController::class, 'update'])->name('admin.petugas.update');

//admin - pengguna
Route::get('/manajemen-user', [PenggunaController::class, 'index'])->name('admin.pengguna.index');
Route::delete('/manajemen-user/{id}', [PenggunaController::class, 'destroy'])->name('admin.pengguna.destroy');

//admin -kategori
Route::get('/kategori', [KategoriController::class, 'index'])->name('admin.kategori.index');
Route::get('/kategori/tambah', [KategoriController::class, 'create'])->name('admin.kategori.create');
Route::post('/kategori', [KategoriController::class, 'store'])->name('admin.kategori.store');

Route::get('/kategori/{kategori}/edit', [KategoriController::class, 'edit'])->name('admin.kategori.edit');
Route::put('/kategori/{kategori}', [KategoriController::class, 'update'])->name('admin.kategori.update');
Route::delete('/kategori/{kategori}', [KategoriController::class, 'destroy'])->name('admin.kategori.destroy');

// admin -buku
Route::get('/buku', [BukuController::class, 'index'])->name('admin.buku.index');
Route::get('/buku/tambah', [BukuController::class, 'create'])->name('admin.buku.create');
Route::post('/buku', [BukuController::class, 'store'])->name('admin.buku.store');

Route::get('/buku/{buku}', [BukuController::class, 'show'])->name('admin.buku.show');
Route::get('/buku/{buku}/edit', [BukuController::class, 'edit'])->name('admin.buku.edit');
Route::put('/buku/{buku}', [BukuController::class, 'update'])->name('admin.buku.update');
Route::delete('/buku/{buku}', [BukuController::class, 'destroy'])->name('admin.buku.destroy');
});

//petugas
Route::get('/petugas', [UserController::class, 'index'])->name('petugas.dashboard');

//pengguna
Route::get('/pengguna', [PenggunaController::class, 'index2'])->name('user.dashboard');
Route::get('/riwayat', [PenggunaController::class, 'index3'])->name('user.riwayat.index');
Route::get('/pinjam/create/{buku_id}', [PinjamUserController::class, 'create'])->name('user.pinjam.create');
Route::post('/pinjam', [PinjamUserController::class, 'store'])->name('user.pinjam.store');
Route::get('/detail/{id}', [PinjamUserController::class, 'show'])->name('user.pinjam.show');
Route::get('/katalog', [KatalogController::class, 'index'])->name('user.pinjam.index');
Route::get('riwayat', [RiwayatController::class, 'index'])->name('user.riwayat.index');
Route::get('/favorit', [FavoritController::class, 'index'])->name('user.favorit.index');


Route::post('/favorit/{id}', [FavoritController::class, 'store'])->name('user.favorit.store');
Route::delete('/favorit/{id}', [FavoritController::class, 'destroy'])->name('user.favorit.destroy');

Route::get('/dashboard', function () {
    return view('dashboard');
    
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
