<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'album', 'artist', 'playlist_id'];
    
    public static function addSongs($query, $list_id) 
    {
        $names = $query['name'];
        $albums = $query['album'];
        $artists = $query['artist'];

        for($i = 0; $i < count($names); $i++)
        {
            Song::create([
                'name' => $names[$i],
                'album' => $albums[$i],
                'artist' => $artists[$i],
                'playlist_id' => $list_id
            ]);
        }
    }

}
