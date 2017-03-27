<?php

namespace App\Http\Controllers;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

use App\Playlist;
use App\Song;
use Carbon\Carbon;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
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
        $playlist = Playlist::create([
            'name' => request('list_name')
        ]);

        $names = request('name');
        $albums = request('album');
        $artists = request('artist');
        $covers = request('cover');
        $audios = request('audio');

        for($i = 0; $i < count($names); $i++)
        {
            Song::addSong(
                $names[$i],
                $albums[$i],
                $artists[$i],
                $covers[$i],
                $audios[$i],
                $playlist->id
            );
        }

        return redirect('/admin');
    }

    public function delete() 
    {
        $playlist = Playlist::find(request('id'));
        $playlist->songs()->delete();
        $playlist->delete();

        return redirect('/admin');
    }
}
