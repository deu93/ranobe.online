<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use Illuminate\Http\Request;

class FinishedBooksController extends Controller
{
    public function index()
    {
        Carbon::setLocale('ru');
        $books = Book::orderBy('updated_at', 'desc')->where('status', '1')->with('user','likes','dislikes','chapter')->paginate(20);
        
    return view('finished-books', [
        'books' => $books,
    ]);
    }
}
