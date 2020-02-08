<?php

namespace Mauqah\Films\Transformers;

use League\Fractal\TransformerAbstract;
use Mauqah\Films\Interfaces\CountryInterface;

class CountryTransformer extends TransformerAbstract
{
    public function transform(CountryInterface $country)
    {
        return [
            'id' => $country->getId(),
            'name' => $country->getName(),
        ];
    }
}
