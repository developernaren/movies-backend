<?php

namespace Mauqah\Films\Actions;

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Mauqah\Films\Interfaces\FilmInterface;
use Mauqah\Films\Responses\Api;
use Mauqah\Films\Transformers\FilmTransformer;

class FetchFilms
{
    private $limit = 1;

    public function __invoke(Request $request, FilmInterface $film, Application $application, FilmTransformer $transformer)
    {
        $page = $request->get('page', 1);
        $offset = ($this->limit * $page) - 1;
        $films = $film->paginate($this->limit, $offset);

        return $application->make(Api::class, [
            'collection' => $films->getItems(),
            'transformer' => $transformer,
            'paginator' => $films,
        ]);
    }
}
