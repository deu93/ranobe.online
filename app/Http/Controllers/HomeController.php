<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Chapter;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $books = DB::table('books')->orderBy('updated_at', 'desc')->paginate(20);
        Carbon::setLocale('ru');
        
       
        
        return view('home', [
            'books' => $books,
            
        ]);
    }
}
