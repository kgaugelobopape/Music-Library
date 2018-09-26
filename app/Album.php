<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = ['name', 'cover', 'genre', 'year', 'artist'];


    public function reviews()
    {
        return $this->hasMany('App\Review');
    }
}

