<?php

namespace App\Http\Controllers;

use App\Models\pinjam;
use App\Models\buku;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;

class RiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $user = Auth::id();

        $bukus = pinjam::where('user_id', $user)
            ->with('buku.kategori')
            ->get();

        return view('user.riwayat.index', compact('bukus','user'));
    }

        public function buktiPeminjaman(string $id)
    {
        $userId = Auth::id();

        $pinjam = pinjam::with(['user', 'buku.kategori'])
            ->where('user_id', $userId)
            ->findOrFail($id);

        $pdf = Pdf::loadView('user.riwayat.bukti_peminjaman', compact('pinjam'))
            ->setPaper('A4', 'portrait');

        return $pdf->stream('bukti-peminjaman-' . $pinjam->id . '.pdf');
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
