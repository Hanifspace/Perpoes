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
            'tanggal_pengembalian' => 'nullable|date|after_or_equal:tanggal_peminjaman',
            'status' => 'required|in:menunggu,dipinjam,dikembalikan',
            'user_id' => 'required|exists:users,id',
        ]);
        pinjam::create([
            'buku_id' => $request->input('buku_id'),
            'tanggal_peminjaman' => $request->input('tanggal_peminjaman'),
            'tanggal_pengembalian' => $request->input('tanggal_pengembalian'),
            'status' => $request->input('status'),
            'user_id' => $request->input('user_id'),
        ]);
        return redirect()->route('user.pinjam.index')->with('success', 'Peminjaman berhasil ditambahkan.');
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
