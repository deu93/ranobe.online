<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    

    public function index() {
        return view('search');
    }
    public function search(Request $request) {
        
        $this->validate($request, [
            'search' => 'required|min:3|max:255'
        ]);
        $search = Book::like('title', $request->search)->with('user','likes','dislikes','chapter')->paginate(20);
        return view('search', [
            'search_results' => $search
        ]);
    }
}
