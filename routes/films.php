<?php

use Mauqah\Films\Actions\CreateFilm;
use Mauqah\Films\Actions\FetchCountries;
use Mauqah\Films\Actions\FetchFilms;
use Mauqah\Films\Actions\FetchGenres;
use Mauqah\Films\Actions\GetFilmDetails;
use Mauqah\Films\Actions\ListFilms;

$router->group(['prefix' => '/api/films'], function ($router) {
    $router->get('', FetchFilms::class)->name('films.api.list');
    $router->get('{slug}', GetFilmDetails::class)->name('films.api.detail');
    $router->post('', CreateFilm::class)->name('films.detail');
});

$router->group(['prefix' => '/api'], function ($router) {
    $router->get('countries', FetchCountries::class)->name('countries.api.list');
    $router->get('genres', FetchGenres::class)->name('genres.api.list');
});

/*
 * This is the default route for spa
 */
$router->get('/films', ListFilms::class)->name('films.list');
