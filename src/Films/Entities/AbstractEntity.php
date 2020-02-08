<?php

namespace Mauqah\Films\Entities;

use Illuminate\Support\Collection;

abstract class AbstractEntity
{
    protected $model;

    public function getId(): int
    {
        return $this->model->id;
    }

    public function findById(int $id): self
    {
        $model = $this->model->find($id);

        return new static($model);
    }

    public function getAll(): Collection
    {
        $models = $this->model->latest()->get();

        return  $models->map(function ($model) {
            return new static($model);
        });
    }
}
