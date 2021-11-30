<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use App\Models\BookGenre;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AddBookController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index() {
        if(auth()->user()->role > 1){
            $genres = Genre::all();
            return view('add-book', [
                'genres' => $genres
            ]);
        }else {
            return redirect()->back();
        }
        
    }

    public function store(Request $request) {
        if (auth()->user()->role > 1) {
            $this->validate($request, [
                'title' => 'required|max:255',
                'description' => 'required',
                'about' => 'required',
                'author' => 'required',
                'country' => 'required',
            ]);

            $book = new Book();

            
            if($request->hasFile('image')){
                $file = $request->file('image');
                $filename = time() . '.' . $file->extension();
                $file->move('img/books', $filename);
                $book->image = $filename;
            }
            $book->title = $request->title;
            $book->slug = Str::slug($request->title, '-');
            $book->description = $request->description;
            $book->about = $request->about;
            $book->author = $request->author;
            $book->country = $request->country;
            $book->user_id = $request->user()->id;
            
            $book->save();
            
            
            $genres = Genre::all();
            
            
            foreach($genres as $genre){
                $bookGenre = new BookGenre();
                $bookGenre->book_id = $book->id;
                $bookGenre->genres_id = $genre->id;
                $id = $genre->id;
                if(null !== $request->input($id)) {
                    $bookGenre->genre_added = '1';
                }else {
                    $bookGenre->genre_added = '0';
                }
                $bookGenre->save();
            }
            return redirect('/authors-panel')->with('status', 'Книга добавлена!');

        }
    }
}
