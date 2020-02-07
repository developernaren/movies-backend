<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'film_genres');
    }
}
