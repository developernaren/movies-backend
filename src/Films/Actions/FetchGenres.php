<?php

namespace Mauqah\Films\Actions;

use Mauqah\Films\Interfaces\GenreInterface;
use Mauqah\Films\Transformers\GenreTransformer;
use Mauqah\Utils\ApiResponse;

class FetchGenres
{
    public function __invoke(GenreInterface $genre, GenreTransformer $transformer)
    {
        $genres = $genre->getAll();

        return ApiResponse::createWithCollection($genres, $transformer);
    }
}
