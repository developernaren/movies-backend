<?php

namespace Mauqah\Films\Entities;

use App\Models\Genre as GenreModel;
use Mauqah\Films\Interfaces\GenreInterface;

class Genre extends AbstractEntity implements GenreInterface
{
    public function __construct(GenreModel $model = null)
    {
        $this->model = $model;
        if (null === $model) {
            $this->model = new GenreModel();
        }
    }

    public function getName(): string
    {
        return $this->model->name;
    }
}
