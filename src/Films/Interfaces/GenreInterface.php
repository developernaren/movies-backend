<?php

namespace Mauqah\Films\Interfaces;

interface GenreInterface extends EntityInterface
{
    public function getId(): int;

    public function getName(): string;
}
