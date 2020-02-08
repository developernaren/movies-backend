<?php

namespace Mauqah\Utils;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Collection;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use Mauqah\Films\Interfaces\EntityInterface;

class ApiResponse implements Responsable
{
    private $resource;
    private $paginator;

    private function __construct($resource, $transformer, $paginator = null)
    {
        if ($resource instanceof Collection) {
            $this->resource = new \League\Fractal\Resource\Collection($resource, $transformer);
            $this->paginator = $paginator;
            if (!empty($paginator)) {
                $this->resource->setPaginator($paginator);
            }
        }

        if ($resource instanceof EntityInterface) {
            $this->resource = new Item($resource, $transformer);
        }
    }

    public static function createWithCollection(Collection $resource, $transformer, $paginator = null)
    {
        return new self($resource, $transformer, $paginator);
    }

    public static function createWithItem(EntityInterface $entity, $transformer)
    {
        return new self($entity, $transformer, null);
    }

    final public function toResponse($request)
    {
        $fractal = new Manager();

        return $fractal->createData($this->resource)->toArray();
    }
}
