<?php

use Mauqah\Films\Actions\CreateFilm;
use Mauqah\Films\Actions\FetchCountries;
use Mauqah\Films\Actions\FetchFilms;
use Mauqah\Films\Actions\FetchGenres;
use Mauqah\Films\Actions\GetFilmDetails;
use Mauqah\Films\Actions\ListFilms;

$router->group(['prefix' => '/api/films'], function ($router) {
    $router->get('', FetchFilms::class)->name('films.list');
    $router->get('{slug}', GetFilmDetails::class)->name('films.detail');
    $router->post('', CreateFilm::class)->name('films.detail');
});

$router->group(['prefix' => '/api'], function ($router) {
    $router->get('countries', FetchCountries::class)->name('films.list');
    $router->get('genres', FetchGenres::class)->name('films.detail');
});

/*
 * This is the default route for spa
 */
$router->get('/films/{step?}', ListFilms::class);
