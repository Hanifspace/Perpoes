<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Buku;
use App\Models\Pinjam; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    /**
     * Halaman form rating (user.rating.index)
     * Route: GET /user/rating/{buku_id}
     */
    public function index($buku_id)
    {
        $buku = Buku::with('ratings.user')->findOrFail($buku_id);

        // Cek apakah user ini pernah meminjam buku ini dan sudah dikembalikan
        $pernahPinjam = Pinjam::where('user_id', Auth::id())
            ->where('buku_id', $buku_id)
            ->where('status', 'dikembalikan')
            ->exists();

        if (!$pernahPinjam) {
            abort(403, 'Kamu belum pernah meminjam buku ini.');
        }

        // Cek apakah user sudah pernah rating buku ini
        $sudahRating = Rating::where('user_id', Auth::id())
            ->where('buku_id', $buku_id)
            ->first();

        return view('user.rating.index', compact('buku', 'sudahRating'));
    }

    /**
     * Simpan rating baru
     * Route: POST /user/rating/{buku_id}
     */
    public function store(Request $request, $buku_id)
    {
        $request->validate([
            'rating'   => 'required|integer|min:1|max:5',
            'komentar' => 'nullable|string|max:1000',
        ]);

        // Upsert: kalau sudah pernah rating, update. Kalau belum, insert.
        Rating::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'buku_id' => $buku_id,
            ],
            [
                'rating'   => $request->rating,
                'komentar' => $request->komentar,
            ]
        );

        return redirect()->route('user.riwayat.index')
            ->with('success', 'Rating berhasil disimpan!');
    }

        public function destroy($id)
    {
        $rating = Rating::findOrFail($id);
        $buku_id = $rating->buku_id;
        $rating->delete();
 
        return redirect()->route('admin.buku.show', $buku_id)
            ->with('success', 'Rating berhasil dihapus.');
    }
    
}