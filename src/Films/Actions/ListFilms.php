<?php

namespace Mauqah\Films\Actions;

class ListFilms
{
    public function __invoke()
    {
        return view('films');
    }
}
