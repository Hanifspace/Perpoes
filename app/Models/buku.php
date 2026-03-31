<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;

class Buku extends Model
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

    /**
     * Relasi ke ratings
     */
    public function ratings()
    {
        return $this->hasMany(Rating::class, 'buku_id');
    }

    /**
     * Helper: rata-rata rating
     */
    public function averageRating(): float
    {
        return round($this->ratings()->avg('rating') ?? 0, 1);
    }
}