<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['name', 'review'];


    public function album()
    {
        return $this->belongsTo('App\Album');
    }
}
