<?php

namespace App\Http\Controllers;

use App\Playlist;
use App\Song;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index() 
    {
        $playlists = Playlist::latest()
                    ->filter(request(['month', 'year']))
                    ->get();

        return view('admin.index', compact('playlists'));
    }

    public function create() 
    {
        return view('admin.create');   
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'album' => 'required',
            'artist' => 'required',
            'list_name' => 'required'
        ]);

        $playlist = Playlist::create([
            'name' => request('list_name')
        ]);

        Song::addSongs(
            request(['name', 'album', 'artist']), 
            $playlist->id
        );

        return redirect('/admin');
    }

    public function delete() 
    {
        $playlist = Playlist::find(request(['id'][0]));
        $playlist->songs()->delete();
        $playlist->delete();

        return redirect('/admin');
    }
}
