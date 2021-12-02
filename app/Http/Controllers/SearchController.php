<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    

    public function index(Request $request) {
        $this->validate($request, [
            'search' => 'required|min:3|max:255'
        ]);
        $search = Book::like('title', $request->search);
        return view('search');
    }
}
