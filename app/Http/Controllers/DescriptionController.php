<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\UserIp;
use App\Models\Chapter;
use App\Models\BookPost;
use App\Models\BookView;
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
        
        
        function is_bot()
        {
            if (!empty($_SERVER['HTTP_USER_AGENT'])) {
                $options = array(
                    'YandexBot', 'YandexAccessibilityBot', 'YandexMobileBot','YandexDirectDyn',
                    'YandexScreenshotBot', 'YandexImages', 'YandexVideo', 'YandexVideoParser',
                    'YandexMedia', 'YandexBlogs', 'YandexFavicons', 'YandexWebmaster',
                    'YandexPagechecker', 'YandexImageResizer','YandexAdNet', 'YandexDirect',
                    'YaDirectFetcher', 'YandexCalendar', 'YandexSitelinks', 'YandexMetrika',
                    'YandexNews', 'YandexNewslinks', 'YandexCatalog', 'YandexAntivirus',
                    'YandexMarket', 'YandexVertis', 'YandexForDomain', 'YandexSpravBot',
                    'YandexSearchShop', 'YandexMedianaBot', 'YandexOntoDB', 'YandexOntoDBAPI',
                    'Googlebot', 'Googlebot-Image', 'Mediapartners-Google', 'AdsBot-Google',
                    'Mail.RU_Bot', 'bingbot', 'Accoona', 'ia_archiver', 'Ask Jeeves', 
                    'OmniExplorer_Bot', 'W3C_Validator', 'WebAlta', 'YahooFeedSeeker', 'Yahoo!',
                    'Ezooms', '', 'Tourlentabot', 'MJ12bot', 'AhrefsBot', 'SearchBot', 'SiteStatus', 
                    'Nigma.ru', 'Baiduspider', 'Statsbot', 'SISTRIX', 'AcoonBot', 'findlinks', 
                    'proximic', 'OpenindexSpider','statdom.ru', 'Exabot', 'Spider', 'SeznamBot', 
                    'oBot', 'C-T bot', 'Updownerbot', 'Snoopy', 'heritrix', 'Yeti',
                    'DomainVader', 'DCPbot', 'PaperLiBot'
                );
        
                foreach($options as $row) {
                    if (stripos($_SERVER['HTTP_USER_AGENT'], $row) != false) {
                        return true;
                    }
                }
            }
        
            return false;
        }
        if (is_bot() == false) {
            $visitor_ip = $_SERVER['REMOTE_ADDR'];
            $visited = UserIp::where('ip_address', $visitor_ip)->where('book_id', $book->id)->first();
            $book_view = BookView::where('book_id', $book->id)->first();
            
            if($visited == null) {
                $visited = new UserIp();
                $visited->ip_address = $visitor_ip;
                $visited->book_id = $book->id;
                $visited->save();

                
                if($book_view == null) {
                    $book_view = new BookView();
                    $book_view->book_id = $book->id;
                    $book_view->views = 1;
                    $book_view->save();
                }
                else if ($book_view != null){
                    
                    $book_view->views = $book_view->views + 1;
                    
                    $book_view->update();
                }
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
            'arr_gen' => $arr_gen,
            'book_views' => $book_view
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

        return redirect()->back()->with('status', '?????????????????????? ?????????????????? ???? ??????????????????');
    }
}
