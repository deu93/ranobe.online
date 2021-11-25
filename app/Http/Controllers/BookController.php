<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index($slug) {
        $book = Book::where('slug', $slug)->first();
        $chapters =  Chapter::where('book_id' , $book->id )->get();
        return view('description', [
            'book' => $book,
            'chapters' => $chapters
        ]);
    }
}
