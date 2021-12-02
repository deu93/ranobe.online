<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookPost;
use App\Models\Chapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DescriptionController extends Controller
{
    public function index($slug) {
        $book = Book::where('slug', $slug)->first();
        $chapters =  Chapter::where('book_id' , $book->id )->get();
        $posts = DB::table('book_posts')
        ->join('users', 'book_posts.user_id', '=', 'users.id')
        ->where('book_posts.book_id', $book->id)
        ->select('book_posts.*', 'users.name')
        ->latest()
        ->get();
        
        $genres = DB::table('book_genres')
        ->join('genres', 'book_genres.genres_id', '=' , 'genres.id')
        ->join('books', 'book_genres.book_id', '=' , 'books.id')
        ->where('book_genres.book_id', $book->id)
        ->select('book_genres.*', 'genres.genres_name', 'genres.id')
        ->get();
        $arr_gen = [];
        foreach($genres as $genre) {
            if($genre->genre_added == '1') {
                $arr_gen[$genre->id] = $genre->genres_name;
            }
        }
        

        $count_posts = BookPost::where('book_id', $book->id)
        ->where('moderated', '1')
        ->get();
        
        return view('description', [
            'book' => $book,
            'chapters' => $chapters,
            'genres' => $genres,
            'posts' => $posts,
            'count_posts' => $count_posts,
            'arr_gen' => $arr_gen
        ]);
    }

    public function store(Request $request, $slug) {
        $this->middleware('auth');
        $this->validate($request, [
            'body' => 'required|max:600'
        ]);
        $book = Book::where('slug', $slug)->first();
        $post = new BookPost();

        $post->book_id = $book->id;
        $post->user_id = auth()->user()->id;
        $post->body = $request->body;
        $post->save();

        return redirect()->back()->with('status', 'Комментарий отправлен на модерацию');
    }
}
