<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Chapter;
use Illuminate\Http\Request;

class ReaderController extends Controller
{
    public function index($book_slug, $chapter_slug) {
        $book = Book::where('slug', $book_slug)->first();
        $chapter = Chapter::where('slug', $chapter_slug)->first();

        return view('reader', [
            'book' => $book,
            'chapter' => $chapter
        ]);
    }
}
