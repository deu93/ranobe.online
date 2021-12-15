<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Chapter;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index() {
        return response()->view('sitemap.index')->header('Content-Type','text/xml');
    }

    public function books() {
        $books = Book::all();
        return response()->view('sitemap.books', [
            'books' => $books
        ])->header('Content-Type','text/xml');
    }
    
}
