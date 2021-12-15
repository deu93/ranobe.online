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
                    if (stripos($_SERVER['HTTP_USER_AGENT'], $row) !== false) {
                        return true;
                    }
                }
            }
        
            return false;
        }
        if(is_bot() == false) {
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
        }
        
        return view('reader', [
            'book' => $book,
            'chapter' => $chapter,
            'next' => $next,
            'prev' => $prev
        ]);
    }
}
