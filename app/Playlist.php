<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Playlist extends Model
{
    protected $fillable = ['name'];

    public function songs()
    {
        return $this->hasMany(Song::class);
    }

    public static function archive()
    {
        return Playlist::selectRaw('year(created_at) as year, monthname(created_at) as month, count(*) as count')
                        ->groupBy('year', 'month')
                        ->orderByRaw('min(created_at) desc')
                        ->get()
                        ->toArray();
    }

    public function scopeFilter($query, $filters)
    {
        if($month = $filters['month'])
        {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if($year = $filters['year'])
        {
            $query->whereYear('created_at', Carbon::parse($year)->year);
        }
    }
}
