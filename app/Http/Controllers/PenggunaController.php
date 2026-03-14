<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\User;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

        public function getPenggunaCount()
    {
        return User::where('role', 'user')->count();   
    }

    public function index(Request $request)
    {
        $q = $request->query('q');

        $nama = User::query()
            ->where('role', 'user')
            ->when($q, function ($query) use ($q) {
                $query->where(function ($sub) use ($q) {
                    $sub->where('nama_lengkap', 'like', "%{$q}%")
                        ->orWhere('name', 'like', "%{$q}%")
                        ->orWhere('email', 'like', "%{$q}%")
                        ->orWhere('alamat', 'like', "%{$q}%");
                });
            })
            ->orderBy('nama_lengkap')
            ->paginate(10)
            ->withQueryString();

        return view('admin.pengguna.index', compact('nama'));
    }

    public function index2()
    {
        $users = User::where('role', 'user')->get();
        return view('user.dashboard', compact('users'));
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
        $user = User::where('role', 'user')->findOrFail($id);
        $user->delete();

        return redirect()->route('admin.pengguna.index')
            ->with('success', 'User berhasil dihapus.');
    }

        public function exportPdf(Request $request)
    {
        $q = $request->q;

        $nama = User::query()
            ->when($q, function ($query) use ($q) {
                $query->where('nama_lengkap', 'like', "%{$q}%")
                    ->orWhere('name', 'like', "%{$q}%")
                    ->orWhere('email', 'like', "%{$q}%");
            })
            ->where('role', 'user')
            ->orderBy('id', 'desc')
            ->get();

        $pdf = Pdf::loadView('admin.pengguna.export', [
            'nama' => $nama,
            'q'    => $q,
        ])->setPaper('A4', 'landscape'); // biar muat tabel lebar

        return $pdf->download('daftar-pengguna.pdf');
    }
}
