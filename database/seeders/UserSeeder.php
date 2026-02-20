<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
        
            'nama_lengkap' => 'Admin Perpustakaan',
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'alamat' => 'Jl. Test No. 1',
            'password' => bcrypt('admin12345'),
            'role' => 'admin',
        ]);
        
        User::create([
            'nama_lengkap' => 'Test User',
            'name' => 'Test User',
            'email' => 'user@example.com',
            'alamat' => 'Jl. Test No. 1',
            'password' => bcrypt('password'),
            'role' => 'user', 
        ]);

        User::create([
            'nama_lengkap' => 'Petugas Perpustakaan',
            'name' => 'Petugas',
            'email' => 'petugas@gmail.com',
            'alamat' => 'Jl. Test No. 1',
            'password' => bcrypt('petugas123'),
            'role' => 'petugas',    
        ]);
    }
}
