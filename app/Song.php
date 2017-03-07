<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Song extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'album', 'artist','playlist_id'];
    
    public static function addSong($name, $album, $artist, $list_id)
    {
        Song::create([
            'name' => $name,
            'album' => $album,
            'artist' => $artist,
            'playlist_id' => $list_id
        ]);
    }
}