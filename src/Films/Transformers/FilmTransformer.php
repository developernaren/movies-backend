<?php

namespace Mauqah\Films\Transformers;

use League\Fractal\TransformerAbstract;
use Mauqah\Films\Interfaces\FilmInterface;

class FilmTransformer extends TransformerAbstract
{
    public function transform(FilmInterface $film)
    {
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
        ];
    }
}
