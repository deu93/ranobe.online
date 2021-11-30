<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use App\Models\Chapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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


    public function edit($slug) {
        $book= Book::where('slug',$slug)->first();
        $genres_menu = Genre::all();
        $books = DB::table('books')
        ->join('book_genres', 'books.id', '=' , 'book_genres.book_id')
        ->join('genres', 'book_genres.genres_id', '=' , 'genres.id')
        ->where('books.id', $book->id)
        ->select('books.*',  'genres.genres_name', 'book_genres.genre_added', 'book_genres.genres_id')
        ->get();
        dd($books);
    }
}
