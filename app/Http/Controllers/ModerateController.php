<?php

namespace App\Http\Controllers;

use App\Models\BookPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModerateController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index() {
        $posts = DB::table('book_posts')
        ->join('users', 'book_posts.user_id', '=', 'users.id')
        ->join('books', 'book_posts.book_id', '=', 'books.id')
        ->where('book_posts.moderated', '=','0')
        ->select('book_posts.*', 'users.name', 'books.title','books.slug')
        ->get();
        return view('moderate-panel', [
            'posts' => $posts
        ]);
    }

    public function accept($id) {
        if(auth()->user()->role == 1 or auth()->user()->role > 2) {
            $post = BookPost::where('id',$id)->first();
            $post->moderated = '1';
            
            $post->save();
            return redirect()->back()->with('status', 'Успешно');
        }

    }
    public function delete($id) {
        if(auth()->user()->role == 1 or auth()->user()->role > 2) {
            $post = BookPost::where('id',$id)->first();
            $post->delete();
            return redirect()->back()->with('status', 'Успешно');
        }
    }
}
