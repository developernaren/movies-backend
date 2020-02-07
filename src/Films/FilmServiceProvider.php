<?php

namespace Mauqah\Films;

use Illuminate\Support\ServiceProvider;
use Mauqah\Films\Entities\Film;
use Mauqah\Films\Interfaces\FilmInterface;

class FilmServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(FilmInterface::class, Film::class);
    }
}
