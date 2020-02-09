<?php

namespace Mauqah\Films\Services;

use Illuminate\Support\Str;

class CreateFilm
{
    private $name;
    private $description;
    private $releaseDate;
    private $rating;
    private $ticketPrice;
    private $countryId;
    private $genreIds;
    private $photo;
    private $slug;

    public function __construct(string $name, string $description, \DateTime $releaseDate, int $rating, float $ticketPrice, int $countryId, string $photo, array $genreIds = [])
    {
        $this->name = $name;
        $this->description = $description;
        $this->releaseDate = $releaseDate;
        $this->rating = $rating;
        $this->ticketPrice = $ticketPrice;
        $this->countryId = $countryId;
        $this->genreIds = $genreIds;
        $this->photo = $photo;
        $this->slug = Str::slug($this->getName().'-'.microtime(1));
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getReleaseDate(): string
    {
        return $this->releaseDate->format('Y-m-d');
    }

    public function getRating(): int
    {
        return $this->rating;
    }

    public function getTicketPrice(): float
    {
        return $this->ticketPrice;
    }

    public function getCountryId(): int
    {
        return $this->countryId;
    }

    public function getGenreIds(): array
    {
        return $this->genreIds;
    }

    public function getPhoto(): string
    {
        return $this->photo;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'release_date' => $this->getReleaseDate(),
            'rating' => $this->getRating(),
            'ticket_price' => $this->getTicketPrice(),
            'country_id' => $this->getCountryId(),
            'photo' => $this->getPhoto(),
            'slug' => $this->getSlug(),
        ];
    }
}
