<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Chapter;
use Illuminate\Http\Request;

class ChaptersPanelController extends Controller
{
    public function index($slug) {
        $book = Book::where('slug', $slug)->first();
        $chapters = Chapter::where('book_id', $book->id)->paginate(20);

        return view('chapters-panel', [
            'book' => $book,
            'chapters' => $chapters
        ]);
    }
}
