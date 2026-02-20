<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;

class buku extends Model
{
    protected $table = 'bukus';

    protected $fillable = [
        'judul',
        'kode_buku',
        'kategori_id',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'stok',
        'cover',
        'sinopsis',
    ];

        public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

        public function favorit()
    {
        return $this->belongsToMany(User::class, 'favorites', 'buku_id', 'user_id');
    }

    
}
