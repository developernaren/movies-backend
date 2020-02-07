<?php

namespace Mauqah\Films\Responses;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Collection;
use League\Fractal\Manager;

class Api implements Responsable
{
    private $collection;
    private $paginator;

    public function __construct(Collection $collection, $transformer, $paginator = null)
    {
        $this->collection = new \League\Fractal\Resource\Collection($collection, $transformer);
        $this->paginator = $paginator;

        if (!empty($paginator)) {
            $this->collection->setPaginator($paginator);
        }
    }

    final public function toResponse($request)
    {
        $fractal = new Manager();

        return $fractal->createData($this->collection)->toArray();
    }
}
