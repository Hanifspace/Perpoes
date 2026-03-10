<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\pinjam;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FavoritController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $bukus = $user->favorit; 
        return view('user.favorit.index', compact('bukus'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($id)
    {
        $buku = Buku::findOrFail($id);

        $user = Auth::user();
        if ($user->favorit->contains($buku->id)) {
            return back()->with('error', 'Buku sudah ada di favorit!');
        }

        // Menambahkan buku ke favorit
        $user->favorit()->attach($buku);

        return back()->with('success', 'Buku berhasil ditambahkan ke favorit!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $user = Auth::user();

        if ($user->favorit->contains($buku->id)) {
            return back()->with('error', 'Buku tidak ada di favorit!');
        }
   
        $user->favorit()->detach($buku);

        return back()->with('success', 'Buku berhasil dihapus dari favorit!');
    }
}
