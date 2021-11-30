<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($slug) {
        $book = Book::find($slug);
        if ((auth()->user()->role == 2 and auth()->user()->id == $book->user_id) or auth()->user()->role > 2 ) {
            return view('add-chapter');
        }
        else {
            return abort(404);
        }
    }
}
