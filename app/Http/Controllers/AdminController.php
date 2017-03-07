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
            'cover' => 'required',
            'audio' => 'required',
            'list_name' => 'required'
        ]);

        $playlist = Playlist::create([
            'name' => request('list_name')
        ]);

        $names = request('name');
        $albums = request('album');
        $artists = request('artist');
        $covers = Input::file('cover');
        $audios = Input::file('audio');

        for($i = 0; $i < count($names); $i++)
        {
            Storage::putFile($playlist->name, $covers[$i]);
            Storage::putFile($playlist->name, $audios[$i]);

            Song::addSong(
                $names[$i],
                $albums[$i],
                $artists[$i],
                $playlist->id
            );
        }

        return redirect('/admin');
    }

    public function delete() 
    {
        $playlist = Playlist::find(request(['id'][0]));
        Storage::deleteDirectory($playlist->name);
        $playlist->songs()->delete();
        $playlist->delete();

        return redirect('/admin');
    }
}
