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
        $storage = Storage::disk('google');

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
            $directory = "public". "/". $playlist->name;
            $cover_type = $covers[$i]->getClientOriginalExtension();
            $audio_type = $audios[$i]->getClientOriginalExtension();

            $storage->putFileAs($directory, $covers[$i], $names[$i]. ".". $cover_type);
            $storage->putFileAs($directory, $audios[$i], $names[$i]. ".". $audio_type);

            $cover_url = $storage->url($directory. "/". $names[$i]. ".". $cover_type);
            $audio_url = $storage->url($directory. "/". $names[$i]. ".". $audio_type);

            Song::addSong(
                $names[$i],
                $albums[$i],
                $artists[$i],
                $cover_url,
                $audio_url,
                $playlist->id
            );
        }

        return redirect('/admin');
    }

    public function delete() 
    {
        $playlist = Playlist::find(request('id'));
        $storage = Storage::disk('local');
        $storage->deleteDirectory("public". "/". $playlist->name);
        $playlist->songs()->delete();
        $playlist->delete();

        return redirect('/admin');
    }
}
