<?php

namespace Mauqah\Films\Entities;

use App\Models\FilmComment;

class Comment extends AbstractEntity
{
    protected $model;
    private $comment;

    public function __construct(FilmComment $model = null)
    {
        $this->model = $model;
        if (null === $model) {
            $this->model = new self();
        }
    }

    public function getUser()
    {
    }
}
