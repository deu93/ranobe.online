<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Chapter;
use Illuminate\Support\Str;
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
            return view('add-chapter', [
                'book' => $book
            ]);
        }
        else {
            return abort(404);
        }
    }

    public function store(Request $request, $slug) {
        if(auth()->user()->role > 1) {
            $this->validate($request, [
                'chapter_name' => 'required',
                'chapter_text' => 'required',
            ]);


            $book = Book::find($slug);
            $chapter = new Chapter();

            $chapter->chapter_name = $request->chapter_name;
            $chapter->chapter_text = $request->chapter_text;
            $chapter->book_id = $book->id;
            $chapter->slug = Str::slug($request->chapter_name);
            $chapter->save();
            dd($chapter);
            return redirect('/authors-panel')->with('status', 'Глава  успешно');
         }
        
         
         
    }
}
