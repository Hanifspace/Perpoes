<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'ratings';

    protected $fillable = [
        'user_id',
        'buku_id',
        'rating',
        'komentar',
    ];

    /**
     * Rating milik satu user
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Rating milik satu buku
     */
    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id');
    }
}