<?php

use App\Models\Country;
use App\Models\Film;
use Illuminate\Database\Seeder;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = Country::take(10)->get();
        $genres = \App\Models\Genre::all();
        foreach (range(1, 3) as $index) {
            $film = factory(Film::class)->create([
                'country_id' => $countries->random()->id,
            ]);

            $film->genres()->sync($genres->random(2)->pluck('id')->all());
        }
    }
}
