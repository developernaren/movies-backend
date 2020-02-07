<?php

namespace Mauqah\Films\Entities;

class User extends AbstractEntity
{
    public function getFirstName(): string
    {
        return $this->model->first_name;
    }

    public function getLastName(): string
    {
        return $this->model->last_name;
    }

    public function getEmail(): string
    {
        return $this->model->email;
    }
}
