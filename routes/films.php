<?php

use Mauqah\Films\Actions\FetchFilms;
use Mauqah\Films\Actions\GetFilmDetails;
use Mauqah\Films\Actions\ListFilms;

$router->group(['prefix' => '/api'], function ($router) {
    $router->get('/films', FetchFilms::class)->name('films.list');
    $router->get('/films/{slug}', GetFilmDetails::class)->name('films.detail');
});

/*
 * This is the default route for spa
 */
$router->get('/films/{step?}', ListFilms::class);
