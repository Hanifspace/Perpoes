<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getBukuCount()
    {
        return Buku::count();   
    }

    public function index(Request $request)
    {
        $q = $request->query('q');

        $bukus = Buku::query()
            ->with('kategori')
            ->when($q, function ($query) use ($q) {
                $query->where(function ($sub) use ($q) {
                    $sub->where('judul', 'like', "%{$q}%")
                        ->orWhere('penulis', 'like', "%{$q}%")
                        ->orWhere('penerbit', 'like', "%{$q}%")
                        ->orWhere('kode_buku', 'like', "%{$q}%"); 
                });
            })
            ->get();

        return view('admin.buku.index', compact('bukus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::orderBy('nama_kategori')->get();
        return view('admin.buku.create', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'kode_buku' => 'required|string|max:100|unique:bukus,kode_buku',
            'kategori_id' => 'required|exists:kategoris,id',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|digits:4|integer|min:1000|max:' . date('Y'),
            'stok' => 'required|integer|min:0',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'sinopsis' => 'required|string',
        ]);

        if ($request->hasFile('cover')) {
            $validated['cover'] = $request->file('cover')->store('covers', 'public');
        }

        Buku::create($validated);

        return redirect()
            ->route('admin.buku.index')
            ->with('success', 'Buku berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(buku $buku)
    {
         $buku->load('kategori');
        return view('admin.buku.show', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(buku $buku)
    {
        $kategoris = Kategori::orderBy('nama_kategori')->get();
        return view('admin.buku.edit', compact('buku', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, buku $buku)
    {
         $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'kode_buku' => 'required|string|max:100|unique:bukus,kode_buku,' . $buku->id,
            'kategori_id' => 'required|exists:kategoris,id',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|digits:4|integer|min:1000|max:' . date('Y'),
            'stok' => 'required|integer|min:0',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('cover')) {
            if ($buku->cover && Storage::disk('public')->exists($buku->cover)) {
                Storage::disk('public')->delete($buku->cover);
            }
            $validated['cover'] = $request->file('cover')->store('covers', 'public');
        }

        $buku->update($validated);

        return redirect()
            ->route('admin.buku.index')
            ->with('success', 'Buku berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(buku $buku)
    {
         if ($buku->cover && Storage::disk('public')->exists($buku->cover)) {
            Storage::disk('public')->delete($buku->cover);
        }

        $buku->delete();

        return redirect()
            ->route('admin.buku.index')
            ->with('success', 'Buku berhasil dihapus.');
    }
}
