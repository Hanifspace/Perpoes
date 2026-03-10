<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; 
use App\Models\Pinjam;
use App\Models\Buku;

class PinjamAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peminjaman = Pinjam::with(['user', 'buku'])->latest()->get();
        return view('admin.peminjaman.index', compact('peminjaman'));
    }

        public function downloadLaporan($id)
    {
        $pinjam = Pinjam::with(['user', 'buku'])->findOrFail($id);

        $pdf = Pdf::loadView('admin.peminjaman.laporan_pdf', compact('pinjam'))
            ->setPaper('A4', 'portrait');

        $filename = 'laporan-peminjaman-' . $pinjam->id . '.pdf';

        return $pdf->stream($filename);
    }

    public function pengembalian()
    {
        $pengembalian = Pinjam::with(['user', 'buku'])->latest()->get();
        return view('admin.pengembalian.index', compact('pengembalian'));
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
    public function update(Request $request, $id)
    {
        $pinjam = Pinjam::findOrFail($id);
        $stok = Buku::findOrFail($pinjam->buku_id)->stok;

        $validStatus = ['dipinjam', 'dikembalikan', 'ditolak'];

        if (in_array($request->status, $validStatus)) {
            $pinjam->status = $request->status; // simpan lowercase, konsisten
            if ($request->status == 'dipinjam' && $stok > 0) {
                $pinjam->buku->decrement('stok');
            } elseif ($request->status == 'dikembalikan') {
                $pinjam->buku->increment('stok');
            }
             $pinjam->save();

        }

        return redirect()->route('admin.peminjaman.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
