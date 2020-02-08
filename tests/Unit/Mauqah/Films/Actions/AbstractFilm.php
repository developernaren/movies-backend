<?php

namespace Tests\Unit\Mauqah\Films\Actions;

use App\Models\Film;
use App\Models\Genre;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Tests\TestCase;

class AbstractFilm extends TestCase
{
    protected function getFilmModel()
    {
        $name = 'Test Movie';
        $description = 'Movie Description';
        $photoUrl = 'Photo Url';
        $price = 50.00;
        $slug = Str::slug($name);

        $filmModel = new Film();
        $filmModel->id = 12;
        $filmModel->name = $name;
        $filmModel->country_id = 5;
        $filmModel->description = $description;
        $filmModel->photo = $photoUrl;
        $filmModel->ticket_price = $price;
        $filmModel->slug = $slug;

        //create genre relation
        $genre = new Genre();
        $genre->name = 'Horror';
        $genre->id = 15;

        $filmModel->genres = new Collection([$genre]);

        return $filmModel;
    }
}
