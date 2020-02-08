<?php

namespace Mauqah\Films\Actions;

use Mauqah\Films\Interfaces\CountryInterface;
use Mauqah\Films\Transformers\CountryTransformer;
use Mauqah\Utils\ApiResponse;

class FetchCountries
{
    public function __invoke(CountryInterface $country, CountryTransformer $transformer)
    {
        $countries = $country->getAll();

        return ApiResponse::createWithCollection($countries, $transformer);
    }
}
