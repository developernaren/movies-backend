<?php

namespace Mauqah\Films\Entities;

use App\Models\Country as CountryModel;
use Mauqah\Films\Interfaces\CountryInterface;

class Country extends AbstractEntity implements CountryInterface
{
    private $name;

    public function __construct(CountryModel $model = null)
    {
        $this->model = $model;
        if (null === $model) {
            $this->model = new CountryModel();
        }
    }

    public function getName(): string
    {
        return $this->model->name;
    }
}
