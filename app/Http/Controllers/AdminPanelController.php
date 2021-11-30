<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class AdminPanelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        if(auth()->user()->role > 4) {
            return view('admin-panel');
        }
        else{
            return abort(404);
        }
    }

    public function store(Request $request){
        if(auth()->user()->role == 5) {
            $this->validate($request, [
                'genres_name' => 'required|max:255'
            ]);

            $genre = new Genre();
            $genre->genres_name = $request->genres_name;
            $genre->save();

            return redirect()->back()->with('status', 'Жанр добавлен успешно');
        }
    }
}
