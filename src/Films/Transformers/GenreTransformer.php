<?php

namespace Mauqah\Films\Transformers;

use League\Fractal\TransformerAbstract;
use Mauqah\Films\Interfaces\GenreInterface;

class GenreTransformer extends TransformerAbstract
{
    public function transform(GenreInterface $genre)
    {
        return [
            'id' => $genre->getId(),
            'name' => $genre->getName(),
        ];
    }
}
