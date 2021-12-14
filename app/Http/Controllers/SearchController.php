<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    

    public function index() {
        Carbon::setLocale('ru');
        return view('search');
    }
    public function search(Request $request) {
        Carbon::setLocale('ru');
        $this->validate($request, [
            'search' => 'required|min:3|max:255'
        ]);
        $search = Book::like('title', $request->search)->with('user','likes','dislikes','chapter')->paginate(20);
        return view('search', [
            'search_results' => $search
        ]);
    }
}
