<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Chapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReaderController extends Controller
{
    public function index($book_slug, $chapter_slug) {
        $book = Book::where('slug', $book_slug)->first();
        $chapter = Chapter::where('slug', $chapter_slug)->first();
        
        $next = Chapter::where('book_id', $book->id)
        ->where('id', '>', $chapter->id)
        ->oldest()
        ->first();
        
        $prev = Chapter::where('book_id', $book->id)
        ->where('id', '<', $chapter->id)
        ->latest()
        ->first();
        
        
        return view('reader', [
            'book' => $book,
            'chapter' => $chapter,
            'next' => $next,
            'prev' => $prev
        ]);
    }
}
