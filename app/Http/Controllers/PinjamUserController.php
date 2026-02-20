<?php

namespace App\Http\Controllers;

use App\Models\Buku; 
use App\Models\pinjam;
use Illuminate\Http\Request;

class PinjamUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($buku_id)
    {
        $buku = Buku::findOrFail($buku_id);  
        return view('user.pinjam.create', compact('buku'));  
    }

    /**
     * Store a newly created resource in storage.
     */
        public function store(Request $request)
        {       
            $request->validate([
                'buku_id' => 'required|exists:bukus,id',
                'tanggal_peminjaman' => 'required|date',
                'tanggal_pengembalian' => 'required|date|after:tanggal_peminjaman',
            ]);

            Pinjam::create([
                'buku_id' => $request->buku_id,
                'user_id' => auth()->id,
                'tanggal_peminjaman' => $request->tanggal_peminjaman,
                'tanggal_pengembalian' => $request->tanggal_pengembalian,
                'status' => 'menunggu',  // Status awal pinjaman
            ]);

            return redirect()->route('user.riwayat.index')->with('success', 'Permintaan peminjaman berhasil diajukan!');
        }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $buku = Buku::findOrFail($id);
        $buku->load('kategori');
        return view('user.pinjam.show', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
