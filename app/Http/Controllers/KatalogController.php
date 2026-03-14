<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\buku;

class KatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {   
        $bukus = buku::with('kategori')
            ->when($request->search, function($query, $search) {
                $query->where('judul', 'like', "%{$search}%")
                    ->orWhere('penulis', 'like', "%{$search}%");
            })
            ->latest()->get();
        $favoritIds = Auth::check() 
            ? Auth::user()->favorit->pluck('id')->toArray() 
            : [];
        return view('user.pinjam.index', compact('bukus', 'favoritIds'));
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
    public function store(Request $request)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}
