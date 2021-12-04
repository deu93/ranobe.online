<?php

namespace App\Models;

use App\Models\BookLike;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'image',
        'slug',
        'user_id',
        'description',
        'about',
        'author',
        'country',
    ];
    public  function scopeLike($query, $field, $value){
        return $query->where($field, 'LIKE', "%$value%");
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function genre() {
        return $this->hasMany(Genre::class);
    }

    public function chapter() {
        return $this->hasMany(Chapter::class);
    }
    public function post() {
        return $this->hasMany(BookPost::class);
    }
    public function likes() {
        return $this->hasMany(BookLike::class);
    }
    public function dislikes() {
        return $this->hasMany(BookDislike::class);
    }

    public function likedBy() {
        return $this->likes->contains('user_id', auth()->user()->id);
    }
    public function dislikedBy() {
        return $this->dislikes->contains('user_id', auth()->user()->id);
    }
}
