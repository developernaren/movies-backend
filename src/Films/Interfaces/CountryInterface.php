<?php

namespace Mauqah\Films\Interfaces;

interface CountryInterface extends EntityInterface
{
    public function getId(): int;

    public function getName(): string;
}
