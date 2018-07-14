<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name',
        'phone',
    ];

    public function rooms()
    {
        return $this->belongsToMany('App\Room', 'rooms_clients')->withPivot(['period_from', 'period_to'])->withTimestamps();
    }
}
