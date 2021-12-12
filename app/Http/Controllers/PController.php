<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use Illuminate\Http\Request;

class PController extends Controller
{
    public function index($id) {
        $debil = Chapter::where('book_id', $id)->get();
        foreach ($debil as $debilchik) {
            $debilchik->chapter_text .= ">";
            $debilchik->update();
        }
    }
}
