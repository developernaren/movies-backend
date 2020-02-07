<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\FilmComment;
use Faker\Generator as Faker;

$factory->define(FilmComment::class, function (Faker $faker) {
    return [
        'film_id' => 1,
        'user_id' => 1,
        'comment' => $faker->sentences(6, true),
    ];
});
