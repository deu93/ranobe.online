<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Chapter;
use App\Models\ChapterView;
use Illuminate\Http\Request;
use App\Models\UserChapterIp;
use Illuminate\Support\Facades\DB;

class ReaderController extends Controller
{
    public function index($book_slug, $chapter_slug) {
        $book = Book::where('slug', $book_slug)->first();
        $chapter = Chapter::where('slug', $chapter_slug)->first();
        
        $next = Chapter::where('book_id', $book->id)
        ->where('id', '>', $chapter->id)
        ->oldest()
        ->first();

        $prev = Chapter::where('book_id', $book->id)
        ->where('id', '<', $chapter->id)
        ->latest()
        ->first();
        
        $visitor_ip = $_SERVER['REMOTE_ADDR'];
        $visited = UserChapterIp::where('ip_address', $visitor_ip)->where('chapter_id', $chapter->id)->first();
        $chapter_view = ChapterView::where('chapter_id', $chapter->id)->first();
        
        if($visited == null) {
            $visited = new UserChapterIp();
            $visited->ip_address = $visitor_ip;
            $visited->chapter_id = $chapter->id;
            $visited->save();

            
            if($chapter_view == null) {
                $chapter_view = new ChapterView();
                $chapter_view->chapter_id = $chapter->id;
                $chapter_view->views = 1;
                $chapter_view->save();
            }
            else if ($chapter_view != null){
                
                $chapter_view->views = $chapter_view->views + 1;
                
                $chapter_view->update();
            }
        }
        
        return view('reader', [
            'book' => $book,
            'chapter' => $chapter,
            'next' => $next,
            'prev' => $prev
        ]);
    }
}
