<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pinjam', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_peminjaman');
            $table->date('tanggal_pengembalian')->nullable();
            $table->enum('status', ['menunggu', 'dipinjam', 'dikembalikan'])->default('menunggu');
            
            // Definisikan kolom foreign key
            $table->unsignedBigInteger('buku_id');
            $table->unsignedBigInteger('user_id');

            $table->timestamps();       

            // Menambahkan foreign key constraints
            $table->foreign('buku_id')->references('id')->on('bukus')->restrictOnDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->restrictOnDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinjam');
    }
};
