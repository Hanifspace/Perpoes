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
    public function index(Request $request)
    {
        $q = $request->query('q');

        $peminjaman = Pinjam::with(['user', 'buku'])
            ->where('status', 'dipinjam')
            ->when($q, function ($query) use ($q) {
                $query->whereHas('user', function ($q2) use ($q) {
                    $q2->where('name', 'like', "%{$q}%");
                })
                ->orWhereHas('buku', function ($q3) use ($q) {
                    $q3->where('judul', 'like', "%{$q}%")
                    ->orWhere('kode_buku', 'like', "%{$q}%");
                });
            })
            ->whereIn('status', ['menunggu', 'dipinjam', 'menunggu_pengembalian'])
            ->latest()
            ->paginate(10)
            ->withQueryString();

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

    public function pengembalian(Request $request)
    {
        $q = $request->query('q');

        $pengembalian = Pinjam::with(['user', 'buku'])
            ->where('status', 'dikembalikan') // filter khusus pengembalian
            ->when($q, function ($query) use ($q) {
                $query->whereHas('user', function($q2) use ($q) {
                    $q2->where('name', 'like', "%{$q}%");
                })->orWhereHas('buku', function($q3) use ($q) {
                    $q3->where('judul', 'like', "%{$q}%")
                    ->orWhere('kode_buku', 'like', "%{$q}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.pengembalian.index', compact('pengembalian'));
    }

        public function exportPdf(Request $request)
    {
        $q = $request->query('q');

        $pengembalian = Pinjam::with(['user','buku'])
            ->where('status', 'dikembalikan')
            ->when($q, function($query) use ($q) {
                $query->whereHas('user', function($q2) use ($q){
                    $q2->where('name','like',"%{$q}%");
                })->orWhereHas('buku', function($q3) use ($q){
                    $q3->where('judul','like',"%{$q}%")
                    ->orWhere('kode_buku','like',"%{$q}%");
                });
            })
            ->latest()
            ->get();

        $pdf = Pdf::loadView('admin.pengembalian.export', compact('pengembalian'))
                ->setPaper('A4','portrait');

        return $pdf->download('laporan-pengembalian.pdf');
    }

        public function exportPdf2(Request $request)
    {
        $q = $request->query('q');

        $peminjaman = Pinjam::with(['user','buku'])
            ->where('status', 'dipinjam')
            ->when($q, function($query) use ($q) {
                $query->whereHas('user', function($q2) use ($q){
                    $q2->where('name','like',"%{$q}%");
                })->orWhereHas('buku', function($q3) use ($q){
                    $q3->where('judul','like',"%{$q}%")
                    ->orWhere('kode_buku','like',"%{$q}%");
                });
            })
            ->latest()
            ->get();

        $pdf = Pdf::loadView('admin.peminjaman.export', compact('peminjaman'))
                ->setPaper('A4','portrait');

        return $pdf->download('laporan-peminjaman.pdf');
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
        $validStatus = ['dipinjam', 'dikembalikan', 'ditolak', 'ditolak_pengembalian'];
        if (in_array($request->status, $validStatus)) {
            if ($request->status == 'ditolak_pengembalian') {
                $pinjam->status = 'dipinjam';
            } else {
                $pinjam->status = $request->status;
            }

            if ($request->status == 'dipinjam' && $stok > 0) {
                $pinjam->buku->decrement('stok');
            } elseif ($request->status == 'dikembalikan') {
                $pinjam->buku->increment('stok');
                $pinjam->tanggal_pengembalian = now()->toDateString();
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
