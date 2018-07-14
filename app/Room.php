<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'name',
        'short_description',
        'number',
        'image',
    ];

    public function clients()
    {
        return $this->belongsToMany('App\Client', 'rooms_clients')->withPivot(['period_from', 'period_to'])->withTimestamps();
    }

    public function period($from, $to)
    {
        return $this->belongsToMany('App\Client', 'rooms_clients')->withPivot('period_from', 'period_to')->withTimestamps()
            ->where('period_from', '>=', $from)
            ->where('period_to', '<=', $to);
    }

}
