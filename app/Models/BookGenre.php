<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookGenre extends Model
{
    use HasFactory;

    protected $fillable = [
        'genre_added',
        'book_id',
        'genres_id',
    ];

    public function genres() {
        return $this->hasOne(Genre::class);
    }
}
