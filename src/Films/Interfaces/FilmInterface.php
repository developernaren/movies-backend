<?php

namespace Mauqah\Films\Interfaces;

use Illuminate\Support\Collection;
use Mauqah\Utils\Paginator;

interface FilmInterface
{
    public function getId(): int;

    public function getName(): string;

    public function getDescription(): string;

    public function getReleaseDate(): \DateTime;

    public function getRating(): int;

    public function getTicketPrice(): float;

    public function getCountryId(): int;

    public function getPhoto(): string;

    public function getSlug(): string;

    public function toArray(): array;

    public function getAll(): Collection;

    public function getComments(): Collection;

    public function paginate($limit, $offset = 0): Paginator;
}
