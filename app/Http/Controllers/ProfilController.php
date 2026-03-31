<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'user') {
            return view('profil.index', compact('user'));
        }

        return view('profil.index_admin', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'name'         => 'required|string|max:255',
            'alamat'       => 'required|string|max:255',
            'email'        => 'required|email|unique:users,email,' . $user->id,
            'password'     => 'nullable|string|min:8|confirmed',
        ]);

        $user->nama_lengkap = $request->nama_lengkap;
        $user->name         = $request->name;
        $user->alamat       = $request->alamat;
        $user->email        = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('profil.index')
            ->with('success', 'Profile berhasil diperbarui.');
    }

    public function destroy()
    {
        $user = Auth::user();
 
        if ($user->role === 'admin') {
            return redirect()->route('profil.index')
                ->with('error', 'Akun admin tidak dapat dihapus.');
        }
 
        Auth::logout();
 
        // Hapus data terkait sebelum hapus user
        $user->pinjam()->delete();
        $user->ratings()->delete();
        $user->favorit()->detach();
        $user->delete();
 
        return redirect('/')->with('success', 'Akun berhasil dihapus.');
    }
}