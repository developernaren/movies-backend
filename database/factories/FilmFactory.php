<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\Film;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Film::class, function (Faker $faker) {
    $name = $faker->words(4, true);

    return [
        'name' => $name,
        'description' => $faker->paragraph(),
        'release_date' => $faker->date(),
        'rating' => $faker->numberBetween(1, 5),
        'ticket_price' => $faker->randomFloat(2, 50, 200),
        'country_id' => 1,
        'photo' => $faker->image(),
        'slug' => Str::slug($name),
    ];
});
