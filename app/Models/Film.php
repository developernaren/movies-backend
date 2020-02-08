<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $fillable = [
        'name',
        'description',
        'release_date',
        'rating',
        'ticket_price',
        'country_id',
        'photo',
        'slug',
    ];

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'film_genres');
    }

    public function comments()
    {
        return $this->hasMany(FilmComment::class);
    }
}
