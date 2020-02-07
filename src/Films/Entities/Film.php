<?php

namespace Mauqah\Films\Entities;

use App\Models\Film as FilmModel;
use Illuminate\Support\Collection;
use Mauqah\Films\Interfaces\FilmInterface;
use Mauqah\Utils\Paginator;

class Film extends AbstractEntity implements FilmInterface
{
    protected $model;

    public function __construct(FilmModel $model = null)
    {
        $this->model = $model;
        if (null === $model) {
            $this->model = new FilmModel();
        }
    }

    public function getId(): int
    {
        return $this->model->id;
    }

    public function getName(): string
    {
        return $this->model->name;
    }

    public function getDescription(): string
    {
        return $this->model->description;
    }

    public function getReleaseDate(): \DateTime
    {
        return $this->model->release_date;
    }

    public function getRating(): int
    {
        return $this->model->rating;
    }

    public function getTicketPrice(): float
    {
        return $this->model->ticket_price;
    }

    public function getCountryId(): int
    {
        return $this->model->country_id;
    }

    public function getPhoto(): string
    {
        return $this->model->photo;
    }

    public function getSlug(): string
    {
        return $this->model->slug;
    }

    public function toArray(): array
    {
        return $this->model->toArray();
    }

    public function getComments(): Collection
    {
        $comments = $this->model->comments;
    }

    public function paginate($limit, $offset = 0): Paginator
    {
        $total = $this->model->count();
        $models = $this->model->take($limit)->skip($offset)->latest()->get();

        $entities = $models->map(function ($model) {
            return new static($model);
        });

        return new Paginator($entities, $total, $limit);
    }
}
