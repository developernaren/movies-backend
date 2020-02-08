<?php

namespace Mauqah\Films;

use Illuminate\Support\ServiceProvider;
use Mauqah\Films\Entities\Country;
use Mauqah\Films\Entities\Film;
use Mauqah\Films\Entities\Genre;
use Mauqah\Films\Interfaces\CountryInterface;
use Mauqah\Films\Interfaces\FilmInterface;
use Mauqah\Films\Interfaces\GenreInterface;

class FilmServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(FilmInterface::class, Film::class);
        $this->app->bind(GenreInterface::class, Genre::class);
        $this->app->bind(CountryInterface::class, Country::class);
    }
}
