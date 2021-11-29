<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class AuthorsPanelController extends Controller
{
    public function __construct()
    {
        
        $this->middleware('auth');
    }
    public function index() {
        if(auth()->user()->role < 2) {
             return abort(404);
        }else{
            $books = Book::where('user_id', auth()->user()->id)->paginate(3);
            return view('authors-panel', [
                'books' => $books
            ]);
        }
    }
}
