<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Chapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DescriptionController extends Controller
{
    public function index($slug) {
        $book = Book::where('slug', $slug)->first();
        $chapters =  Chapter::where('book_id' , $book->id )->get();
        $genres = DB::table('book_genres')
        ->join('genres', 'book_genres.genres_id', '=' , 'genres.id')
        ->join('books', 'book_genres.book_id', '=' , 'books.id')
        ->where('book_genres.book_id', $book->id)
        ->select('book_genres.*', 'genres.genres_name', 'genres.id')
        ->get();
        return view('description', [
            'book' => $book,
            'chapters' => $chapters,
            'genres' => $genres
        ]);
    }
}
