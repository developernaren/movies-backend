<?php

namespace Mauqah\Films\Actions;

use Mauqah\Films\Interfaces\FilmInterface;
use Mauqah\Films\Transformers\FilmTransformer;
use Mauqah\Utils\ApiResponse;

class GetFilmDetails
{
    public function __invoke($slug, FilmInterface $film, FilmTransformer $transformer)
    {
        return ApiResponse::createWithItem($film->findBySlug($slug), $transformer);
    }
}
