<?php

namespace App\Http\Controllers;

use App\Playlist;
use App\Song;

class RadioController extends Controller
{
    public function index() {
        $playlist = Playlist::all()->last();
        $listname = $playlist->name;
        $songs = $playlist->songs()->get();

        return view('radio.index', compact('songs', 'listname'));
    }


}
