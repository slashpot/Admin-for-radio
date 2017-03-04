<?php

namespace App\Http\Controllers;

use App\Song;

class RadioController extends Controller
{
    public function index() {
        $song = Song::first();
        return view('radio.index', compact('song'));
    }

}
