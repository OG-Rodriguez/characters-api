<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = ['name', 'classification', 'release_date', 'review', 'description'];

    public function characters()
    {
        return $this->belongsToMany(Character::class, 'character_movie');
    }
}

