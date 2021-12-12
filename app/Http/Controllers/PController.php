<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use Illuminate\Http\Request;

class PController extends Controller
{
    public function index() {
        $debil = Chapter::all();
        foreach ($debil as $debilchik) {
            $debilchik->chapter_text .= ">" ;
        }
    }
}
