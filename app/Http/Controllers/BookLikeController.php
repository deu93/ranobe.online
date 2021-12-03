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
    public function store(Book $book, Request $request){
        $book->likes()->create([
            'user_id' => auth()->user()->id
        ]);
        return redirect()->back();
    }
}
