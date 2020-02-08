<?php

namespace Mauqah\Films\Transformers;

use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\TransformerAbstract;
use Mauqah\Films\Interfaces\FilmInterface;

class FilmTransformer extends TransformerAbstract
{
    public function transform(FilmInterface $film)
    {
        $genres = $film->getGenres();
        $resource = new Collection($genres, new GenreTransformer());
        $manager = new Manager();

        return [
            'id' => $film->getId(),
            'country_id' => $film->getCountryId(),
            'name' => $film->getName(),
            'description' => $film->getDescription(),
            'photo' => $film->getPhoto(),
            'price' => $film->getTicketPrice(),
            'slug' => $film->getSlug(),
            'links' => [
                'self' => '/films/'.$film->getSlug(),
            ],
            'genres' => $manager->createData($resource)->toArray(),
        ];
    }
}
