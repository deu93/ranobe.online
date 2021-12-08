<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use App\Models\Chapter;
use App\Models\BookGenre;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class BookController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit($slug) {
        $book= Book::where('slug',$slug)->first();
        
        $books = DB::table('book_genres')
        ->join('genres', 'book_genres.genres_id', '=' , 'genres.id')
        ->join('books', 'book_genres.book_id', '=' , 'books.id')
        ->where('book_genres.book_id', $book->id)
        ->select('book_genres.*', 'genres.genres_name', 'genres.id')
        ->get();
        
        if(!$books->count()) {
            $books = DB::table('book_genres')
            ->join('genres', 'book_genres.genres_id', '=' , 'genres.id')
            ->join('books', 'book_genres.book_id', '=' , 'books.id')
            
            ->select('book_genres.*', 'genres.genres_name', 'genres.id')
            ->get();
            foreach($books as $book1) {
                $book1->genre_added = 0;
            }
            
        }
        
        
        if((auth()->user()->role > 1 and auth()->user()->id = $book->user_id) or auth()->user()->role > 3) {

            return view('edit-book', [
                'books' => $books,
                'book' =>$book
            ]);
        }
    }

    public function update(Request $request, $slug) {
        $book = Book::where('slug', $slug)->first();
        
        if((auth()->user()->role > 1 and auth()->user()->id = $book->user_id) or auth()->user()->role > 3) {
            $this->validate($request,[
                'title' => 'required|max:255',
                'description' => 'required',
            ]);

            if($request->hasFile('image')){


                $path = 'img/books/' . $book->image;
                if(File::exists($path)) {
                    File::delete($path);
                }


                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $file->extension();
                $file->move('img/books', $filename);
                $book->image = $filename;
                
            }
            
            $book->title = $request->title;
            $book->slug = Str::slug($request->title, '-');
            $book->description = $request->description;
            $book->user_id = $request->user()->id;
            
            $book->update();
            
            
            $genres = Genre::all();
            
            
            foreach($genres as $genre){
                $bookGenre = BookGenre::where('book_id', $book->id)->where('genres_id', $genre->id)->first();
                
                if(null !== $bookGenre) {
                    
                    $id = $genre->id;
                    if(null !== $request->input($id)) {
                        $bookGenre->genre_added = '1';
                        $bookGenre->book_id = $book->id;
                        $bookGenre->genres_id = $genre->id;
                    }
                    else{
                        $bookGenre->book_id = $book->id;
                        $bookGenre->genres_id = $genre->id;
                        $bookGenre->genre_added = '0';
                    }
                    $bookGenre->update();

                }else{
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
                
            }
            return redirect('/authors-panel')->with('status', 'Книга обновлена');    
        }
    }

    public function destroy($slug){
        $book = Book::where('slug', $slug)->first();
        if ((auth()->user()->role == 2 and auth()->user()->id == $book->user_id) or auth()->user()->role > 3) {
            $book->delete();
            return redirect('/')->with('status', 'Книга удалена');
        } else {
            return abort(404);
        }
    }
}
