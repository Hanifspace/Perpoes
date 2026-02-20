<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nama = User::where('role', 'petugas')->get();
        return view('admin.petugas.index', compact('nama'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.petugas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validate = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'alamat' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // Create new user with role 'petugas'
        $user = new \App\Models\User();
        $user->nama_lengkap = $validate['nama_lengkap'];
        $user->name = $validate['name'];
        $user->alamat = $validate['alamat'];
        $user->email = $validate['email'];
        $user->password = \Illuminate\Support\Facades\Hash::make($validate['password']);
        $user->role = 'petugas';
        $user->save();

        return redirect()->route('admin.petugas.index')->with('success', 'Petugas berhasil ditambahkan.');
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
        $petugas = User::where('role', 'petugas')->findOrFail($id);
        return view('admin.petugas.edit', compact('petugas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $petugas = User::where('role', 'petugas')->findOrFail($id);

    $validate = $request->validate([
        'nama_lengkap' => 'required|string|max:255',
        'name'         => 'required|string|max:255',
        'alamat'       => 'required|string',
        'email'        => 'required|string|email|max:255|unique:users,email,' . $petugas->id,
        // password optional saat edit
        'password'     => 'nullable|string|min:8',
    ]);

    $petugas->nama_lengkap = $validate['nama_lengkap'];
    $petugas->name         = $validate['name'];
    $petugas->alamat       = $validate['alamat'];
    $petugas->email        = $validate['email'];

    if (!empty($validate['password'])) {
        $petugas->password = \Illuminate\Support\Facades\Hash::make($validate['password']);
    }

    $petugas->save();

    return redirect()->route('admin.petugas.index')->with('success', 'Petugas berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
            $petugas = User::where('role', 'petugas')->findOrFail($id);
            $petugas->delete();

            return redirect()->route('admin.petugas.index')->with('success', 'Petugas berhasil dihapus.');
    }
}
