<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Song extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'album', 'artist', 'cover_url', 'audio_url', 'playlist_id'];
    
    public static function addSong($name, $album, $artist, $cover_url, $audio_url, $list_id)
    {
        Song::create([
            'name' => $name,
            'album' => $album,
            'artist' => $artist,
            'cover_url' => $cover_url,
            'audio_url' => $audio_url,
            'playlist_id' => $list_id
        ]);
    }
}