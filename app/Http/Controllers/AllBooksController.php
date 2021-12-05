<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class AllBooksController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('updated_at', 'desc')->with('user','likes','dislikes','chapter')->paginate(20);
  
    return view('all-books', [
        'books' => $books,
    ]);
    }
}
