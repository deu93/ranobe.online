<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookLikeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function like(Book $book){
        
        if($book->likedBy(auth()->user())) {
            return $this->destroy_like($book);
        }
       
        $book->likes()->create([
            'user_id' => auth()->user()->id
        ]);
        if($book->dislikedBy(auth()->user())) {
            return $this->destroy_dislike($book);
        }
        return redirect()->back();
    }
    public function dislike(Book $book){
        
        if($book->dislikedBy(auth()->user())) {
            return $this->destroy_dislike($book);
        }
       
        $book->dislikes()->create([
            'user_id' => auth()->user()->id
        ]);
        if($book->likedBy(auth()->user())) {
            return $this->destroy_like($book);
        }
        return redirect()->back();
    }


    public function destroy_like(Book $book) {
        auth()->user()->likes()->where('book_id', $book->id)->delete();
        return redirect()->back();
    }
    public function destroy_dislike(Book $book) {
        auth()->user()->dislikes()->where('book_id', $book->id)->delete();
        return redirect()->back();
    }
}
