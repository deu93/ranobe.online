<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Book;
use App\Models\Chapter;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ChapterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($slug) {
        $book = Book::where('slug', $slug)->first();
        
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

            $book = Book::where('slug', $slug)->first();;
            $chapter = new Chapter();
            dd($request->chapter_text);
            $chapter->chapter_name = $request->chapter_name;
            $chapter->chapter_text = $request->chapter_text;
            $chapter->book_id = $book->id;
            $chapter->slug = Str::slug($request->chapter_name,'-');
            $chapter->save();

            $book->updated_at = new DateTime();
            $book->update();
            return redirect()->back()->with('status', 'Глава успешно добавлена');
         }         
    }

    public function edit($id) {
        $chapter = Chapter::find($id);
        $book = Book::where('id', $chapter->book_id)->first();
        return view('edit-chapter', [
            'chapter' => $chapter,
            'book' => $book
        ]);
    }


    public function update(Request $request, $id) {
        if(auth()->user()->role > 1) {
            $this->validate($request, [
                'chapter_name' => 'required',
                'chapter_text' => 'required',
            ]);

            
            $chapter = Chapter::find($id);
            $book = Book::where('id', $chapter->book_id)->first();
            $chapter->chapter_name = $request->chapter_name;
            $chapter->chapter_text = $request->chapter_text;
            $chapter->update();

            
            return redirect('/chapters-panel/' . $book->slug)->with('status', 'Глава успешно обновлена');
         }         
    }


    public function destroy($id) {
        $chapter = Chapter::find($id);
        if ((auth()->user()->role == 2 and auth()->user()->id == $chapter->user_id) or auth()->user()->role > 3) {
            $chapter->delete();
            return redirect()->back()->with('status', 'Глава удалена');
        } else {
            return abort(404);
        }
        
    }

    public function multiIndex($slug){
        $book = Book::where('slug', $slug)->first();
        return view('add-chapters', [
            'book' => $book
        ]);
    }

    public function multiStore(Request $request, $slug) {
        $this->validate($request, [
            'file' => 'required',
            
        ]);
       
        if(auth()->user()->role == 5) {
            
            if($request->hasFile('file')){
                $file = $request->file('file');
                
                $filename = time() . '.' . $file->extension();
                $file->move('files/chapters', $filename);
                
            }
            $json_chapters = json_decode(file_get_contents('files/chapters/'.$filename), true);
            
            $book = Book::where('slug', $slug)->first();;
            $count = 0;
            foreach($json_chapters as $item) {
                $chapter = new Chapter();
                $ptd = $item['text'];
                $text =  $ptd;
                dd($text);
                $count += 1; 
                
                
                $chapter->chapter_name = $item['title'];
                $chapter->chapter_text = $text;  
                $chapter->book_id = $book->id;
                $chapter->slug = Str::slug($item['title'],'-');
                $chapter->created_at = new DateTime('+'.$count.' seconds');
                $chapter->updated_at = new DateTime('+'.$count.' seconds');
                $chapter->save();
            }
            $path = 'files/chapters/' . $filename;
                if(File::exists($path)) {
                    File::delete($path);
                }

            $book->updated_at = new DateTime();
            $book->update();
            return redirect()->back()->with('status', 'Главы успешно добавлены');
         }
    }
}
